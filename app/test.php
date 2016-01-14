<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class test extends Model
{
    protected $fillable = [
    	'student_id',
    	'date_taken',
    	'intra_score',
    	'inter_score',
    	'strss_mgt_score',
    	'adap_score',
    	'gen_mood_score',
    	'total_eq',
    	'pstv_imprssn_score'
    ];

    public function student()
    {
    	return $this->belongsTo('App\students');
    }
}
