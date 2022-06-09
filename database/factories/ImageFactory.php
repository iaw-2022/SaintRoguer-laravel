<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{

    protected $model = Image::class;

    public function definition()
    {
        $extension = 'jpg';
        $file_extension = 'data:image/' . $extension . ';base64,';
        $file_get = file_get_contents("https://picsum.photos/" . "216" . "/" . "321");
        $image_content = base64_encode($file_get);
        return [
            'image_content' => $image_content,
            'extension' =>  $file_extension

        ];
    }

    public function faceImage()
    {
        $extension = 'jpg';
        $file_extension = 'data:image/' . $extension . ';base64,';
        $file_get = file_get_contents("https://api.lorem.space/image/face?w=" . "640" . "&h=" . "640");
        $image_content = base64_encode($file_get);
        return [
            'image_content' => $image_content,
            'extension' =>  $file_extension

        ];
    }
}
