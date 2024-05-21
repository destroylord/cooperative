<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Utils\Helper;
use Spatie\Permission\Models\Role;

class MemberController extends Controller
{
    public function index()
    {
        $helper = new Helper();

        return view('admin.member.index', [
            'members' => $helper->getUserRole(),
        ]);
    }

    
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return back();
    }

}
