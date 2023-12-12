<?php

namespace App\Http\Controllers;

use App\Models\DrinkConsumption;
use Illuminate\Http\Request;

/**
 * Class DrinkConsumptionController
 * @package App\Http\Controllers
 */
class DrinkConsumptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drinkConsumptions = DrinkConsumption::paginate();

        return view('drink-consumption.index', compact('drinkConsumptions'))
            ->with('i', (request()->input('page', 1) - 1) * $drinkConsumptions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drinkConsumption = new DrinkConsumption();
        return view('drink-consumption.create', compact('drinkConsumption'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DrinkConsumption::$rules);

        $drinkConsumption = DrinkConsumption::create($request->all());

        return redirect()->route('drink-consumptions.index')
            ->with('success', 'DrinkConsumption created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $drinkConsumption = DrinkConsumption::find($id);

        return view('drink-consumption.show', compact('drinkConsumption'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $drinkConsumption = DrinkConsumption::find($id);

        return view('drink-consumption.edit', compact('drinkConsumption'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DrinkConsumption $drinkConsumption
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DrinkConsumption $drinkConsumption)
    {
        request()->validate(DrinkConsumption::$rules);

        $drinkConsumption->update($request->all());

        return redirect()->route('drink-consumptions.index')
            ->with('success', 'DrinkConsumption updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $drinkConsumption = DrinkConsumption::find($id)->delete();

        return redirect()->route('drink-consumptions.index')
            ->with('success', 'DrinkConsumption deleted successfully');
    }
}
