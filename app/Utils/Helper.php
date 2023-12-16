<?php

namespace App\Utils;

use App\Models\User;
use Spatie\Permission\Models\Role;

class Helper 
{

    protected $role, $user;
    
    public function __construct()
    {
        $this->role = app(Role::class);
        $this->user = app(User::class);
    }

    public function getUserRole()
    {

        $role  = $this->role->where('name', 'member')->first();
        $users = $this->user->role($role->name)
                    ->select('id', 'name', 'email','address', 'phone')->get();

        return $users;

    }
}
