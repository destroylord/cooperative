<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Deposit\DepositRepository;
use App\Services\Deposit\DepositService;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    protected DepositService $depositService;

    public function __construct()
    {
        $this->depositService =  app(DepositService::class);
    }

    public function loan()
    {   
    
        $data = $this->depositService->getDepositHistory();
        return view('admin.report.loan', compact('data'));
    }
}
