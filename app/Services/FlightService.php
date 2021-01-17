<?php

namespace App\Services;

use App\Services\ServiceRequest\FlightServiceRequest;

class FlightService {
    
    public function searchFlights(FlightServiceRequest $serviceRequest):array
    {
        return $serviceRequest->searchFlights();
    }     
    
    public function searchFlightsGrouped(FlightServiceRequest $serviceRequest):array
    {
        $flights= $this->searchFlights($serviceRequest);
        return  $serviceRequest->groupFlights($flights);
    } 

}