<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Deposit\DepositRepository;
use App\Repositories\Loan\LoanRepository;
use App\Services\Deposit\DepositService;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    protected DepositService $depositService;
    protected LoanRepository $loanRepository;

    public function __construct()
    {
        $this->depositService =  app(DepositService::class);
        $this->loanRepository = app(LoanRepository::class);
    }


    public function dashboard()
    {
        $deposit = $this->depositService->getDepositHistory();
        $loan = $this->loanRepository->getLoan();

        return view('chairman.report',[
            'deposite' => $deposit,
            'loans' => $loan
        ]);
    }
    public function deposite()
    {   
    
        $data = $this->depositService->getDepositHistory();
        return view('admin.report.deposit', compact('data'));
    }

    public function loan()
    {
        $data = $this->loanRepository->getLoan();
        return view('admin.report.loan', compact('data'));
    }
}
