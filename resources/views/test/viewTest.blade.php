@extends('layout.default')


        @section('head')
         <h1>Bar ON EQ I:S Test</h1>
        @endsection

        @section('content')
        
         <p> The Bar ON EQ I:S consists of statements that provide you with an opportunity to describe yourself by indicating the degree to which each statement is true of the way you feel, think, or act most of the time and in most situations. There are five possible responses to each sentence.</p>
        <br/>
        <p><b>Rating
        <br/>    1-  Very Seldom or not true of me;
        <br/>    2-  Seldom of true of me
        <br/>    3-  Sometimes true of me
        <br/>    4-  Often true of me
        <br/>    5-  Very often true of me</b>

        </p>
        <br/>
        <p>Read each statement and decide which one of the five possible responses best describes you. Mark your choices on the answer sheet y circling the number that corresponds to your answer. If a statement does not apply to you , respond in a such a way that will give the best indication of how you would possible feel, think, or act. Although some of the sentences ma not give you all the information you would like to receive, choose the response that seems the best, even if you are not sure. There are no “right” or “wrong” answers and no good or bad choices. Answer openly and honestly by indicating how you actually are and not how you would be  like to be or how you would like to be seen. There is no time limit, but work quickly and make sure that you consider and respond to every element.
        </p>  
        <br/>
        <br/>

        <div class="row">
            <form method="POST" action="{{URL::to('test')}}" name="submitQuestion">
                <?php $itemnum = 1; ?>
                @foreach($testquestions as $testquestion)
                    <div class="col-md-8">
                        <label><?php echo $itemnum++;?>. {{$testquestion->question}}</label>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            @if($testquestion->reverse == 0)
                                <label class="radio-inline">
                                    <input type="radio" name="{{$testquestion->id}}" id="1" value="1">1
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="{{$testquestion->id}}" id="2" value="2">2
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="{{$testquestion->id}}" id="3" value="3">3
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="{{$testquestion->id}}" id="4" value="4">4
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="{{$testquestion->id}}" id="5" value="5">5
                                </label>
                            @else
                                <label class="radio-inline">
                                    <input type="radio" name="{{$testquestion->id}}" id="1" value="5">1
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="{{$testquestion->id}}" id="2" value="4">2
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="{{$testquestion->id}}" id="3" value="3">3
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="{{$testquestion->id}}" id="4" value="2">4
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="{{$testquestion->id}}" id="5" value="1">5
                                </label>
                            @endif
                        </div>
                    </div>
                @endforeach
                <br />
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-default">Submit Button</button>
                    <button type="reset" class="btn btn-default">Reset Button</button>
                </div>
            </form>
        </div>

        @endsection