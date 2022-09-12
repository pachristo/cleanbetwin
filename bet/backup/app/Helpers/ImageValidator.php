<?php
/**
 * Created by PhpStorm.
 * User: OLADEJI BUSARI
 * Date: 5/17/2018
 * Time: 8:29 AM
 */

namespace App\Helpers;


class ImageValidator
{
    static function validator($file, $id)
    {
        $extension = $file->getClientOriginalExtension();
        $fileSupport = ['jpg', 'jpeg', 'png', 'PNG', 'JPEG', 'JPG', 'gif', 'GIF'];
        if(in_array($extension, $fileSupport))
        {
//            $code = rand(1111111,9999999);
            return $filename = currentUser()->id.$id.'.'.$extension;
        }
        else{
            JSONResponder::validationMessage('Image/File Type Not Supported');
        }
    }
}