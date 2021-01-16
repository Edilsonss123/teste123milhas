<?php

namespace App\Services;

class FlightService {
    
    public function searchFlights($serviceRequest):array
    {
        return $serviceRequest->searchFlights();
    }     
    
    public function searchFlightsGrouped($serviceRequest):array
    {
        $flights= $this->searchFlights($serviceRequest);
        $data   = $serviceRequest->groupFlights($flights);
        
        return [
            "flights"   => $flights,
            "groups"    => $data['groups'],
            "totalGroups"   => count($data['groups']),
            "totalFlights"  => count($flights),
            "cheapestPrice" => $data['totalPrice'],
            "cheapestGroup" => $data['uniqueId']
        ];

    } 

}