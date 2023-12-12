<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\OfferedMenu;
use App\Models\Schedule;
use App\Models\Semester;
use App\Models\TypeMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OfferedMenuController extends Controller
{
    public function index()
    {
        $offeredMenus = OfferedMenu::paginate();

        return view('offered-menu.index', compact('offeredMenus'))
            ->with('i', (request()->input('page', 1) - 1) * $offeredMenus->perPage());
    }

    public function apiIndex()
    {
        $offeredMenus = OfferedMenu::with(['typeMenu', 'category', 'dishes', 'dishOfferedMenuses', 'entryRegisters', 'reservations', 'schedule', 'semester'])->paginate(4);
        return response()->json(['offeredMenus' => $offeredMenus]);
    }

    public function create()
    {
        $offeredMenu = new OfferedMenu();
        $semesters = Semester::pluck('management', 'id'); // Reemplaza 'name' y 'id' con los nombres reales de tus columnas en la tabla de semestres
        $typeMenus = TypeMenu::pluck('name', 'id'); // Reemplaza 'name' y 'id' con los nombres reales de tus columnas en la tabla de tipos de menú
        $schedules = Schedule::pluck('opening_time', 'id'); // Reemplaza 'name' y 'id' con los nombres reales de tus columnas en la tabla de horarios
        $categories = Category::pluck('name', 'id'); // Reemplaza 'name' y 'id' con los nombres reales de tus columnas en la tabla de categorías

        return view('offered-menu.create', compact('offeredMenu', 'semesters', 'typeMenus', 'schedules', 'categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'price' => 'required|numeric',
            'date' => 'required|date',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|string|max:1',
            'semester_id' => 'required|exists:semesters,id',
            'type_menu_id' => 'required|exists:type_menus,id',
            'schedule_id' => 'required|exists:schedules,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $imagePath = $request->file('photo')->store('public/offered_menu_images');
            $data['photo'] = str_replace('public/', '', $imagePath);
        }

        OfferedMenu::create($data);

        return redirect()->route('offered_menus.index')
            ->with('success', 'OfferedMenu created successfully.');
    }

    public function show($id)
    {
        $offeredMenu = OfferedMenu::find($id);

        return view('offered-menu.show', ['offeredMenu' => $offeredMenu, 'menuId' => $id]);
    }


    public function edit($id)
    {
        $offeredMenu = OfferedMenu::find($id);

        $semesters = Semester::pluck('management', 'id');
        $typeMenus = TypeMenu::pluck('name', 'id');
        $schedules = Schedule::pluck('opening_time', 'id');
        $categories = Category::pluck('name', 'id');

        return view('offered-menu.edit', compact('offeredMenu', 'semesters', 'typeMenus', 'schedules', 'categories'));
    }

    public function update(Request $request, OfferedMenu $offeredMenu)
    {
        $request->validate([
            'price' => 'required|numeric',
            'date' => 'required|date',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|string|max:1',
            'semester_id' => 'required|exists:semesters,id',
            'type_menu_id' => 'required|exists:type_menus,id',
            'schedule_id' => 'required|exists:schedules,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $imagePath = $request->file('photo')->store('public/offered_menu_images');
            $data['photo'] = str_replace('public/', '', $imagePath);

            if ($offeredMenu->photo && Storage::disk('public')->exists($offeredMenu->photo)) {
                Storage::disk('public')->delete($offeredMenu->photo);
            }
        }

        $offeredMenu->update($data);

        return redirect()->route('offered_menus.index')
            ->with('success', 'OfferedMenu updated successfully');
    }

    public function destroy($id)
    {
        $offeredMenu = OfferedMenu::find($id);

        if (!$offeredMenu) {
            return redirect()->route('offered_menus.index')->with('error', 'OfferedMenu not found');
        }

        $image = $offeredMenu->photo;

        $offeredMenu->delete();

        if ($image && Storage::disk('public')->exists($image)) {
            Storage::disk('public')->delete($image);
        }

        return redirect()->route('offered_menus.index')->with('success', 'OfferedMenu deleted successfully');
    }
}
