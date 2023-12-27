<?php

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

const SLIDER_IMAGE_PATH = "uploaded_image/slider/";
const THUMBNAIL_IMAGE_PATH = "uploaded_image/slider/thumbnail/";

const USER_AVATAR = "uploaded_Image/user/";
const USER_AVATAR_THUMBNAIL = "uploaded_Image/user/thumbnail/";

const BLOG_IMAGE = "uploaded_image/blog/";
const BLOG_IMAGE_SM = "uploaded_image/blog/sm/";
const BLOG_IMAGE_THUMBNAIL = "uploaded_image/blog/thumbnail/";

const STATUS_MSG = ['Active', 'Inactive', 'Draft'];


// image_template
function image_template($dir, $image, $old = null, $w, $h, $blur = null)
{
    // update image unlink
    if ($old) {
        unlink(public_path($old));
    }

    // check upload directory
    if (!is_dir(public_path($dir))) {
        mkdir(public_path($dir), 0777, true);
    }

    // image remake
    $ext = $image->getClientOriginalExtension();
    $imageName = Str::slug($image->getClientOriginalName());
    $imageName = str_replace($ext, '', $imageName) . '_' . rand(222, 777) . '.' . strtolower($ext);

    // image upload to public folder
    Image::make($image)
        ->fit($w, $h)
        ->blur($blur)
        ->save(public_path($dir) . $imageName);

    // image upload to database
    return $dir . $imageName;
}

// remove image
function deleteImg($img)
{
    if ($img) {
        unlink(public_path($img));
    }
}
