@extends('layout.default')

        @section('head')
         <h1>Interpretation</h1>
        @endsection

        @section('content')
        
        <p>

        	
        	Category of Interpretation:<br/>
        	<b>Enhance Skills</b>
        	<br/>: Insert Definition<br/>
        	<b>Effective Funtioning</b>
        	<br/>: Insert Definition<br/>
        	<b>Area Of Enrichment</b>
        	<br/>: Insert Definition
        </p>

        <p>Intrapersonal Score: {{$intra_score}} <br/>
           Interpretation: {{$intra_interp}} <br/>		
        	Interpersonal Score: {{$inter_score}} <br/>
           Interpretation: {{$inter_interp}} <br/>
           Stress Management Score: {{$strss_mgt_score}} <br/>
           Interpretation: {{$strss_mgt_interp}} <br/>
           Adaptability Score: {{$adap_score}} <br/>
           Interpretation: {{$adap_interp}} <br/>
           General Mood Score: {{$gen_mood_score}} <br/>
           Interpretation: {{$gen_mood_interp}} <br/>
           Total EQ Score: {{$total_eq_score}} <br/>
           Interpretation: {{$total_eq_interp}} <br/>
           Positive Impression Score: {{$pstv_imprssn_score}} <br/>
           Interpretation: {{$pstv_imprssn_interp}} <br/>
           


        </p>


        <br/>



          

        @endsection


