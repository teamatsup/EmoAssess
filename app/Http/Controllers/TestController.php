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



        
        
        echo "Intrapersonal - ".$scl_intra."<br />";
        echo "Interpersonal - ".$scl_inter."<br />";
        echo "Stress Management - ".$scl_strss."<br />";
        echo "Adaptability - ".$scl_adap."<br />";
        echo "General Mood - ".$scl_gmood."<br />";
        echo "Total EQ - ".$total_eq."<br />";
        echo "Positive Impression - ".$scl_imprssn."<br />";
        
    }
    public function testinterp()
    {
           $testresult = test::find(4 );
           // $student_info = students::where('id','=',$testresult->student_id)->get();
           //::where('votes', '>', 100)
           // $gender = $student_info->gender;
           // $age = $student_info->age;
           // $firstname = $student_info->fname;
           //print_r($firstname);

           $intra_score = $testresult->intra_score;
           $inter_score = $testresult->inter_score;
           $strss_mgt_score = $testresult->strss_mgt_score;
           $adap_score = $testresult->adap_score;
           $gen_mood_score = $testresult->gen_mood_score;
           $total_eq = $testresult->total_eq;
           $pstv_imprssn_score = $testresult->pstv_imprssn_score;
           $gender = 1;
          if ($gender== 0)
          { 
            //male1
                     if(45<=$intra_score)
                     {
                      $inter_a = "Enhanced Skill";
                     }
                     elseif(32<=$intra_score&&$intra_score<=44)
                     {
                      $inter_a = "Effective functioning";
                     }
                     elseif($intra_score<=31)
                    {
                      $inter_a = "Area of Enrichment";
                    }
          
                     
                     
                     if(46<=$inter_score)
                     {
                      $inter_b = "Enhanced Skill";
                     }
                     elseif(35<=$inter_score&&$inter_score<=45)
                     {
                      $inter_b = "Effective functioning";
                     }
                     elseif($inter_score<=34)
                    {
                      $inter_b = "Area of Enrichment";
                    }
          
                   
                    if(36<=$strss_mgt_score)
                     {
                      $inter_c = "Enhanced Skill";
                     }
                     elseif(25<=$strss_mgt_score&&$strss_mgt_score<=35)
                     {
                      $inter_c = "Effective functioning";
                     }
                     elseif($strss_mgt_score<=24)
                    {
                      $inter_c = "Area of Enrichment";
                    }
          
                   
                    if(32<=$adap_score)
                     {
                      $inter_d = "Enhanced Skill";
                     }
                     elseif(24<=$adap_score&&$adap_score<=32)
                     {
                      $inter_d = "Effective functioning";
                     }
                     elseif($adap_score<=23)
                    {
                      $inter_d = "Area of Enrichment";
                    }
          
                   
                    if(46<=$gen_mood_score)
                     {
                      $inter_e = "Enhanced Skill";
                     }
                     elseif(34<=$gen_mood_score&&$gen_mood_score<=45)
                     {
                      $inter_e = "Effective functioning";
                     }
                     elseif($gen_mood_score<=33)
                    {
                      $inter_e = "Area of Enrichment";
                    }


          
                    if(40<=$total_eq)
                     {
                      $inter_f = "Enhanced Skill";
                     }
                     elseif(31<=$total_eq&&$total_eq<=39)
                     {
                      $inter_f = "Effective functioning";
                     }
                     elseif($total_eq<=30)
                    {
                      $inter_f = "Area of Enrichment";
                    }

                   
                    if(18<=$pstv_imprssn_score)
                     {
                      $inter_g = "Enhanced Skill";
                     }
                     elseif(9<=$pstv_imprssn_score&&$pstv_imprssn_score<=17)
                     {
                      $inter_g = "Effective functioning";
                     }
                     elseif($pstv_imprssn_score<=8)
                    {
                      $inter_g = "Area of Enrichment";
                    } 

          }

          //Female1
          if ($gender == 1)
          {
                    if(44<=$intra_score)
                     {
                      $inter_a = "Enhanced Skill";
                     }
                     elseif(31<=$intra_score&&$intra_score<=43)
                     {
                      $inter_a = "Effective functioning";
                     }
                     elseif($intra_score<=30)
                    {
                      $inter_a = "Area of Enrichment";
                    }
          
                     
                     
                     if(48<=$inter_score)
                     {
                      $inter_b = "Enhanced Skill";
                     }
                     elseif(39<=$inter_score&&$inter_score<=47)
                     {
                      $inter_b = "Effective functioning";
                     }
                     elseif($inter_score<=38)
                    {
                      $inter_b = "Area of Enrichment";
                    }
          
                   
                    if(36<=$strss_mgt_score)
                     {
                      $inter_c = "Enhanced Skill";
                     }
                     elseif(25<=$strss_mgt_score&&$strss_mgt_score<=35)
                     {
                      $inter_c = "Effective functioning";
                     }
                     elseif($strss_mgt_score<=24)
                    {
                      $inter_c = "Area of Enrichment";
                    }
          
                   
                    if(32<=$adap_score)
                     {
                      $inter_d = "Enhanced Skill";
                     }
                     elseif(23<=$adap_score&&$adap_score<=31)
                     {
                      $inter_d = "Effective functioning";
                     }
                     elseif($adap_score<=22)
                    {
                      $inter_d = "Area of Enrichment";
                    }
          
                   
                    if(40<=$gen_mood_score)
                     {
                      $inter_e = "Enhanced Skill";
                     }
                     elseif(33<=$gen_mood_score&&$gen_mood_score<=39)
                     {
                      $inter_e = "Effective functioning";
                     }
                     elseif($gen_mood_score<=32)
                    {
                      $inter_e = "Area of Enrichment";
                    }
          
                    
                    if(40<=$total_eq)
                     {
                      $inter_f = "Enhanced Skill";
                     }
                     elseif(32<=$total_eq&&$total_eq<=39)
                     {
                      $inter_f = "Effective functioning";
                     }
                     elseif($total_eq<=31)
                    {
                      $inter_f = "Area of Enrichment";
                    }
          
                   
                    if(18<=$pstv_imprssn_score)
                     {
                      $inter_g = "Enhanced Skill";
                     }
                     elseif(8<=$pstv_imprssn_score&&$pstv_imprssn_score<=17)
                     {
                      $inter_g = "Effective functioning";
                     }
                     elseif($pstv_imprssn_score<=7)
                    {
                      $inter_g = "Area of Enrichment";
                    }
          }
           // $testresult->inter_score;
           // $testresult->strss_mgt_score;
           // $testresult->adap_score;
           // $testresult->gen_mood_score;
           // $testresult->total_eq;
           // $testresult->pstv_imprssn_score;


          $data = array('title' => 'Test Interpretation',
                    'intra_score' =>  $intra_score,
                    'intra_interp' => $inter_a,
                    'inter_score' =>  $inter_score,
                    'inter_interp' => $inter_b,
                    'strss_mgt_score' =>  $strss_mgt_score,
                    'strss_mgt_interp' => $inter_c,
                    'adap_score' =>  $adap_score,
                    'adap_interp' => $inter_d,
                    'gen_mood_score' =>  $gen_mood_score,
                    'gen_mood_interp' => $inter_e,
                    'total_eq_score' =>  $total_eq,
                    'total_eq_interp' => $inter_f,
                    'pstv_imprssn_score' =>  $pstv_imprssn_score,
                    'pstv_imprssn_interp' => $inter_g,
                    'gender' => $gender,
                      // 'age' => $age,
                      // 'gender' => $gender,
                      // 'firstname' => $firstname
              );
           return view('test/viewRecords')->with($data);  
           
    }

 
}
