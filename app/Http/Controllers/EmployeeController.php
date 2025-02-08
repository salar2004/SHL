<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // عرض جميع الموظفين
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));  // افترض أن هناك عرض باسم employees.index
    }

    // عرض تفاصيل موظف معين
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.show', compact('employee'));  // افترض أن هناك عرض باسم employees.show
    }

    // إنشاء موظف جديد
    public function create()
    {
        return view('employees.create');  // افترض أن هناك عرض باسم employees.create
    }

    // تخزين الموظف في قاعدة البيانات
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'salary' => 'required|numeric',
        ]);

        Employee::create($request->all());
        return redirect()->route('employees.index');
    }

    // تعديل بيانات الموظف
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.edit', compact('employee'));  // افترض أن هناك عرض باسم employees.edit
    }

    // تحديث بيانات الموظف
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'salary' => 'required|numeric',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update($request->all());
        return redirect()->route('employees.index');
    }

    // حذف الموظف
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('employees.index');
    }
}
