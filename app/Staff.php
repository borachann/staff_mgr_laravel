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
        'description'
    ];
}
