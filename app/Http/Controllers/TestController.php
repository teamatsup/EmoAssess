<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\questions;
use App\students;
use App\student_question;
use App\test;

use Input;

class TestController extends Controller
{
    //
    public function takedefaulttest()
   	{
        $testquestion = questions::all();
   		$data = array('title' => 'Bar ON EQ I:S',
                    'testquestions' =>  $testquestion
              );

   		return view('test/viewTest')->with($data);
   	}

   	public function addTestQuestion()
   	{
   		$data = array('title' => 'Bar ON EQ I:S' );	
   		return view('test/addTestQuestion')->with($data);
   	}

    public function submitTest()
    {
        $student = students::find(1);

        $scl_intra = 0;
        $scl_inter = 0;
        $scl_strss = 0;
        $scl_adap = 0;
        $scl_gmood = 0;
        $total_eq = 0;
        $scl_imprssn = 0;

        for($itemNum = 0; $itemNum <= 50; $itemNum++)
        {
            $answer = Input::get($itemNum);
            //echo $answer;

            $question = questions::find($itemNum);

            switch ($question->scale_type){
                case 1:
                    $scl_intra += $answer;
                    break;

                case 2:
                    $scl_inter += $answer;
                    break;

                case 3:
                    $scl_strss += $answer;
                    break;

                case 4:
                    $scl_adap += $answer;
                    break;

                case 5:
                    $scl_gmood += $answer;
                    break;

                case 7:
                    $scl_imprssn += $answer;
                    break;

                default:
                    break;
            }

            //echo "<br/>";

            $student_question = new student_question(array(
                'student_id' => $student->id,
                'question_id' => $question->id,
                'value'         => $answer
            ));

            $student_question->save();
        }

        $total_eq = ($scl_intra + $scl_inter + $scl_strss
                + $scl_adap + $scl_gmood) / 5;

        $test = new test(array(
            'student_id' => $student->id,
            'date_taken' => date('Y-m-d'),
            'intra_score' => $scl_intra,
            'inter_score' => $scl_inter,
            'strss_mgt_score' => $scl_strss,
            'adap_score' => $scl_adap,
            'gen_mood_score' => $scl_gmood,
            'total_eq' => $total_eq,
            'pstv_imprssn_score' => $scl_imprssn
        ));

        $test->save();
        /*
        *Test
        *
        echo "Intrapersonal - ".$scl_intra."<br />";
        echo "Interpersonal - ".$scl_inter."<br />";
        echo "Stress Management - ".$scl_strss."<br />";
        echo "Adaptability - ".$scl_adap."<br />";
        echo "General Mood - ".$scl_gmood."<br />";
        echo "Total EQ - ".$total_eq."<br />";
        echo "Positive Impression - ".$scl_imprssn."<br />";
        */
    }
}
