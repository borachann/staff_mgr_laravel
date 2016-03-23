<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use Illuminate\Support\Facades\File;

// use Illuminate\Support\Facades\Storage;

//
// use Request;

class UploadController extends Controller
{
    public function image(Request $req)
    {
        $data = [];

        if ($req->has('imageUpload')) {

            $file = $req->file('imageUpload');

            $data['extension'] = $file->getClientOriginalExtension();
            $data['name'] = $file->getFilename();
            $data['type'] = $file->getClientMimeType();
            $data['realpath'] = $file->getRealPath();
            $data['realname'] = $file->getClientOriginalName();

            $file->move('upload/', $data['realname'] . '.' . $data['extension']);
        }

        // Storage::disk('local')->put($data['name'] . '.' . $data['extension'], File::get($file)),

        return $data;

        // $extension = $file->getClientOriginalExtension();

        // Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
        // $entry = new Fileentry();
        // $entry->mime = $file->getClientMimeType();
        // $entry->original_filename = $file->getClientOriginalName();
        // $entry->filename = $file->getFilename().'.'.$extension;

        // $entry->save();

        // return redirect('fileentry');
    }
}
