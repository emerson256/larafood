<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name', 'description'];
    /**
     * Get Permissions
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function plans()
    {
        return $this->belongsToMany(Profile::class);
    }

    public function search($filter = null)
    {
        return $this
            ->where('name', 'like', "%{$filter}%")
            ->orWhere('description', 'like', "%{$filter}%")
            ->paginate();
    }

    /**
     * Permissions not linked with this profile
     */
    public function permissionsAvailable($idProfile, $filter = null)
    {
        $permissions = Permission::whereNotIn('permissions.id', function ($query) use ($idProfile) {

            $query->select('permission_profile.permission_id');
            $query->from('permission_profile');
            $query->whereRaw("permission_profile.profile_id=" . $idProfile);
        })
            ->where(function ($queryFilter) use ($filter) {
                if ($filter) {
                    $queryFilter->where('permissions.name', 'LIKE', "%{$filter}%");
                }
            })
            ->paginate();

        return $permissions;
    }
}
