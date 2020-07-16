<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name', 'description'];

    /**
     * Get Permissions
     */
    public function profiles()
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
}
