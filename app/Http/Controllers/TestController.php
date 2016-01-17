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

        $scl_intra      = 0;
        $scl_inter      = 0;
        $scl_strss      = 0;
        $scl_adap       = 0;
        $scl_gmood      = 0;
        $total_eq       = 0;
        $scl_imprssn    = 0;

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
                'student_id'    => $student->id,
                'question_id'   => $question->id,
                'value'         => $answer
            ));

            $student_question->save();
        }

        $total_eq = ($scl_intra + $scl_inter + $scl_strss
                + $scl_adap + $scl_gmood) / 5;

        $test = new test(array(
            'student_id'            => $student->id,
            'date_taken'            => date('Y-m-d'),
            'intra_score'           => $scl_intra,
            'inter_score'           => $scl_inter,
            'strss_mgt_score'       => $scl_strss,
            'adap_score'            => $scl_adap,
            'gen_mood_score'        => $scl_gmood,
            'total_eq'              => $total_eq,
            'pstv_imprssn_score'    => $scl_imprssn
        ));

        $test->save();        
    }
    
    public function testinterp()
    {
        $testresult = test::find(1);

        $intra_score        = $testresult->intra_score;
        $inter_score        = $testresult->inter_score;
        $strss_mgt_score    = $testresult->strss_mgt_score;
        $adap_score         = $testresult->adap_score;
        $gen_mood_score     = $testresult->gen_mood_score;
        $total_eq           = $testresult->total_eq;
        $pstv_imprssn_score = $testresult->pstv_imprssn_score;

        $gender = 1;
        $age    = 19;

        //Male
        if ($gender == 0)
        {
            if($age >= 16 && $age <= 29)
            {
                $ranges = array(
                    "a" => array(32, 45), 
                    "b" => array(31, 46), 
                    "c" => array(25, 36),
                    "d" => array(24, 32), 
                    "e" => array(34, 46), 
                    "f" => array(31, 40),
                    "g" => array(9, 18)
                );
            }
            else //if($age >= 30 && $age <= 49)
            {
                $ranges = array(
                    "a" => array(34, 47), 
                    "b" => array(36, 47),
                    "c" => array(26, 36),
                    "d" => array(25, 33),
                    "e" => array(36, 47),
                    "f" => array(33, 41),
                    "g" => array(10, 19)
                );
            }

        }

        //Female
        if ($gender == 1)
        {
            if($age >= 16 && $age <= 29)
            {
                $ranges = array(
                    "a" => array(31, 44),
                    "b" => array(39, 48),
                    "c" => array(25, 36),
                    "d" => array(23, 32),
                    "e" => array(33, 45),
                    "f" => array(32, 40),
                    "g" => array(8, 18)
                ); 
            }
            else //if($age >= 30 && $age <= 39)
            {
                $ranges = array(
                    "a" => array(34, 48),
                    "b" => array(40, 48),
                    "c" => array(27, 37),
                    "d" => array(25, 32),
                    "e" => array(34, 46),
                    "f" => array(31, 40),
                    "g" => array(9, 18)
                ); 
            }
        }

        $inter_a = $this->interpretScore($ranges["a"], $intra_score);
        $inter_b = $this->interpretScore($ranges["b"], $inter_score);
        $inter_c = $this->interpretScore($ranges["c"], $strss_mgt_score);
        $inter_d = $this->interpretScore($ranges["d"], $adap_score);
        $inter_e = $this->interpretScore($ranges["e"], $gen_mood_score);
        $inter_f = $this->interpretScore($ranges["f"], $total_eq);
        $inter_g = $this->interpretScore($ranges["g"], $pstv_imprssn_score);
           
        $data = array('title'       => 'Test Interpretation',
            'intra_score'           => $intra_score,
            'intra_interp'          => $inter_a,
            'inter_score'           => $inter_score,
            'inter_interp'          => $inter_b,
            'strss_mgt_score'       => $strss_mgt_score,
            'strss_mgt_interp'      => $inter_c,
            'adap_score'            => $adap_score,
            'adap_interp'           => $inter_d,
            'gen_mood_score'        => $gen_mood_score,
            'gen_mood_interp'       => $inter_e,
            'total_eq_score'        => $total_eq,
            'total_eq_interp'       => $inter_f,
            'pstv_imprssn_score'    =>  $pstv_imprssn_score,
            'pstv_imprssn_interp'   => $inter_g,
            'gender'                => $gender,
        );

        return view('test/viewRecords')->with($data);   
    }

    public function interpretScore($range, $score)
    {
        if ($score < $range[0]) 
        {
            return 0;
        }
        else if ($score >= $range[0] && $score <= $range[1]) 
        {
            return 1;
        }

        return 2;
    }
}
