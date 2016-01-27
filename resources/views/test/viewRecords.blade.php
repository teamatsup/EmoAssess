@extends('layout.default')

        @section('head')
         <h1>Interpretation</h1>
        @endsection

        @section('content')
        
        <p> 
            <b>Gender:
                @if($gender == 0) Male
                @else Female
                @endif
            </b>
        <br/>
            Category of Interpretation:<br/>
            <b>Enhance Skills</b>
            <br/>: Insert Definition<br/>
            <b>Effective Funtioning</b>
            <br/>: Insert Definition<br/>
            <b>Area Of Enrichment</b>
            <br/>: Insert Definition
        </p>

        <div class="row">
            <table class="table table-striped table-bordered">
                <thead>
                    <th>Scale</th>
                    <th>Area for Enrichment</th>
                    <th>Effective Functioning</th>
                    <th>Enhanced Skills</th>
                </thead>
                <tr>
                    <td>Interpersonal</td>
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
                </tr>
                <tr>
                    <td>Interpersonal</td>
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
                </tr>
                <tr>
                    <td>Stress Management</td>
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
                </tr>
                <tr>
                    <td>Adaptability</td>
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
                </tr>
                <tr>
                    <td>General Mood</td>
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
                </tr>
                <tr>
                    <td>Total EQ</td>
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
                </tr>
                <tr>
                    <td>Positive Impression</td>
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
                </tr>
                <tfoot>
                    <th>Index of Inconsistency:</th>
                    <th>{{$index_inconsistency}}</th>
                    <th colspan="2">Values greater than or equal to 12 show inconsistency.</th>
                </tfoot>
            </table>
        </div>

        @endsection


