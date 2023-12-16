<?php

namespace App\Http\Controllers\Admin;

use App\Utils\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\DepositRequest;
use App\Models\User;
use App\Repositories\Deposit\DepositRepository;

class DepositController extends Controller
{

    protected DepositRepository $depositRepository;
    protected $role;

    public function __construct() {

        $this->depositRepository = app(DepositRepository::class);
        $this->role = new Helper();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = $this->role->getUserRole();

        return view('admin.deposit.index', compact('users'));
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
