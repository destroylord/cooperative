<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Utils\Helper;

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
        return redirect()->route('admin.member.index');
    }

}
