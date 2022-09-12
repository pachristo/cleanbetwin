<?php

/**
 * Created by PhpStorm.
 * User: OLADEJI BUSARI
 * Date: 5/17/2018
 * Time: 8:27 AM
 */
function currentUser()
{
    return \Cartalyst\Sentinel\Laravel\Facades\Sentinel::check();
}

function activeUser()
{
    if (currentUser()->subscription_status=='1') return true;
    return false;
}