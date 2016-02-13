@extends('layout.default')

        @section('head')
         <h1>Add Test Questions</h1>
        @endsection

        @section('content')
       
        	<div class="wrapper">
           <form method="POST" action="{{URL::to('test/addQuestion')}} " name="SubmitAddQuestion">
           		  <label class="text">
                                    <label>Question: </label>
                                     <div class="form-group">
                                		 <input type="textbox" name="question" >
                            		</div>      
                 
                                   
                  </label>
                  
                 
                  <label class="text">
                                      <div class="form-group">
                                		<label>Reverse: </label>
		                                <select class="form-control" name="reverse">
		                                    <option value='1'>Yes</option>
		                                    <option value='0'>No</option>		                                    
		                                </select>
                            </div>      
                  </label>

                  <label class="text">
                             <div class="form-group">
                                <label>Scale Type: </label>
		                                <select class="form-control" name="scale_type">
		                                    <option value='1'>1</option>
		                                    <option value='2'>2</option>
		                                    <option value='3'>3</option>
		                                    <option value='4'>4</option>
		                                    <option value='5'>5</option>
		                                    <option value='7'>7</option>
		                                    
		                                </select>
                            </div>                  
                  </label>


                  <label class="text">
                             <div class="form-group">
                                <label>Test Title</label>
		                                <select class="form-control" name='title_id'>
		                                @foreach($titles as $title)
		                                    <option value= {{$title->id}}>{{$title->test_title}}</option>
		                                @endforeach    
		                                </select>
                            </div>
                                    <input type="hidden" name="status" value="1">
                  </label>

           
                  <button type="submit" class="btn btn-primary">Submit</button>
     			 </form>
     			 </div>

  			 <div class= "wrapper">
	     			 <table id="example" class="table table-hover table-bordered">
	     			 <thead>
	     			 	<th>Question</th>
	     			 	<th>Scale</th>
	     			 	<th>Reverse</th>
	     			 	<th>Test Title</th>
	     			 	<th>Status</th>
	     			 	<th>Edit</th>
	     			 </thead>

		     			 <tbody>
		     			 @foreach($questionsall as $question)
		     			 <tr>
		     			 	<td>{{$question->question}}</td>
		     			 	<td>{{$question->scale_type}}</td>
		     			 	<td>{{$question->reverse}}</td>
		     			 	<td>{{$question->title_id}}</td>
		     			 	<td>{{$question->status}}</td>
		     			 	<td>
                			<div>
								  
								  <!-- Trigger the modal with a button -->
								  <button type="button" class="btn btn-info btn-lg" data-toggle="modal"  data-target="#myModal{{$question->id}}">Edit</button>

								  <!-- Modal -->
								  <div class="modal fade" id="myModal{{$question->id}}" role="dialog">
								    <div class="modal-dialog">
								    
								      <!-- Modal content-->
                    				<form method="POST" action="/test/addQuestion1/{{ $question->id }}" name="submitEditQuestion">
								      <div class="modal-content">
								        <div class="modal-header">
								          <button type="button" class="close" data-dismiss="modal">&times;</button>
								          <h4 class="modal-title">Edit Question</h4>
								        </div>
								        <div class="modal-body">
								          	 {!! csrf_field() !!}
      									          	<label>Question:</label>
      									          		<input type="hidden" name="id" placeholder="{{$question->id}}">
      									          	<div class="form-group">
      									          		<input type="text" name="question" placeholder="{{$question->question}}">
      									          	</div>
      									          	<label>Scale Type:</label>
      									          	<div class="form-group">
      									          		<input type="text" name="scale_type" placeholder="{{$question->scale_type}}">
      									          	</div>
								                    <label>Reverse:</label>
		   	   		                                <div class="form-group">
	                                      				<input type="text" name="reverse" placeholder="{{$question->reverse}}">
	                                    			</div>
	                                    			<label>Test Title</label>
										             <select class="form-control" name='title_id'>
										                                @foreach($titles as $title)
										                                    <option value= {{$title->id}}>{{$title->test_title}}</option>
										                                @endforeach    
										             </select>

								       		<button type="submit" class="btn btn-primary">save</button>
								        	
								        </div>
								        
								         <div class="modal-footer">
								          <button type="button" class="btn btn-primary" data-dismiss="modal">cancel</button>
								        </div>
								      </div>
								      </form>
								    </div>
								  </div>
								  
								</div></td>
		     			 </tr>
		     			 @endforeach
		     			 </tbody>	
	 				</table>
 				</div>			
			@endsection


@section('scriptjs')
			<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
  <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
  <script>
  $(function(){
    $("#example").dataTable();
  })
  </script>


@endsection
s