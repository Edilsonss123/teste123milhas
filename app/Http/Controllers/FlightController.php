<?php

namespace App\Http\Controllers;

use App\Services\FlightService;
use App\Services\ServiceRequest\Flight123MilhasService;

class FlightController extends Controller
{
    private FlightService $flightService;

    public function __construct(FlightService $flightService) {
        $this->flightService = $flightService;
    }

    public function searchFlight() 
    {
        try {
            $data = $this->flightService->searchFlights(new Flight123MilhasService());
            return response()->json($data);

        } catch (\Exception $ex) {
            $codeError = $ex->getCode()?:500;
            return response()->json([
                'codeError'     => $codeError,
                'errorMessage'  => $ex->getMessage(),
            ], $codeError);
        }
    }

    public function searchFlightsGrouped() 
    {
        try {
            $data = $this->flightService->searchFlightsGrouped(new Flight123MilhasService());
            return response()->json($data);

        } catch (\Exception $ex) {
            $codeError = $ex->getCode()?:500;
            return response()->json([
                'codeError'     => $codeError,
                'errorMessage'  => $ex->getMessage(),
            ], $codeError);
        }
    }
}
