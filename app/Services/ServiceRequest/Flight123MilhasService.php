<?php

namespace App\Services\serviceRequest;

use Illuminate\Support\Facades\Http;

class Flight123MilhasService {

    const URLAPI123MILHAS = "http://prova.123milhas.net/api/flights";

    public function searchFlights():array
    {
        $response = Http::get(self::URLAPI123MILHAS);
        if ($response->successful()) {
            return $response->json();
        }
        $response->throw();
    }

    public function groupFlights($flights):array
    {
        $groupsFlights = $this->setGroupingLevel($flights);
        return $this->setFlightsGroups($groupsFlights);
    }  

    private function setGroupingLevel($flights):array
    {
        $groupsFlights =[
            "outbound"  => [],
            "inbound"   => []
        ];

        foreach ($flights as $flight) {
            $typeFlight  = $flight['outbound'] == 1 ? 'outbound': 'inbound';
            $groupsFlights[$typeFlight][$flight['fare']][$flight['price']][] = $flight;
        }

        return $groupsFlights;

    }

    private function setFlightsGroups($groupsFlights):array
    {
        $groups = [];
        $cheapestGroup = [];
        foreach ($groupsFlights['outbound'] as $fire => $groupFire) {
            foreach ($groupFire as $priceOutbound => $flightsOutbound) {
                foreach ($groupsFlights['inbound'][$fire] as $priceInbound  => $flightsInbound) {
                    $priceGroup = $priceOutbound  + $priceInbound;
                    $groups[$priceGroup] = [
                        "uniqueId"      => uniqid(),
                        "totalPrice"    => $priceGroup,
                        "outbound"      => $flightsOutbound,
                        "inbound"       => $flightsInbound
                    ];
                    if (!$cheapestGroup || $cheapestGroup['totalPrice'] > $priceGroup) {
                        $cheapestGroup = $groups[$priceGroup];
                    }
                }
                unset($groupsFlights['outbound'][$fire][$priceOutbound]);
            }
        }
        
        sort($groups);
        return [
            'groups'    => $groups,
            'totalPrice'=> $cheapestGroup['totalPrice'],
            'uniqueId'  => $cheapestGroup['uniqueId']

        ];

    }
    
}