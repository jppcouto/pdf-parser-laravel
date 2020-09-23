<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function uploadForm()
    {
        return view('home');
    }

    public function uploadFile(Request $req)
    {
        $path= $req->file->store('public');

        return view('upload')->with('path',$path);
    }
}
