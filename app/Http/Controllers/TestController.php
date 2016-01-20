<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\questions;
use App\User;
use App\student_question;
use App\test;

use Input;

class TestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function takedefaulttest()
    {
        if( (test::where('user_id', '=', 1)->count()) == 1)
        {
           return $this->testinterp();
        }

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

    /**
    * Save student's Emotional Stability test
    *
    * @return Response
    */
    public function submitTest()
    {
        $user = User::find(3);

        // initialized scales' scores to zero
        $scl_intra      = 0; // Intrapersonal Scale
        $scl_inter      = 0; // Interpersonal Scale
        $scl_strss      = 0; // Stress Management Scale
        $scl_adap       = 0; // Adapatability Scale
        $scl_gmood      = 0; // General Mood Scale
        $total_eq       = 0; // Total Emotional Quotient Scale
        $scl_imprssn    = 0; // Positive Impression Scale

        // Iterate through questions taken
        for($itemNum = 0; $itemNum <= 50; $itemNum++)
        {
            // Get the answer for the question
            // Find the question in database
            $answer = Input::get($itemNum);
            $question = questions::find($itemNum);

            // Determine question's category;
            // Add question's value to the category
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

            // Save student's answer to the question
            $student_question = new student_question(array(
                'user_id'       => $user->id,
                'question_id'   => $question->id,
                'value'         => $answer
            ));

            $student_question->save();
        }

        // Compute total Emotional Quotient
        $total_eq = ($scl_intra + $scl_inter + $scl_strss
                + $scl_adap + $scl_gmood) / 5;

        // Save the test
        $test = new test(array(
            'user_id'               => $user->id,
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

    /**
    * Get equivalent measuremtn for 
    * student's EQ-i scales' scores
    *
    * @return Response
    */
    public function testinterp()
    {
        $testresult = test::find(4);

        $intra_score        = $testresult->intra_score;
        $inter_score        = $testresult->inter_score;
        $strss_mgt_score    = $testresult->strss_mgt_score;
        $adap_score         = $testresult->adap_score;
        $gen_mood_score     = $testresult->gen_mood_score;
        $total_eq           = $testresult->total_eq;
        $pstv_imprssn_score = $testresult->pstv_imprssn_score;

        $gender = 0;
        $age    = 19;

        //Student is male
        if ($gender == 0)
        {
            // Determine age
            if($age >= 16 && $age <= 29) // Ages 16 to 29
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
            else //if($age >= 30 && $age <= 49) // Ages 30 to 29
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

        // Student is female
        else if ($gender == 1)
        {
            if($age >= 16 && $age <= 29)// Ages 16 to 29
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
            else //if($age >= 30 && $age <= 39) // Ages 30 to 29
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

        // Get interpretations
        $inter_a = $this->interpretScore($ranges["a"], $intra_score); // Intrapersonal Scale
        $inter_b = $this->interpretScore($ranges["b"], $inter_score); // Interpersonal Scale
        $inter_c = $this->interpretScore($ranges["c"], $strss_mgt_score); // Stress Management Scale
        $inter_d = $this->interpretScore($ranges["d"], $adap_score); // Adaptability Scale
        $inter_e = $this->interpretScore($ranges["e"], $gen_mood_score); // General Mood Scale
        $inter_f = $this->interpretScore($ranges["f"], $total_eq); // Total Emotional Quotient Scale
        $inter_g = $this->interpretScore($ranges["g"], $pstv_imprssn_score); // Positive Impression Scale
           
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
            'pstv_imprssn_score'    => $pstv_imprssn_score,
            'pstv_imprssn_interp'   => $inter_g,
            'gender'                => $gender,
        );

        // View results
        return view('test/viewRecords')->with($data);   
    }

    /**
    * Interpret each scale's score
    *
    * @param array $range
    * @param int $score
    * @return int
    */
    public function interpretScore($range, $score)
    {
        // Determine Measurement
        if ($score < $range[0]) // Score belongs to Area for Enrichment
        {
            return 0;
        }
        else if ($score >= $range[0] && $score <= $range[1]) //Score belongs to Effective Functioning
        {
            return 1;
        }

        return 2; // Score belongs to Enhanced Skills
    }
}
