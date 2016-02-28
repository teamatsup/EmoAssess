@extends('layout.default')

@section('head')
    <h1>Your Emotional Stability Results</h1>
@endsection

@section('content')
     <div class="row">
        <table class="table table-striped table-bordered">
            <thead>
                <th style = "text-align: center;" rowspan="2">Scale</th>
                <th style = "text-align: center;" colspan="3">Rating</th>  
                <th style = "text-align: center;" rowspan="2">Higher Scrorer Characteristics</th>                  
                    <tr>  
                    <th>Area for</br> Enrichment</th>
                    <th>Effective </br>Functioning</th>
                    <th>Enhanced </br>Skills</th>
                    </tr>
               
            </thead>
            <tr>
                <td>Interpersonal - (Self-awareness and Self Expression) Being aware of ourselves, understanding our strengths and weaknesses, being able to express feeling, thoughts nondestructively.</td>
                @if($intra_interp == 0)
                    <td class="text-center">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    </td>
                    <td></td>
                    <td></td>
                @elseif($intra_interp == 1)
                    <td></td>
                    <td class="text-center">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    </td>
                    <td></td>
                @else
                    <td></td>
                    <td></td>
                    <td class="text-center">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    </td>
                @endif
                <td>Thes individuals possess accurate selfawareness and are in touch with theire emotions. They are also able to express their feeling and communicate their needs to others</td>
            </tr>
            <tr>
                <td>Interpersonal - (Social Awareness and Interpersonal Being aware of thers emotions, feelings, needs and being able to establish and maintain cooperative, constructive and manually satisfying relationships.)</td>
                @if($inter_interp == 0)
                    <td class="text-center"> 
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    </td>
                    <td></td>
                    <td></td>
                @elseif($inter_interp == 1)
                    <td></td>
                    <td class="text-center">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    </td>
                    <td></td>
                @else
                    <td></td>
                    <td></td>
                    <td class="text-center">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    </td>
                @endif
                 <td>Thes individuals are able to establish cooperative, consturctive, and satisfying relationships. They are good listeners and are able to understand and appreciate the feeling of others</td>
            </tr>
            <tr>
                <td>Stress Management (Emotional Management and Regulation) Managing emotions so that they work for us and not against us.</td>
                @if($strss_mgt_interp == 0)
                    <td class="text-center">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    </td>
                    <td></td>
                    <td></td>
                @elseif($strss_mgt_interp == 1)
                    <td></td>
                    <td class="text-center">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    </td>
                    <td></td>
                @else
                    <td></td>
                    <td></td>
                    <td class="text-center">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    </td>
                @endif
                 <td>Thes individuals are generallty calm and work well under pressure. They are rarely impulsive to control.</td>
            </tr>
            <tr>
                <td>Adaptability - (Change Managment) change by realistically and flexibly coping with the immediate situation and effectively solving the problems as they arise.</td>
                @if($adap_interp == 0)
                    <td class="text-center">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    </td>
                    <td></td>
                    <td></td>
                @elseif($adap_interp == 1)
                    <td></td>
                    <td class="text-center">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    </td>
                    <td></td>
                @else
                    <td></td>
                    <td></td>
                    <td class="text-center">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    </td>
                @endif
                 <td>Thes individuals are flexible, realistic and successfully managing change. They are adept at finding effective ways of dealing with everyday problems.</td>
            </tr>
            <tr>
                <td>General Mood - (Self- Motivation) being optimistic, positive and sufficiently self-motivated to set and pursue our goals.</td>
                @if($gen_mood_interp == 0)
                    <td class="text-center">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    </td>
                    <td></td>
                    <td></td>
                @elseif($gen_mood_interp == 1)
                    <td></td>
                    <td class="text-center">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    </td>
                    <td></td>
                @else
                    <td></td>
                    <td></td>
                    <td class="text-center">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    </td>
                @endif
                 <td>Thes individuals are generally optimistic, energetic and self-motivated. They also have a positive outlook and are typically pleasant to be with.</td>
            </tr>
            <tr>
                <td>Total EQ - ( An estimate of the respondent's over-all level of Emotional Intelligence)</td>
                @if($total_eq_interp == 0)
                    <td class="text-center">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    </td>
                    <td></td>
                    <td></td>
                @elseif($total_eq_interp == 1)
                    <td></td>
                    <td class="text-center">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    </td>
                    <td></td>
                @else
                    <td></td>
                    <td></td>
                    <td class="text-center">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    </td>
                @endif
                 <td>Thes individuals are generally emotionally and socially effective in dealing with everyday demands. They typically behave, act and manage their lives in an emotionally intelligent behavior.</td>
            </tr>
            <tr>
                <td>Positive Impression - Indicates Self- Description, a lack of Self Awareness, or exaggerated Self-Esteem rather than making positive Impression)</td>
                @if($pstv_imprssn_interp == 0)
                    <td class="text-center">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    </td>
                    <td></td>
                    <td></td>
                @elseif($pstv_imprssn_interp == 1)
                    <td></td>
                    <td class="text-center">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    </td>
                    <td></td>
                @else
                    <td></td>
                    <td></td>
                    <td class="text-center">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    </td>
                @endif
                 <td>Thes individuals may be attempting to create an overly positive impression for themselves.</td>
            </tr>
            <tfoot>
                <th>Index of Inconsistency:</th>
                <th>{{$index_inconsistency}}</th>
                <th colspan="2">Values greater than or equal to 12 show inconsistency.</th>
            </tfoot>
        </table>
    </div>
@endsection


