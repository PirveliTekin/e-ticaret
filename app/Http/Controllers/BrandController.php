<?php

namespace App\Http\Controllers;


use App\Http\Requests\RequestBrand;
use App\Http\Requests\RequestBrandEdit;
use App\Models\Brand;
use App\Models\Multipic;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::latest()->paginate(5);
        Carbon::setLocale('tr');
        return view('admin.brand.index', compact('brands'));
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
    public function store(RequestBrand $request)
    {
        $request->validated();

        $brand_image = $request->file('brand_image');
        /*$name_gen = hexdec(uniqid());
        $img_ext = strtolower($brand_image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $up_location = 'image/brand/';
        $last_img = $up_location . $img_name;
        $brand_image->move($up_location, $img_name);*/

        $name_gen = hexdec(uniqid()) . '.' . strtolower($brand_image->getClientOriginalExtension());
        Image::make($brand_image)->resize('400')->save('image/brand/' . $name_gen);
        $last_img = 'image/brand/' . $name_gen;

        DB::beginTransaction();
        try {
            $insert = Brand::insert([
                'brand_name' => $request->brand_name,
                'brand_image' => $last_img,
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
            return redirect()->back()->with('success', 'Brand successfully added.');

        } else {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error ! Brand could not be added');
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
        $singleBrand = Brand::find($id);
        $brands = Brand::latest()->paginate(5);
        Carbon::setLocale('tr');
        return view('admin.brand.edit', compact('singleBrand', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestBrandEdit $request, $id)
    {
        $request->validated();

        $old_image = $request->old_image;
        $brand_image = $request->file('brand_image');

        if (empty($brand_image)) {
            DB::beginTransaction();
            try {
                $insert = Brand::find($id)->update([
                    'brand_name' => $request->brand_name,
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
        } else {
            /*$name_gen = hexdec(uniqid());
            $img_ext = strtolower($brand_image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;
            $up_location = 'image/brand/';
            $last_img = $up_location . $img_name;
            $brand_image->move($up_location, $img_name);*/

            $name_gen = hexdec(uniqid()) . '.' . strtolower($brand_image->getClientOriginalExtension());
            Image::make($brand_image)->resize('400')->save('image/brand/' . $name_gen);
            $last_img = 'image/brand/' . $name_gen;

            unlink($old_image);
            DB::beginTransaction();
            try {
                $insert = Brand::find($id)->update([
                    'brand_name' => $request->brand_name,
                    'brand_image' => $last_img,
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
        }

        if ($success === true) {
            DB::commit();
            return redirect()->back()->with('success', 'Brand successfully updated.');

        } else {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error ! Brand could not be updated');
        }

    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function delete($id)
    {
        $singleBrand = Brand::find($id);
        $imageDelete = unlink($singleBrand->brand_image);

        if ($imageDelete) {
            $deleted = Brand::find($id)->delete();
            if ($deleted) {
                DB::commit();
                return redirect()->route('brand.index')->with('success', 'Brand is deleted.');

            } else {
                DB::rollBack();
                return redirect() - route('brand.index')->with('error', 'ERROR ! Category is not deleted.');
            }
        } else {
            DB::rollBack();
            return redirect()->route('brand.index')->with('error', 'ERROR ! Brand is not deleted.Because Brand image not deleted');
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
     * @return \Illuminate\Contracts\Foundation\Application|
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function multipic()
    {
        $multiImages = Multipic::all();
        return view('admin.multipics.index', compact('multiImages'));

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function multipicAdd(Request $request)
    {

        $images = $request->file('image');
        foreach ($images as $image) {
            $name_gen = hexdec(uniqid()) . '.' . strtolower($image->getClientOriginalExtension());
            Image::make($image)->resize('300', '200')->save('image/multi/' . $name_gen);
            $last_img = 'image/multi/' . $name_gen;
            Multipic::insert([
                'image' => $last_img,
                'created_at' => Carbon::now()
            ]);
        }
        return redirect()->back()->with('success', 'Pictures successfully added.');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */

    public function Logout()
    {
        Auth::logout();
        return Redirect()->route('login')->with('success', 'User Logout');
    }

}
