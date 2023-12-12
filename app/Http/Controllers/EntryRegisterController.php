<?php

namespace App\Http\Controllers;

use App\Models\EntryRegister;
use Illuminate\Http\Request;

/**
 * Class EntryRegisterController
 * @package App\Http\Controllers
 */
class EntryRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entryRegisters = EntryRegister::paginate();

        return view('entry-register.index', compact('entryRegisters'))
            ->with('i', (request()->input('page', 1) - 1) * $entryRegisters->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $entryRegister = new EntryRegister();
        return view('entry-register.create', compact('entryRegister'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(EntryRegister::$rules);

        $entryRegister = EntryRegister::create($request->all());

        return redirect()->route('entry-register.index')
            ->with('success', 'EntryRegister created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entryRegister = EntryRegister::find($id);

        return view('entry-register.show', compact('entryRegister'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entryRegister = EntryRegister::find($id);

        return view('entry-register.edit', compact('entryRegister'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  EntryRegister $entryRegister
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EntryRegister $entryRegister)
    {
        request()->validate(EntryRegister::$rules);

        $entryRegister->update($request->all());

        return redirect()->route('entry-register.index')
            ->with('success', 'EntryRegister updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $entryRegister = EntryRegister::find($id)->delete();

        return redirect()->route('entry-register.index')
            ->with('success', 'EntryRegister deleted successfully');
    }
}
