<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class AccountsController extends Controller
{
    public function index()

    {
        abort_if(Gate::denies('task_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $accounts = Account::all();

        // return view('tasks.index', compact('tasks'));
        $accounts = Account::all();
        return view('accounts.index', compact('accounts'));
    }

    public function create()
    {
        abort_if(Gate::denies('task_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('accounts.create');
    }

    public function store(StoreAccountRequest $request)
    {
        Account::create($request->validated());

        return redirect()->route('accounts.index');
    }

    public function show(Account $account)
    {
        abort_if(Gate::denies('task_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('accounts.show', compact('account'));
    }

    public function edit(Account $account)
    {
        abort_if(Gate::denies('task_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('accounts.edit', compact('account'));
    }

    public function update(UpdateAccountRequest $request, Account $account)
    {
        $account->update($request->validated());

        return redirect()->route('accounts.index');
    }

    public function destroy(Account $account)
    {
        abort_if(Gate::denies('task_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $account->delete();

        return redirect()->route('accounts.index');
    }
}
