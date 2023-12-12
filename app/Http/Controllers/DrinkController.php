<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use Illuminate\Http\Request;

/**
 * Class DrinkController
 * @package App\Http\Controllers
 */
class DrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drinks = Drink::paginate();

        return view('drink.index', compact('drinks'))
            ->with('i', (request()->input('page', 1) - 1) * $drinks->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drink = new Drink();
        return view('drink.create', compact('drink'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Drink::$rules);

        $drink = Drink::create($request->all());

        return redirect()->route('drinks.index')
            ->with('success', 'Drink created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $drink = Drink::find($id);

        return view('drink.show', compact('drink'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $drink = Drink::find($id);

        return view('drink.edit', compact('drink'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Drink $drink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Drink $drink)
    {
        request()->validate(Drink::$rules);

        $drink->update($request->all());

        return redirect()->route('drinks.index')
            ->with('success', 'Drink updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $drink = Drink::find($id)->delete();

        return redirect()->route('drinks.index')
            ->with('success', 'Drink deleted successfully');
    }
}
