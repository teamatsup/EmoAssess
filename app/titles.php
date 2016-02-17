<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class titles extends Model
{
    //
     protected $fillable = [
        'test_title',
        'test_description',
        
    ];

      public function titles()
    {
        return $this->hasMany('App\questions');
    }
}
