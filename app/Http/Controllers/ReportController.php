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
        return view('staffs.report');
    }

    public function query(Request $request)
    {
        if ($request->has('sdate') && $request->has('edate')) {
            $sdate = $request->sdate;
            $edate = $request->edate;

            $key = $request->has('key') ? $request->input('key') : '';
            $data['key'] = $key;
            $data['staffs'] = Staff::reportNewStaff($key, [$sdate, $edate])->paginate($this->staffPerPage);
            return $data;
        }
    }
}
