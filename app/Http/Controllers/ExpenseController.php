<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    // عرض جميع النفقات
    public function index()
    {
        $expenses = Expense::all();
        return view('expenses.index', compact('expenses'));  // افترض أن هناك عرض باسم expenses.index
    }

    // عرض تفاصيل نفقة معينة
    public function show($id)
    {
        $expense = Expense::findOrFail($id);
        return view('expenses.show', compact('expense'));  // افترض أن هناك عرض باسم expenses.show
    }

    // إنشاء نفقة جديدة
    public function create()
    {
        return view('expenses.create');  // افترض أن هناك عرض باسم expenses.create
    }

    // تخزين النفقة في قاعدة البيانات
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required|string|max:255',
            'expense_date' => 'required|date',
        ]);

        Expense::create($request->all());
        return redirect()->route('expenses.index');
    }

    // تعديل بيانات النفقة
    public function edit($id)
    {
        $expense = Expense::findOrFail($id);
        return view('expenses.edit', compact('expense'));  // افترض أن هناك عرض باسم expenses.edit
    }

    // تحديث بيانات النفقة
    public function update(Request $request, $id)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required|string|max:255',
            'expense_date' => 'required|date',
        ]);

        $expense = Expense::findOrFail($id);
        $expense->update($request->all());
        return redirect()->route('expenses.index');
    }

    // حذف النفقة
    public function destroy($id)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();
        return redirect()->route('expenses.index');
    }
}
