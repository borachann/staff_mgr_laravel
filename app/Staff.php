<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staffs';

    protected $fillable = [
        'fp_number',
        'name',
        'gender',
        'position',
        'dob',
        'skill',
        'readable',
        'level',
        'ld_grp',
        'phone',
        'work_grp',
        'photo_path',
        'file_path',
        'description',
        'email',
        'address',
        'status'
    ];

    public function scopeSearchOrList($q, $key = '')
    {
        if ($key != '') {
            $q->where('status', true)
                ->where(function ($query) use ($key) {
                    $query->where('fp_number', $key)
                        ->orwhere('name', 'like', $key . '%');})
                ->orderBy('name', 'asc');
        } else {
            $q->where('status', true)->orderBy('name', 'asc');
        }

    }

    public function scopeReportNewStaff($q, $key = '', $date)
    {
        if ($key != '') {
            $q->where('status', true)
                ->whereBetween('created_at', $date)
                ->Where(function ($query) use ($key) {
                    $query->where('fp_number', $key)
                        ->orwhere('name', 'like', $key . '%');})
                ->orderBy('name', 'asc');
        } else {
            $q->where('status', true)
                ->whereBetween('created_at', $date)
                ->orderBy('name', 'asc')->toSql();
        }
    }

}
