<?php

namespace App\Services\ServiceRequest;

interface FlightServiceRequest {
    public function searchFlights():array;
    public function groupFlights(array $groupFlights):array;
}