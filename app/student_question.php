<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student_question extends Model
{
    protected $fillable = [
    	'user_id',
    	'question_id',
    	'value'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function question()
    {
    	return $this->belongsTo('App\questions');
    }
}
