<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Support\Str;

trait ImageUploadTrait
{
    protected $image_path = "app/public/images/covers";
    protected $image_height = 500;
    protected $image_width = 500;
    //
    public function uploadImage($img)
    {
        # code...
        $img_name = $this->imageName($img);
        // resize in save
        \Image::make($img)->resize($this->image_width, $this->image_height)->save(storage_path($this->image_path . '/' . $img_name));
        // 
        return 'images/covers/' . $img_name;
    }
    //
    public function imageName($image)
    {
        # code...
        $image = Str::slug(config('app.name') . ' image ' . str::slug(filter_var(Carbon::now(), FILTER_SANITIZE_NUMBER_INT))) . '.' . $image->extension();
        return $image;
    }
}
