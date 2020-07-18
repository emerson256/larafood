<?php

namespace App\Observers;

use App\Models\Tenant;
use Illuminate\Support\Str;


class TenantObsever
{
    /**
     * Handle the tenant "created" event.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return void
     */
    public function created(Tenant $tenant)
    {

    }

    public function creating(Tenant $tenant)
    {
        $tenant->uuid = Str::uuid();
        $tenant->url = Str::kebab($tenant->name);
    }

    /**
     * Handle the tenant "updated" event.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return void
     */
    public function updated(Tenant $tenant)
    {
        //
    }

    public function updating(Tenant $tenant)
    {
        $tenant->url = Str::kebab($tenant->name);
    }

    /**
     * Handle the tenant "deleted" event.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return void
     */
    public function deleted(Tenant $tenant)
    {
        //
    }

    /**
     * Handle the tenant "restored" event.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return void
     */
    public function restored(Tenant $tenant)
    {
        //
    }

    /**
     * Handle the tenant "force deleted" event.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return void
     */
    public function forceDeleted(Tenant $tenant)
    {
        //
    }
}
