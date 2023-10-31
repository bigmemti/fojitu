<?php

namespace App\Services;

use App\Models\Permission;
use App\Models\User;

class AuthorizeService{
    public static function exists(string $permission_name, User $user) : bool{
        return Permission::where("name", $permission_name)->whereRelation('roles.users', 'users.id', $user->id)->exists();
    }

}
