<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestSlider;
use App\Http\Requests\RequestSliderEdit;
use App\Models\Slider;
use Carbon\Carbon;
use DB;
use Intervention\Image\Facades\Image;


class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::latest()->paginate(3);
        Carbon::setLocale('tr');
        return view('admin.slider.index', compact('sliders'));
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
    public function store(RequestSlider $request)
    {
        $request->validated();
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . strtolower($image->getClientOriginalExtension());
        Image::make($image)->resize('1920')->save('image/slider/' . $name_gen);
        $last_img = 'image/slider/' . $name_gen;

        DB::beginTransaction();
        try {
            $insert = Slider::insert([
                'title' => $request->title,
                'image' => $last_img,
                'description' => $request->description,
                'created_at' => \Illuminate\Support\Carbon::now()

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
            return redirect()->back()->with('success', 'Slider successfully added.');

        } else {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error ! Slider could not be added');
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
        $singleSlider = Slider::find($id);
        $sliders = Slider::latest()->paginate(3);
        Carbon::setLocale('tr');
        return view('admin.slider.edit', compact('sliders', 'singleSlider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestSliderEdit $request, $id)
    {
        $request->validated();

        $old_image = $request->old_image;
        $image = $request->file('image');

        if (empty($image)) {
            DB::beginTransaction();
            try {
                $update = Slider::find($id)->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'created_at' => \Illuminate\Support\Carbon::now()

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
                return redirect()->back()->with('toast_success', 'Slider successfully updated.');

            } else {
                DB::rollBack();
                return redirect()->back()->with('toast_error', 'Error ! Slider could not be updated');
            }

        } else {

            $name_gen = hexdec(uniqid()) . '.' . strtolower($image->getClientOriginalExtension());
            Image::make($image)->resize('1920')->save('image/slider/' . $name_gen);
            $last_img = 'image/slider/' . $name_gen;

            unlink($old_image);
            DB::beginTransaction();
            try {
                $update = Slider::find($id)->update([
                    'title' => $request->title,
                    'image' => $last_img,
                    'description' => $request->description,
                    'created_at' => \Illuminate\Support\Carbon::now()

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
                return redirect()->back()->with('success', 'Slider successfully updated.');

            } else {
                DB::rollBack();
                return redirect()->back()->with('error', 'Error ! Slider could not be updated');
            }
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
        $singleSlider = Slider::find($id);
        $imageDelete = unlink($singleSlider->image);

        if ($imageDelete) {
            $deleted = Slider::find($id)->delete();
            if ($deleted) {
                DB::commit();
                return redirect()->route('slider.index')->with('success', 'Slider is deleted.');

            } else {
                DB::rollBack();
                return redirect() - route('slider.index')->with('error', 'ERROR ! Slider is not deleted.');
            }
        } else {
            DB::rollBack();
            return redirect()->route('slider.index')->with('error', 'ERROR ! Slider is not deleted.Because slider image not deleted');
        }
    }
}
