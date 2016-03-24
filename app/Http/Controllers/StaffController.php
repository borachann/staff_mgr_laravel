<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StaffController extends Controller
{

    private $staffPerPage = 10;

    public function index(Request $request)
    {
        $key = $request->has('key') ? $request->input('key') : '';
        $data['key'] = $key;
        $data['staffs'] = Staff::searchOrList($key)->paginate($this->staffPerPage);
        // if ($request->has('key')) {
        //     $data['key'] = $request->key;
        //     $data['staffs'] = Staff::where('status', true)
        //         ->Where(function ($query) use ($request) {
        //             $query->where('fp_number', $request->key)
        //                 ->orwhere('name', 'like', $request->key . '%');})
        //         ->orderBy('name', 'asc')->paginate($this->staffPerPage);

        // } else {
        //     // $data['staffs'] = Staff::latest()->paginate(5);

        //     $data['staffs'] = Staff::where('status', true)->orderBy('name', 'asc')->paginate($this->staffPerPage);
        //     // array_push($data['staffs'],'order' = 10 * ($currentPage - 1) + 1);
        //     //dd($data);
        // }

        return view('staffs.index', $data);
    }

    public function create()
    {
        return view('staffs.create');
    }

    public function store(Request $request)
    {
        $allData = $request->all();
        $allData['readable'] = $request->has('readable') ? true : false;
        $allData['status'] = true;
        Staff::create($allData);
        // return redirect('/staff');
        return redirect()->route('staff.index');

        $image = Request::file('filefield');
        dd($image);
        //  return redirect('/')->with('success_message', 'The staff was created success.');
        // $validator = Validator::make([$image], ['image' => 'required']);
        // if ($validator->fails()) {
        //     return $this->errors(['message' => 'Not an image.', 'code' => 400]);
        // }
        // $destinationPath = storage_path() . '/uploads';
        // if (!$image->move($destinationPath, $image->getClientOriginalName())) {
        //     return $this->errors(['message' => 'Error saving the file.', 'code' => 400]);
        // }
        // return response()->json(['success' => true], 200);

    }

    public function show($id)
    {
        $data['staff'] = Staff::find($id);
        return view('staffs.show', $data);
    }

    public function edit($id)
    {
        $data['staff'] = Staff::find($id);
        return view('staffs.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $staff = Staff::find($id);
        $data = $request->all();
        $data['readable'] = $request->has('readable') ? true : false;
        $staff->update($data);
        return redirect()->route('staff.index');
    }

    public function destroy($id)
    {
        $staff = Staff::find($id);
        $staff->delete();
        return redirect()->route('staff.index');
    }
}
