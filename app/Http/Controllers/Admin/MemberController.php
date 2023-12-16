<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Utils\Helper;

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
