<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname',
        'lname',
        'email', 
        'password', 
        'id_number', 
        'gender', 
        'age', 
        'course',
        'privilege',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function test()
    {
        $this->hasOne('App\test');
    }

    public function student_questions()
    {
        $this->hasMany('App\student_question');
    }
}
