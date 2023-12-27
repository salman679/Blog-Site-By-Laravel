<?php

namespace App\Http\Controllers\Back;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function slider()
    {
        $Slider = Slider::orderBy('created_at', 'DESC')->get();
        return view('back.slider.slider', compact('Slider'));
    }

    public function create()
    {
        return view('back.slider.create_slider');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:256',
            'image' => 'required|image|mimes:png,jpg|max:2024'
        ]);

        $slider = new Slider();
        $slider->title = $request->title;
        $slider->image = image_template(SLIDER_IMAGE_PATH, $request->image, null, 1980, 800, 0, null);
        $slider->thumbnail = image_template(THUMBNAIL_IMAGE_PATH, $request->image, null, 300, 121, 25, null);

        $slider->save();

        return redirect()->route('back.slider.index')->with('success', 'Slider has successfully added.');
    }

    public function edit($id)
    {
        $Slider = Slider::where('id', $id)->firstOrFail(['id', 'title', 'image']);

        return view('back.slider.edit_slider', compact('Slider'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'max:256',
            'image' => 'image|mimes:png,jpg|max:2024'
        ]);

        $slider = Slider::where('id', $id)->firstOrFail();

        $slider->title = $request->title;

        // if ($request->image) {
        //     $slider->image = image_template(SLIDER_IMAGE_PATH, $request->image, $slider->image, 1980, 800, 0);
        //     $slider->thumbnail = image_template(THUMBNAIL_IMAGE_PATH, $request->image, $slider->thumbnail, 300, 100, 25);
        // }

        if ($request->hasFile('image')) {
            unlink(public_path($slider->image));

            $path = SLIDER_IMAGE_PATH;
            $image_name = rand(111, 999) . $request->image->getClientOriginalName();
            $db_name = $path . $image_name;

            $request->image->move(public_path($path), $image_name);

            $slider->image = $db_name;
        }

        $slider->save();

        return redirect()->route('back.slider.index')->with('success', 'Slider updated successfully.');
    }

    public function delete(Request $request)
    {
        $slider = Slider::where('id', $request->id)->firstOrFail();
        unlink(public_path($slider->image));
        unlink(public_path($slider->thumbnail));

        $slider->delete();

        return redirect()->route('back.slider.index')->with('success', 'Slider removed successfully.');
    }
}
