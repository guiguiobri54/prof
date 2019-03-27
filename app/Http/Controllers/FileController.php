<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function showUploadForm($idStudy)
    {
        //dd($popo);
        return view('DocumentUpload',compact('idStudy'));
    }
}
