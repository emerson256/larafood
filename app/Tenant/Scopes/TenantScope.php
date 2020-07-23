<?php

namespace App\Tenant\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;

use App\Tenant\ManagerTenant;

class TenantScope implements Scope{

    public function apply(Builder $builder, Model $model)
    {
        $managerTenant = app(ManagerTenant::class);

        $builder->where('tenant_id', $managerTenant->getTenantIdentify());
    }
}
