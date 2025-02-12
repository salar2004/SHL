<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    // عرض جميع المخزونات
    public function index()
    {
        $Inventory = Inventory::all();
        return view('Inventory.index', compact('Inventory'));  // افترض أن هناك عرض باسم Inventory.index
    }

    // عرض تفاصيل مخزون معين
    public function show($id)
    {
        $inventory = Inventory::findOrFail($id);
        return view('Inventory.show', compact('inventory'));  // افترض أن هناك عرض باسم Inventory.show
    }

    // إنشاء مخزون جديد
    public function create()
    {
        return view('Inventory.create');  // افترض أن هناك عرض باسم Inventory.create
    }

    // تخزين المخزون في قاعدة البيانات
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:goods,id',
            'location' => 'required|string|max:255',
            'stock_level' => 'required|integer',
        ]);

        Inventory::create($request->all());
        return redirect()->route('Inventory.index');
    }

    // تعديل بيانات المخزون
    public function edit($id)
    {
        $inventory = Inventory::findOrFail($id);
        return view('Inventory.edit', compact('inventory'));  // افترض أن هناك عرض باسم Inventory.edit
    }

    // تحديث بيانات المخزون
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required|exists:goods,id',
            'location' => 'required|string|max:255',
            'stock_level' => 'required|integer',
        ]);

        $inventory = Inventory::findOrFail($id);
        $inventory->update($request->all());
        return redirect()->route('Inventory.index');
    }

    // حذف المخزون
    public function destroy($id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();
        return redirect()->route('Inventory.index');
    }
}
