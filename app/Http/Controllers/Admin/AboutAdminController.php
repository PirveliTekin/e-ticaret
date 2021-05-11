<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestHomeAbout;
use App\Http\Requests\RequestHomeEditAbout;
use App\Models\HomeAbout;
use Illuminate\Support\Carbon;
use DB;



class AboutAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homeAbouts = HomeAbout::latest()->get();
        Carbon::setLocale('tr');
        return view('admin.about.index', compact('homeAbouts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RequestHomeAbout $request)
    {
        $request->validated();
        Carbon::setLocale('tr');
        DB::beginTransaction();
        try {
            $HomeAbout = HomeAbout::insert([
                'title' => $request->title,
                'short_dis' => $request->short_dis,
                'long_dis' => $request->long_dis,
                'created_at' => Carbon::now()
            ]);


            if ($HomeAbout) {
                $success = true;
            } else {
                $success = false;
            }

        } catch (\Exception $exception) {
            $success = false;
        }


        if ($success === true) {
            DB::commit();
            return redirect()->route('aboutadmin.index')->with('toast_success','Başarılı bir şekilde eklendi.');
        } else {
            DB::rollBack();
            return redirect()->back()->with('toast_error','Bir şeyler ters gitti eklenemedi.');
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
        $singleHomeAbout = HomeAbout::find($id);

        return view('admin.about.edit', compact('singleHomeAbout'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(RequestHomeEditAbout $request, $id)
    {
        $request->validated();
        Carbon::setLocale('tr');
        DB::beginTransaction();
        try {
            $HomeAbout = HomeAbout::find($id)->update([
                'title' => $request->title,
                'short_dis' => $request->short_dis,
                'long_dis' => $request->long_dis,
                'updated_at' => Carbon::now()
            ]);


            if ($HomeAbout) {
                $success = true;
            } else {
                $success = false;
            }

        } catch (\Exception $exception) {
            $success = false;
        }


        if ($success === true) {
            DB::commit();
            return redirect()->route('aboutadmin.index')->with('success', 'Kayıt başarılı bir şekilde güncellendi.');

        } else {
            DB::rollBack();
            return redirect()->back()->with('toast_error', 'HATA!Kayıt başarılı bir şekilde güncellendi.');
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

    public function delete($id)
    {
        $delete = HomeAbout::find($id)->delete();
        if ($delete) {
            return redirect()->route('aboutadmin.index')->with('success', 'Kayıt başarılı bir şekilde silinmiştir.');
        } else {
            return redirect()->back()->with('error', 'HATA! Başarılı bir şekilde silinememiştir.');
        }

    }
}
