<?php

namespace App\Http\Controllers;

use App\Models\DishOfferedMenu;
use Illuminate\Http\Request;

/**
 * Class DishOfferedMenuController
 * @package App\Http\Controllers
 */
class DishOfferedMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishOfferedMenus = DishOfferedMenu::paginate();

        return view('dish-offered-menu.index', compact('dishOfferedMenus'))
            ->with('i', (request()->input('page', 1) - 1) * $dishOfferedMenus->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dishOfferedMenu = new DishOfferedMenu();
        return view('dish-offered-menu.create', compact('dishOfferedMenu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DishOfferedMenu::$rules);

        $dishOfferedMenu = DishOfferedMenu::create($request->all());

        return redirect()->route('dish-offered-menus.index')
            ->with('success', 'DishOfferedMenu created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dishOfferedMenu = DishOfferedMenu::find($id);

        return view('dish-offered-menu.show', compact('dishOfferedMenu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dishOfferedMenu = DishOfferedMenu::find($id);

        return view('dish-offered-menu.edit', compact('dishOfferedMenu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DishOfferedMenu $dishOfferedMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DishOfferedMenu $dishOfferedMenu)
    {
        request()->validate(DishOfferedMenu::$rules);

        $dishOfferedMenu->update($request->all());

        return redirect()->route('dish-offered-menus.index')
            ->with('success', 'DishOfferedMenu updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $dishOfferedMenu = DishOfferedMenu::find($id)->delete();

        return redirect()->route('dish-offered-menus.index')
            ->with('success', 'DishOfferedMenu deleted successfully');
    }
}
