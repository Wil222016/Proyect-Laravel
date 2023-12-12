<?php

namespace App\Http\Controllers;

use App\Models\TypeMenu;
use Illuminate\Http\Request;

/**
 * Class TypeMenuController
 * @package App\Http\Controllers
 */
class TypeMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeMenus = TypeMenu::paginate();

        return view('type-menu.index', compact('typeMenus'))
            ->with('i', (request()->input('page', 1) - 1) * $typeMenus->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeMenu = new TypeMenu();
        return view('type-menu.create', compact('typeMenu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(TypeMenu::$rules);

        $typeMenu = TypeMenu::create($request->all());

        return redirect()->route('type_menus.index')
            ->with('success', 'TypeMenu created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $typeMenu = TypeMenu::find($id);

        return view('type-menu.show', compact('typeMenu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typeMenu = TypeMenu::find($id);

        return view('type-menu.edit', compact('typeMenu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TypeMenu $typeMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeMenu $typeMenu)
    {
        request()->validate(TypeMenu::$rules);

        $typeMenu->update($request->all());

        return redirect()->route('type_menus.index')
            ->with('success', 'TypeMenu updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $typeMenu = TypeMenu::find($id)->delete();

        return redirect()->route('type_menus.index')
            ->with('success', 'TypeMenu deleted successfully');
    }
}
