<?php

namespace App\Http\Controllers\Admin;

use App\Models\Installment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CooperativeInterest;
use App\Repositories\Loan\LoanRepository;
use App\Services\Loan\LoanService;
use Barryvdh\DomPDF\Facade\Pdf;



class LoanController extends Controller
{

    protected  $loanRepository;
    protected $loanService;

    public function __construct()
    {
        $this->loanRepository = app(LoanRepository::class);
        $this->loanService = app(LoanService::class);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.loan.index', 
    ['loans' => $this->loanRepository->getloan()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.loan.create', [
            'interests' => CooperativeInterest::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->loanService->storeLoanAndImplements($request->all());
        return redirect()->route('loan.index');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = $this->loanRepository->getUser($id);

        if(!isset($data)) {
            return response()->json([
                'message' => "Data tidak ditemukan",
            ]);
        }else {
            return response()->json([
                'status' => true,
                'data' => $data
            ]);
        }
    }

    /**
     * Display installemtn list by Loan
     * @param string $id
     * 
    */
    
    public function installmentList($id)
    {
        
       return view('admin.loan.list-installment', [
           'installment' => $this->loanRepository->getInstallmentList($id)->get(),
       ]);

    }

    public function installmentStore($id, $user_id)
    {

        $data = $this->loanRepository->updateInstallment($id, $user_id);

        if(isset($data['error'])) {
            return response()->json([
                'status' => false,
                'message' => $data['error']
            ]);
        }else {
            return response()->json([
                'status' => true,
                'message' => "Data Berhasil Diupdate",
                'data' => $data
            ]);
        }
    }


    public function invoice($invoice_id) {
        $invoice = Installment::findOrFail($invoice_id);
        $pdf = PDF::loadView('admin.loan.invoice', compact('invoice'));
        return $pdf->stream('invoice.pdf');
    }

}
