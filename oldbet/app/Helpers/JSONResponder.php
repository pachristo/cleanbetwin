<?php
/**
 * Created by PhpStorm.
 * User: OLADEJI BUSARI
 * Date: 5/17/2018
 * Time: 8:28 AM
 */

namespace App\Helpers;


class JSONResponder
{
    static function validationMessage($msg, $status = '1')
    {
        echo json_encode( array('post'=>$msg, 'status'=>$status), JSON_PRETTY_PRINT );
        exit();
    }
}