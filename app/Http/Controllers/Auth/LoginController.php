<?php
// filepath: /D:/Maps/Market/SHL/app/Http/Controllers/Auth/LoginController.php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use Notifiable;

    protected $role;

    protected function authenticated($request, $user)
    {
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('user.dashboard');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
     // ...existing code...

     public function hasRole($role)
     {
         return $this->role === $role;
     }
}
