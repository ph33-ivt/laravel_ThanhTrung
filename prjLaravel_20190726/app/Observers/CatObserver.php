<?php

namespace App\Observers;

use App\Cat;

class CatObserver
{
    /**
     * Handle the cat "created" event.
     *
     * @param  \App\Cat  $cat
     * @return void
     */
    public function created(Cat $cat)
    {
        $data = [
            'name' => 'test event'
        ];
        $cat->update($data);
    }

    /**
     * Handle the cat "updated" event.
     *
     * @param  \App\Cat  $cat
     * @return void
     */
    public function updated(Cat $cat)
    {
        //
    }

    /**
     * Handle the cat "deleted" event.
     *
     * @param  \App\Cat  $cat
     * @return void
     */
    public function deleted(Cat $cat)
    {
        //
    }

    /**
     * Handle the cat "restored" event.
     *
     * @param  \App\Cat  $cat
     * @return void
     */
    public function restored(Cat $cat)
    {
        //
    }

    /**
     * Handle the cat "force deleted" event.
     *
     * @param  \App\Cat  $cat
     * @return void
     */
    public function forceDeleted(Cat $cat)
    {
        //
    }
}
