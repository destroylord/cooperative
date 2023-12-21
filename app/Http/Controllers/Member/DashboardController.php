<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Installment;
use App\Models\Loan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $loans = Loan::with('interest')->where('user_id', auth()->user()->id)->get();
        $installments = Installment::where('user_id', auth()->user()->id)->get();

        return view('member.dashboard', compact('loans', 'installments'));
    }
}
