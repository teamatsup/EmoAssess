<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class questions extends Model
{
	protected $fillable = [
		'question',
		'scale_type',
		'reverse'
	];

    public function students_questions()
    {
    	return $this->hasMany('App\student_question');
    }
}
