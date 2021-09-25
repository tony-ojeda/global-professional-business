<?php

namespace App\Observers;

use App\EnterpriseMembership;

class EnterpriseMembershipObserver
{
    /**
     * Handle the enterprise membership "created" event.
     *
     * @param  \App\EnterpriseMembership  $enterpriseMembership
     * @return void
     */
    public function created(EnterpriseMembership $enterpriseMembership)
    {
        $membership = $enterpriseMembership->membership()->first();

        $base_date = is_null($enterpriseMembership->due_date) ? date('Y-m-d') : $enterpriseMembership->due_date;
        $add = "+{$membership->month_duration} months";
        $due_date = date('Y-m-d', strtotime($add, strtotime(str_replace("/", "-", $base_date))));
        
        $enterpriseMembership->payment_date = date('Y-m-d');
        $enterpriseMembership->due_date = $due_date;
        $enterpriseMembership->update();
    }

    /**
     * Handle the enterprise membership "updated" event.
     *
     * @param  \App\EnterpriseMembership  $enterpriseMembership
     * @return void
     */
    public function updated(EnterpriseMembership $enterpriseMembership)
    {
        //
    }

    /**
     * Handle the enterprise membership "deleted" event.
     *
     * @param  \App\EnterpriseMembership  $enterpriseMembership
     * @return void
     */
    public function deleted(EnterpriseMembership $enterpriseMembership)
    {
        //
    }

    /**
     * Handle the enterprise membership "restored" event.
     *
     * @param  \App\EnterpriseMembership  $enterpriseMembership
     * @return void
     */
    public function restored(EnterpriseMembership $enterpriseMembership)
    {
        //
    }

    /**
     * Handle the enterprise membership "force deleted" event.
     *
     * @param  \App\EnterpriseMembership  $enterpriseMembership
     * @return void
     */
    public function forceDeleted(EnterpriseMembership $enterpriseMembership)
    {
        //
    }
}
