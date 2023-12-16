<?php

namespace App\Http\Controllers\Admin;

use App\Enum\TypeSavingEnum;
use App\Models\Deposit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DepositRequest;
use App\Models\User;
use App\Repositories\Deposit\DepositRepository;
use Spatie\Permission\Models\Role;

class DepositController extends Controller
{

    protected DepositRepository $depositRepository;

    public function __construct() {

        $this->depositRepository = app(DepositRepository::class);
    
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $role = Role::where('name', 'member')->first();

        $users = User::role($role->name)
                    ->select('id', 'name', 'address', 'phone')->get();


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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deposit $deposit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Deposit $deposit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deposit $deposit)
    {
        //
    }
}
