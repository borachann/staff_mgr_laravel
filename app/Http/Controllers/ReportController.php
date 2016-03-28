<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Staff;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    private $staffPerPage = 10;
    public function index(Request $request)
    {
        $key = $request->has('key') ? $request->input('key') : '';
        $data['key'] = $key;
        $data['staffs'] = Staff::reportNewStaff($key, ['2016-03-25', '2016-03-28'])->paginate($this->staffPerPage);

        return view('staffs.report', $data);
    }
}
