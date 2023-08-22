<?php

namespace App\Console\Commands;

use App\Models\Flight;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateFlightStatus extends Command
{
    protected $signature = 'flight:update-status';
    protected $description = 'Update flight statuses based on time';

    public function handle()
    {
        $flights = Flight::all();

        foreach ($flights as $flight) {
            $currentTime = Carbon::now();
            $departureTime = Carbon::parse($flight->DepartureTime);
            $arrivalTime = Carbon::parse($flight->ArrivalTime);

            if ($currentTime < $departureTime) {
                $flight->status = 'Chưa bay';
            } elseif ($currentTime >= $departureTime && $currentTime <= $arrivalTime) {
                $flight->status = 'Đang bay';
            } else {
                $flight->status = 'Đã bay';
            }

            $flight->save();
        }

        $this->info('Flight statuses updated successfully.');
    }
}