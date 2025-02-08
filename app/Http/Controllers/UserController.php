<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // عرض جميع المستخدمين
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));  // افترض أن هناك عرض باسم users.index
    }

    // عرض تفاصيل مستخدم معين
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));  // افترض أن هناك عرض باسم users.show
    }

    // إنشاء مستخدم جديد
    public function create()
    {
        return view('users.create');  // افترض أن هناك عرض باسم users.create
    }

    // تخزين المستخدم في قاعدة البيانات
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'sale_data' => 'nullable|date',
            'employee_id' => 'required|exists:employees,id',
        ]);

        // تخزين المستخدم الجديد
        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),  // حفظ كلمة السر مشفرة
            'sale_data' => $request->sale_data,
            'employee_id' => $request->employee_id,
        ]);

        return redirect()->route('users.index');
    }

    // تعديل بيانات مستخدم
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));  // افترض أن هناك عرض باسم users.edit
    }

    // تحديث بيانات المستخدم
    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'sale_data' => 'nullable|date',
            'employee_id' => 'required|exists:employees,id',
        ]);

        $user = User::findOrFail($id);

        // تحديث البيانات
        $user->update([
            'username' => $request->username,
            'password' => $request->password ? Hash::make($request->password) : $user->password,  // إذا كانت كلمة السر غير فارغة يتم تحديثها
            'sale_data' => $request->sale_data,
            'employee_id' => $request->employee_id,
        ]);

        return redirect()->route('users.index');
    }

    // حذف مستخدم
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}
