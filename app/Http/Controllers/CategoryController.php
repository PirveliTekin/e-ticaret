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

        //$categories=Category::all()->paginate(5);
        $categories = Category::latest()->paginate(5);
        Carbon::setLocale('tr');
        return view('admin.category.index', compact('categories'));
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
        $isCategory = Category::where('category_name', $request->category_name)->first();

        if (!$isCategory) {
            DB::beginTransaction();
            try {
                $insert = Category::insert([
                    'category_name' => $request->category_name,
                    'user_id' => \Auth::user()->id,
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
                return redirect()->back()->with('success', 'Category successfully added.');

            } else {
                DB::rollBack();
                return redirect()->back()->with('error', 'Error ! Category could not be added');
            }

        } else {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error ! There is a category with this name');
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
        $singleCategory = Category::find($id);
        $categories = Category::latest()->paginate(5);
        return view('admin.category.edit', compact('singleCategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestCategory $request, $id)
    {
        $request->validated();

        DB::beginTransaction();
        try {
            /*$category = Category::find($id);
            $category->category_name = $request->category_name;
            $category->user_id = \Auth::user()->id;
            $category->updated_at = Carbon::now();
            $save = $category->save();*/
            $save = Category::find($id)->update([
                'category_name' => $request->category_name,
                'user_id' => \Auth::user()->id,
                'updated_at' => Carbon::now()
            ]);
            if ($save) {
                $success = true;
            } else {
                $success = false;
            }

        } catch (\Exception $exception) {
            $success = true;
        }
        if ($success === true) {
            DB::commit();
            return redirect()->back()->with('success', 'Category successfully updated.');

        } else {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error ! Category could not updated');
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

        $deleted = Category::find($id)->delete();

        if ($deleted) {
            DB::commit();
            return redirect()->back()->with('success', 'Category is deleted.');

        } else {
            DB::rollBack();
            return redirect()->back()->with('error', 'ERROR ! Category is not deleted.');
        }

    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * Alternative Delete Method
     */

    public function delete($id)
    {
        $deleted = Category::find($id)->delete();

        if ($deleted) {
            DB::commit();
            return redirect()->back()->with('success', 'Category is deleted.');

        } else {
            DB::rollBack();
            return redirect()->back()->with('error', 'ERROR ! Category is not deleted.');
        }
    }
}
