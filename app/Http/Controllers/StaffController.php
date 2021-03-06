<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{

    private $staffPerPage = 10;

    public function index(Request $request)
    {
        $key = $request->has('key') ? $request->input('key') : '';
        $data['key'] = $key;
        $data['staffs'] = Staff::searchOrList($key)->paginate($this->staffPerPage);

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
        $allData['photo_path'] = $request->photo_path;
        Staff::create($allData);

        return redirect()->route('staff.index');

    }

    public function show($id)
    {
        $data['staff'] = Staff::find($id);
        $data['file'] = '1458803640smile.jpg';
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
        $data['photo_path'] = $request->photo_path;
        $staff->update($data);
        return redirect()->route('staff.index');
    }

    public function destroy($id)
    {
        $staff = Staff::find($id);
        $staff->delete();
        return redirect()->route('staff.index');
    }

    public function updateStatus($id)
    {
        // $staff = Staff::where('id', $id)->update(['status', false]);
        Staff::where('id', $id)->update(['status' => false]);
        return redirect()->route('staff.index');
    }
}
