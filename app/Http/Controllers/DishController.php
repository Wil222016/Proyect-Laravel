<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\DishType;
use App\Models\OfferedMenu;
use Illuminate\Http\Request;

/**
 * Class DishController
 * @package App\Http\Controllers
 */
class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $status = $request->query('status', 'A');
        $dishes = Dish::where('status', $status)->paginate();

        return view('dish.index', compact('dishes', 'status'))
            ->with('i', (request()->input('page', 1) - 1) * $dishes->perPage());
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dish = new Dish();
        $dishType = DishType::pluck('name', 'id');
        $offeredMenu = OfferedMenu::pluck('date', 'id');

        return view('dish.create', compact('dish', 'dishType', 'offeredMenu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Dish::$rules);

        $dish = Dish::create($request->all());

        return redirect()->route('dishes.index')
            ->with('success', 'Dish created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dish = Dish::find($id);

        return view('dish.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dish = Dish::find($id);
        $dishType = DishType::pluck('name', 'id');
        $offeredMenu = OfferedMenu::pluck('date', 'id');

        return view('dish.edit', compact('dish', 'dishType', 'offeredMenu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Dish $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        request()->validate(Dish::$rules);

        $dish->update($request->all());

        return redirect()->route('dishes.index')
            ->with('success', 'Dish updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $dish = Dish::find($id);
        $dish->status = 'I';
        $dish->save();

        return redirect()->route('dishes.index')
            ->with('success', 'Dish updated successfully');
    }
}
