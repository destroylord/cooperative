<?php

namespace App\Http\Controllers\Admin;

use App\Utils\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\DepositRequest;
use App\Models\User;
use App\Repositories\Deposit\DepositRepository;
use App\Services\Deposit\DepositService;

class DepositController extends Controller
{

    protected DepositRepository $depositRepository;
    protected DepositService $depositService;
    protected $role;

    public function __construct() {

        $this->depositRepository = app(DepositRepository::class);
        $this->depositService =  app(DepositService::class);
        $this->role = new Helper();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = $this->depositService->getDepositHistory();

        return view('admin.deposit.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        return view('admin.deposit.create', [
            'deposits' => $this->depositRepository->typeSaving(),
            'user' => User::find($id)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepositRequest $request)
    {
        $this->depositRepository->storeDeposit($request->all());

        return redirect()->route('deposit.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        return view('admin.deposit.show', [
            'deposites' => $this->depositRepository->getDepositHistoryByUserId($id)
        ]);
    }
}
