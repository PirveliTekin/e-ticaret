<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestAdminContact;
use App\Http\Requests\RequestAdminEditContact;
use App\Models\AdminContact;
use App\Models\Contact;
use Carbon\Carbon;
use DB;


class AdminContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $contactProfiles = AdminContact::all();
        Carbon::setLocale('tr');
        return view('admin.contact.index', compact('contactProfiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestAdminContact $request)
    {
        $request->validated();

        DB::beginTransaction();
        try {
            $insert = AdminContact::insert([
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'map' => $request->map,
                'created_at' => Carbon::now()
            ]);

            if ($insert) {
                $success = true;
            } else {
                $success = false;
            }

        } catch (\Exception $exception) {
            $success = true;
        }
        if ($success === true) {
            DB::commit();
            return redirect()->route('admincontact.index')->with('toast_success', 'Kayıt başarılı bir şekilde yapılmıştır');
        } else {
            DB::rollBack();
            return redirect()->back()->with('toast_error', 'HATA! Kayıt yapılamayacaktır');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adminContact = AdminContact::find($id);
        return view('admin.contact.edit', compact('adminContact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestAdminEditContact $request, $id)
    {
        $request->validated();
        DB::beginTransaction();
        try {
            $update = AdminContact::find($id)->update([
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'map' => $request->map,
                'created_at' => Carbon::now()
            ]);

            if ($update) {
                $success = true;
            } else {
                $success = false;
            }

        } catch (\Exception $exception) {
            $success = true;
        }
        if ($success === true) {
            DB::commit();
            return redirect()->route('admincontact.index')->with('success', 'Kayıt başarılı bir şekilde güncellendi');
        } else {
            DB::rollBack();
            return redirect()->back()->with('error', 'HATA! Kayıt güncellenemedi');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $delete = AdminContact::find($id)->delete();
        if ($delete) {
            return redirect()->back()->with('success', 'Başarı ile Silindi');
        } else {
            return redirect()->back()->with('arror', 'Başarıyla Silindi');
        }
    }

    public function messageContact()
    {
        $contactMessages=Contact::all();
        Carbon::setLocale('tr');
        return view('admin.contact.message',compact('contactMessages'));
    }
}
