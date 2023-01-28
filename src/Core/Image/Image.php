<?php

namespace src\Core\Image;

class Image
{
    public static function add(string $name): bool
    {
        // Create the size of image or blank image
        $image = imagecreate(500, 300);

        // Set the background color of image
        $background_color = imagecolorallocate($image, 0, 153, 0);

        // Set the text color of image
        $text_color = imagecolorallocate($image, 255, 255, 255);

        // Function to create image which contains string.
        imagestring($image, 5, 180, 100, $name, $text_color);

        //header("Content-Type: image/png");

        // Save the image
        imagepng($image, 'public/img/'.$name.'.png');

        imagepng($image);
        imagedestroy($image);

        return true;
    }

}
