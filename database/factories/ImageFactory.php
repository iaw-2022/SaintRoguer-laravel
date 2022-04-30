<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $image = $this->faker->image('public/storage/posters', 216, 321, 'posters');
        $file_extension = 'data:image/' . pathinfo($image, PATHINFO_EXTENSION) . ';base64,';
        $file_name = pathinfo($image, PATHINFO_BASENAME);
        $image_content = base64_encode(file_get_contents(public_path('storage/posters/' . $file_name)));
        return [
            'image_content' => $image_content,
            'extension' =>  $file_extension

        ];
    }
}
