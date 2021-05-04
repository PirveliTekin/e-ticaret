<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestCategory;
use App\Models\Category;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestCategory $request)
    {
        $request->validated();
        $isCategory = Category::find($request->category_name);
        if (!$isCategory) {
            DB::beginTransaction();
            try {
                $insert = Category::insert([
                    'category_name' => $request->category_name,
                    'user_id'=>\Auth::user()->id,
                    'created_at'=>Carbon::now()

                ]);
                if ($insert) {
                    $success = true;
                } else {
                    $success = false;
                }

            } catch (\Exception $exception) {
                $success = true;
            }
            if($success===true){
                DB::commit();
                return redirect()->back()->with('success','Category successfully added.');

            }else{
                DB::rollBack();
                return redirect()->back()->with('error','Error ! Category could not be added');
            }

        } else {
            DB::rollBack();
            return redirect()->back()->with('error','Error ! Category could not be added');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
