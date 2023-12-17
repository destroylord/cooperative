<?php

namespace App\Utils;

use App\Models\User;
use Spatie\Permission\Models\Role;

class Helper 
{

    protected $user;
    
    public function __construct()
    {
        $this->user = app(User::class);
    }

    public function getUserRole()
    {

        $role = self::getRole();
        $users = $this->user->role($role->name)
                    ->select('id', 'name', 'email','address', 'phone')->get();

        return $users;

    }

    public static function getRole()
    {
         $roles  = Role::where('name', 'member')->first();
         return $roles;
    }
}
