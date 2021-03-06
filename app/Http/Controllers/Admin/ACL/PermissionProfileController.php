<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Profile;
use Illuminate\Http\Request;

class PermissionProfileController extends Controller
{
    protected $profile;
    protected $permission;

    public function __construct(Profile $profile, Permission $permission)
    {
        $this->profile = $profile;
        $this->permission = $permission;
    }

    public function permissions($idProfile)
    {
        $profile = $this->profile->find($idProfile);

        if (!$profile) return redirect()->back();

        $permissions = $profile->permissions()->paginate();

        return view('admin.pages.profiles.permissions.index', [
            'profile' => $profile,
            'permissions' => $permissions
        ]);
    }

    public function profiles($idPermission)
    {
        $permission = $this->permission->find($idPermission);

        if (!$permission) return redirect()->back();

        $profiles = $permission->profiles()->paginate();

        return view('admin.pages.permissions.profiles.index', [
            'profiles' => $profiles,
            'permission' => $permission
        ]);
    }

    public function permissionsAvailable(Request $request,$idProfile)
    {
        $profile = $this->profile->find($idProfile);
        if (!$profile) return redirect()->back();

        $filter = $request->filter;

        $permissions = $this->profile->permissionsAvailable($idProfile,$filter);

        return view('admin.pages.profiles.permissions.available', [
            'profile' => $profile,
            'permissions' => $permissions
        ]);
    }

    public function attachPermissionsProfile(Request $request, $idProfile)
    {
        $profile = $this->profile->find($idProfile);

        if (!$profile) return redirect()->back();

        if(!$request->permissions || count($request->permissions) == 0){
            return redirect()
                ->back()
                ->with('error','Precisa escolher pelo menos uma permissão');
        }

        $profile->permissions()->attach($request->permissions);

        return redirect()->route('profiles.permissions',$profile->id);
    }

    public function detachPermissionsProfile($idProfile,$idPermission)
    {
        $profile = $this->profile->find($idProfile);
        $permission = $this->permission->find($idPermission);

        if (!$profile || !$permission) return redirect()->back();

        $profile->permissions()->detach($permission);

        return redirect()->route('profiles.permissions',$profile->id);
    }
}
