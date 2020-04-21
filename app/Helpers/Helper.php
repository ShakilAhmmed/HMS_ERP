<?php
namespace App\Helpers;
class Helper
{
    public static function ImageExtension($ext)
    {
        $image_allowed=['jpg','jpeg','png'];
        if(!in_array($ext,$image_allowed))
        {
            return 'Allowed Only '.implode(',',$image_allowed);
        }
        return "Allowed";
    }
}
