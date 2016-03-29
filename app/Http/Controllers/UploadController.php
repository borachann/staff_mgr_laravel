<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Http\Requests\ImageRequest;

// use Illuminate\Support\Facades\File;
// use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{

    public function file(FileRequest $req)
    {
        $data = [];
        if ($req->hasFile('fileUpload')) {
            $file = $req->file('fileUpload');

            $data['extension'] = $file->getClientOriginalExtension();
            $data['name'] = $file->getFilename();
            $data['type'] = $file->getClientMimeType();
            $data['realpath'] = $file->getRealPath();
            $data['realname'] = $file->getClientOriginalName();
            $data['dynamicname'] = time() . $data['realname'];

            $file->move('upload/', $data['dynamicname']);
        }
        return $data;
    }

    public function image(ImageRequest $req)
    {
        $data = [];
        if ($req->hasFile('imageUpload')) {
            $file = $req->file('imageUpload');

            $data['extension'] = $file->getClientOriginalExtension();
            $data['name'] = $file->getFilename();
            $data['type'] = $file->getClientMimeType();
            $data['realpath'] = $file->getRealPath();
            $data['realname'] = $file->getClientOriginalName();
            $data['dynamicname'] = time() . $data['realname'];

            $file->move('upload/', $data['dynamicname']);
        }
        return $data;
    }

    // public function downloadImage()
    // {
    //     $result = $_POST['filename'];
    //     $entry = File::where('filename', $result)->firstOrFail();
    //     $file = Storage::disk()->get($entry->filePath);
    //     $headers = array('Content-Type' => $entry->mimetype);
    //     return response()->download(storage_path($entry->filePath), $result, $headers);
    // }

}
