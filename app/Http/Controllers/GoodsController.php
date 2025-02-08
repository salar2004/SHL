<?php

namespace App\Http\Controllers;

use App\Models\Good;  // نموذج Good
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    // عرض جميع المنتجات
    public function index()
    {
        $goods = Good::all();
        return view('goods.index', compact('goods'));  // افترض أن هناك عرض باسم goods.index
    }

    // عرض تفاصيل منتج معين
    public function show($id)
    {
        $good = Good::findOrFail($id);
        return view('goods.show', compact('good'));  // افترض أن هناك عرض باسم goods.show
    }

    // إنشاء منتج جديد
    public function create()
    {
        return view('goods.create');  // افترض أن هناك عرض باسم goods.create
    }

    // تخزين منتج جديد في قاعدة البيانات
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'supplier_id' => 'required|exists:suppliers,id',
            'stock' => 'required|integer',
        ]);

        Good::create($request->all());
        return redirect()->route('goods.index');
    }

    // تعديل بيانات منتج
    public function edit($id)
    {
        $good = Good::findOrFail($id);
        return view('goods.edit', compact('good'));  // افترض أن هناك عرض باسم goods.edit
    }

    // تحديث بيانات المنتج في قاعدة البيانات
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'supplier_id' => 'required|exists:suppliers,id',
            'stock' => 'required|integer',
        ]);

        $good = Good::findOrFail($id);
        $good->update($request->all());
        return redirect()->route('goods.index');
    }

    // حذف منتج
    public function destroy($id)
    {
        $good = Good::findOrFail($id);
        $good->delete();
        return redirect()->route('goods.index');
    }
}
