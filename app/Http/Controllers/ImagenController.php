<?php

namespace App\Http\Controllers;


use Response;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class ImagenController extends Controller
{
    public static function imagen($filename)
    {
        return Image::make(Storage::get('/fotos/'.$filename))->response();
    }

    public static function informe($filename)
    {

        $pdf = Storage::get('/informes/' . $filename);


        return response()->file(storage_path('app/'.'/informes/' . $filename));
    }


}
