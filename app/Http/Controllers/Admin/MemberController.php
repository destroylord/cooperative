<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Utils\Helper;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function __invoke()
    {
        $helper = new Helper();

        return view('admin.member.index', [
            'members' => $helper->getUserRole(),
        ]);
    }
}
