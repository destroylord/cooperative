<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CooperativeInterestRequest;
use App\Models\CooperativeInterest;
use App\Repositories\CooperativeInterest\CooperativeInterestRepository;
use Illuminate\Http\Request;

class CooperativeInterestController extends Controller
{
    protected CooperativeInterestRepository $cooperativeInterestRepository;

    public function __construct() {

        $this->cooperativeInterestRepository = app(CooperativeInterestRepository::class);
    
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.interest.index', [
            'interests' => $this->cooperativeInterestRepository->getAll(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.interest.create', ['interest' => new CooperativeInterest]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CooperativeInterestRequest $request)
    {
        $this->cooperativeInterestRepository->createInterest($request->all());
    
        return back()->with('success','Interest created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         

        return view('admin.interest.edit', [
            'interest' => $this->cooperativeInterestRepository->getById($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CooperativeInterestRequest $request, string $id)
    {
        $this->cooperativeInterestRepository->updateInterest($request->all(), $id);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CooperativeInterest $cooperativeInterests)
    {
         $this->cooperativeInterestRepository->deleteInterest($cooperativeInterests);
         return back();
    }
}
