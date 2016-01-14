<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class students extends Model
{
    protected $fillable = [
    	'fname',
    	'lname',
    	'gender',
    	'age',
    ];

    public function test()
    {
    	return $this->hasOne('App\test');
    }

    public function students_questions()
    {
    	return $this->belongsTo('App\student_question');
    }

}
