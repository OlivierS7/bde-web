<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Image;
use Illuminate\Support\Facades\Response;
use ZanySoft\Zip\Zip;

class ImageController extends Controller
{
    public function download()
    {
        $zip = Zip::create(public_path('images.zip'))->add(public_path('storage/app/public/image/', true))->close();
        return Response::download('images.zip')->deleteFileAfterSend(true);
    }

}
