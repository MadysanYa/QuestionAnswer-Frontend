<?php

namespace App\Observers;

use App\Models\PropertyAppraisal;

class PropertyAppraisalObserver
{
    /**
     * Handle the PropertyAppraisal "created" event.
     *
     * @param  \App\Models\PropertyAppraisal  $propertyAppraisal
     * @return void
     */
    public function creating(PropertyAppraisal $propertyAppraisal)
    {
        $lastAppraisalId = PropertyAppraisal::select('id')->get()->last();
        $proReference =  $lastAppraisalId ? $lastAppraisalId->id + 1 : 1;

        $propertyAppraisal->property_reference = 'PL-'. sprintf('%010d', $proReference);
    }

    public function created(PropertyAppraisal $propertyAppraisal)
    {
        //
    }

    /**
     * Handle the PropertyAppraisal "updated" event.
     *
     * @param  \App\Models\PropertyAppraisal  $propertyAppraisal
     * @return void
     */
    public function updated(PropertyAppraisal $propertyAppraisal)
    {
        //
    }

    /**
     * Handle the PropertyAppraisal "deleted" event.
     *
     * @param  \App\Models\PropertyAppraisal  $propertyAppraisal
     * @return void
     */
    public function deleted(PropertyAppraisal $propertyAppraisal)
    {
        //
    }

    /**
     * Handle the PropertyAppraisal "restored" event.
     *
     * @param  \App\Models\PropertyAppraisal  $propertyAppraisal
     * @return void
     */
    public function restored(PropertyAppraisal $propertyAppraisal)
    {
        //
    }

    /**
     * Handle the PropertyAppraisal "force deleted" event.
     *
     * @param  \App\Models\PropertyAppraisal  $propertyAppraisal
     * @return void
     */
    public function forceDeleted(PropertyAppraisal $propertyAppraisal)
    {
        //
    }
}