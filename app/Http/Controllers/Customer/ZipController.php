<?php

namespace App\Http\Controllers\Customer;

use ZipArchive;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ZipController extends Controller
{
    public function zipCreateAdnDownload()
    {
        $zip = new ZipArchive;
        $fileName ="myZip.zip";

        if($zip->open(public_path($fileName),ZipArchive::CREATE)==TRUE){
            $files = File::files(public_path('upload/customer_images'));
            foreach($files as $key => $value){
                $ralativeNazme = basename($value);
                $zip->addFile($value,$ralativeNazme);
            }
            $zip->close();
        }   

        return response()->download(public_path($fileName));
     }
}
