<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student_question extends Model
{
    protected $fillable = [
    	'student_id',
    	'question_id',
    	'value'
    ];

    public function student()
    {
    	return $this->hasOne('App\students');
    }

    public function question()
    {
    	return $this->hasOne('App\questions');
    }
}
