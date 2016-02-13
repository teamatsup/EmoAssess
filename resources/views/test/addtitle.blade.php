@extends('layout.default')

        @section('head')
         <h1>Add Test Title</h1>
  				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
        @endsection

        @section('content')
        
           <form method="POST" action="{{URL::to('test/addtitle')}} " name="submitTestTitle">
           		  <label>
                                    <label>Title: </label>
                                     <div class="form-group">
                                		 <input type="textbox" name="test_title" >
                            		</div>      
                                  
                  </label>
                
                  <label>
                                    <label>Status: </label>
                                     <div class="form-group">
                                		 <input type="textbox" name="status" >
                            		</div>      
                                  
                  </label>

           
                  <button type="submit" class="btn btn-primary">Submit</button>
     			 </form>

     			 <div class= "wrapper">
	     			 <table id="example" class="table table-hover table-bordered">
	     			 <thead>
	     			 	<th>Test Title</th>
	     			 	<th>Edit</th>
	     			 	
	     			 </thead>

		     			 <tbody>
		     			 @foreach($titles as $title)
		     			 <tr>
		     			 	<td>{{$title->test_title}}</td>
		     			 	
                <td><div>
								  
								  <!-- Trigger the modal with a button -->
								  <button type="button" class="btn btn-info btn-lg" data-toggle="modal"  data-target="#myModal{{$title->id}}">Edit</button>

								  <!-- Modal -->
								  <div class="modal fade" id="myModal{{$title->id}}" role="dialog">
								    <div class="modal-dialog">
								    
								      <!-- Modal content-->
                     <form method="POST" action="/test/addTitle1/{{ $title->id }}" name="submitEditTitle">
								      <div class="modal-content">
								        <div class="modal-header">
								          <button type="button" class="close" data-dismiss="modal">&times;</button>
								          <h4 class="modal-title">Edit Title</h4>
								        </div>
								        <div class="modal-body">
								          	 {!! csrf_field() !!}
      									          	<label>Change Title:</label>
      									          		<input type="hidden" name="id" placeholder="{{$title->id}}">
      									          	<div class="form-group">
      									          		<input type="text" name="test_title" placeholder="{{$title->test_title}}">
      									          	</div>
      									          	<label>Status:</label>
      									          	<div class="form-group">
      									          		<input type="text" name="status" placeholder="{{$title->status}}">
      									          	</div>
								                    <label>Test Description:</label>
                                    <div class="form-group">
                                      <input type="text" name="test_description" placeholder="{{$title->test_description}}">
                                    </div>
								       		<button type="submit" class="btn btn-primary"    >save</button>
								        	
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
