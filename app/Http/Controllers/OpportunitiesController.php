<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOpportunityRequest;
use App\Http\Requests\UpdateOpportunityRequest;
use App\Models\Account;
use App\Models\Opportunity;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class OpportunitiesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('task_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

         $accounts = Account::all();

        // return view('tasks.index', compact('tasks'));
        //$acounts=Accounts ::with(['user'])-get();
        $opportunities = Opportunity::all();
        return view('opportunities.index', compact('opportunities'));
    }

    public function create()
    {
        //
        $accounts = Account::all();
        abort_if(Gate::denies('task_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('opportunities.create')->with('account',$accounts);
    }


    public function store(StoreOpportunityRequest $request)
    {
        Opportunity::create($request->validated());

        return redirect()->route('opportunities.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Opportunity $opportunity)
    {
        abort_if(Gate::denies('task_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('opportunities.show', compact('opportunity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Opportunity $opportunity)
    {
        abort_if(Gate::denies('task_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('opportunities.edit', compact('opportunity'));
    }

    public function update(UpdateOpportunityRequest $request, Opportunity $opportunity)
    {
        $opportunity->update($request->validated());

        return redirect()->route('opportunities.index');
    }

    public function destroy(Opportunity $opportunity)
    {
        abort_if(Gate::denies('task_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $opportunity->delete();

        return redirect()->route('opportunities.index');
    }
}
