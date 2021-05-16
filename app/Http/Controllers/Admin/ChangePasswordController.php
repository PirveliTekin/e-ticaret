<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestChangePassword;
use App\Models\User;
use Auth;
use Hash;

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
        /*$hashedPassword = Auth::user()->password;
        if (Hash::check($request->current_password, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            if ($user->save()) {
                Auth::logout();
                return redirect()->route('login')->with('success','Şifre değiştirildi.');
            } else {
                return redirect()->back()->with('error', 'HATA!Şifre değiştirilememiştir.');

            }

        } else {*/
            return redirect()->back()->with('error', 'HATA!Şifreniz yanlış.');
       /* }*/

    }
}
