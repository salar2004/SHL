<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    // عرض جميع المخزونات
    public function index()
    {
        $inventories = Inventory::all();
        return view('inventories.index', compact('inventories'));  // افترض أن هناك عرض باسم inventories.index
    }

    // عرض تفاصيل مخزون معين
    public function show($id)
    {
        $inventory = Inventory::findOrFail($id);
        return view('inventories.show', compact('inventory'));  // افترض أن هناك عرض باسم inventories.show
    }

    // إنشاء مخزون جديد
    public function create()
    {
        return view('inventories.create');  // افترض أن هناك عرض باسم inventories.create
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
        return redirect()->route('inventories.index');
    }

    // تعديل بيانات المخزون
    public function edit($id)
    {
        $inventory = Inventory::findOrFail($id);
        return view('inventories.edit', compact('inventory'));  // افترض أن هناك عرض باسم inventories.edit
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
        return redirect()->route('inventories.index');
    }

    // حذف المخزون
    public function destroy($id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();
        return redirect()->route('inventories.index');
    }
}
