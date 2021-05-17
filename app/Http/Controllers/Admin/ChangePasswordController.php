<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestChangePassword;
use App\Http\Requests\RequestUserUpdate;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.body.change_password');
    }

    /**
     * @param $id
     */

    public function updatePass(RequestChangePassword $request)
    {
        $request->validated();
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->current_password, $hashedPassword)) {
            $update = User::find(Auth::id())->update([
                'password'=>Hash::make($request->password),
            ]);
            if ($update) {
                Auth::logout();
                return redirect()->route('login')->with('success', 'Şifre değiştirildi.');
            } else {
                return redirect()->back()->with('error', 'HATA!Şifre değiştirilememiştir.');
            }

        } else {
            return redirect()->back()->with('error', 'HATA!Şifreniz yanlış.');
        }

    }

    public function myProfile()
    {
        $user = User::find(Auth::id());

        return view('admin.body.myProfile', compact('user'));
    }

    public function updateProfile(RequestUserUpdate $request, $id)
    {
        $request->validated();
        $update = User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        if ($update) {
            return redirect()->back()->with('success', 'Profile bilgileri değiştirildi..');
        } else {
            return redirect()->back()->with('error', 'HATA!Profile bilgileri değiştirilememiştir.');
        }
    }
}
