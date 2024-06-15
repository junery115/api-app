<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dummyAPI extends Controller
{
    function getData()
    {
        return [
            "name" => "Japheth",
            "email" => "japhethjay.com",
            "address" => "Cite verte"

        ];
    }
}
