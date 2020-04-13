<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class examinfo extends Model
{
    //
    protected $fillable = [
        'Teacher_id', 'Course', 'question_lenth','qualifying_marks','uniqueid','time',
    ];
}
