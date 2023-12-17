<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CooperativeInterest;
use App\Repositories\Loan\LoanRepository;

class LoanController extends Controller
{

    protected LoanRepository $loanRepository;

    public function __construct()
    {
        $this->loanRepository = app(LoanRepository::class);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.loan.index');
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
        //
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

}
