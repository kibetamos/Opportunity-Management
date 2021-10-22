<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use SebastianBergmann\Environment\Console;
use Symfony\Component\HttpFoundation\Response;

class ConsolesController extends Controller
{
    public function index()

    {
        abort_if(Gate::denies('task_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $accounts = Account::all();

        // return view('tasks.index', compact('tasks'));
        // $accounts = Account::all();
        // return view('accounts.index', compact('accounts'));

        $consoles = Console::all();
        return view('console.index', compact('consoles'));
    }

    public function create()
    {
        abort_if(Gate::denies('task_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // return view('accounts.create');
        return view('consoles.create')
    }

    public function store(StoreConsoleRequest $request)
    {
        // Account::create($request->validated());

        // return redirect()->route('accounts.index');

        Console::create($request->validated());

        return redirect()->route('consoles.index');
    }

    public function show(Console $console)
    {
        abort_if(Gate::denies('task_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('consoles.show', compact('console'));
    }

    public function edit(Console $console)
    {
        abort_if(Gate::denies('task_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('consoles.edit', compact('console'));
    }

    public function update(UpdateConsoleRequest $request, Console $console)
    {
        $console->update($request->validated());

        return redirect()->route('consoles.index');
    }

    public function destroy(Console $console)
    {
        abort_if(Gate::denies('task_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $console->delete();

        return redirect()->route('consoles.index');
    }
}
