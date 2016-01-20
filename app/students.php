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
    	return $this->belongsTo('App\test');
    }

    public function students_question()
    {
    	return $this->belongsTo('App\student_question');
    }

}
