<?php

namespace App\Observers;

use App\Breed;
use App\Cat;

class BreedObserver
{
    /**
     * Handle the breed "created" event.
     *
     * @param  \App\Breed  $breed
     * @return void
     */
    public function created(Breed $breed)
    {
        //
    }

    /**
     * Handle the breed "updated" event.
     *
     * @param  \App\Breed  $breed
     * @return void
     */
    public function updated(Breed $breed)
    {
        //
    }

    /**
     * Handle the breed "deleted" event.
     *
     * @param  \App\Breed  $breed
     * @return void
     */
    public function deleted(Breed $breed)
    {
        foreach($breed->cats as $cat)
        {
            $cat->delete();
        }
    }

    /**
     * Handle the breed "restored" event.
     *
     * @param  \App\Breed  $breed
     * @return void
     */
    public function restored(Breed $breed)
    {
        //
    }

    /**
     * Handle the breed "force deleted" event.
     *
     * @param  \App\Breed  $breed
     * @return void
     */
    public function forceDeleted(Breed $breed)
    {
        //
    }
}
