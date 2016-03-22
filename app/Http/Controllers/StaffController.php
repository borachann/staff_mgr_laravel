<?php

namespace App\Http\Controllers;

use App\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{

    public function index(Request $request)
    {
        if ($request->has('key')) {
            $data['key'] = $request->key;
            $data['staffs'] = Staff::where('fp_number', $request->key)->orWhere('name', $request->key)->paginate(5);
        } else {
            $data['staffs'] = Staff::paginate(5);
        }
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
        Staff::create($allData);
        // return redirect('/staff');
        return redirect()->route('staff.index');
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
