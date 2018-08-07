<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Moon;

class UpdateMoonOrbitPosition implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $planet;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($planet)
    {
        $this->planet = $planet;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {


            // get moons for that planet

            $moons = Moon::where('planet_id', $this->planet->id)->get();


            $position = 1;

            foreach ($moons as $moon) {

                $moon->update(['orbital_position' => $position]);

                $position ++;

            }


    }
}
