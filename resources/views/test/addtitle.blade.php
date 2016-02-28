@extends('layout.default')

@section('head')
	<h1>Add Test</h1>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

@endsection

@section('content')
	<div class="wrapper">
		
			<form class="form-horizontal" method="POST" action="{{URL::to('test/addtitle')}} " name="submitTestTitle">

				{!! csrf_field() !!}
				<div class="form-group form-group-lg">
				      <label class="col-lg-2 control-label" for="lg">Title:</label>
				      <div class="col-lg-10">
				        <input class="form-control" type="text" name="test_title">
				      </div>
				
				<br/> 
				
				     <label class="col-lg-2 control-label" for="lg">Description:</label>
				      <div class="col-lg-10">
				        <textarea class="form-control" rows="10" name="test_description"></textarea>
				      </div>
				
				
				<br/>
					  <!-- <label class="col-lg-2 control-label" for="lg">Instruction:</label>
				      <div class="col-lg-10">
				        <textarea class="form-control" rows="10" name="instruction"></textarea>
				      </div> -->
					<div class="col-lg-10">
						<button type="submit" class="btn btn-primary">Submit</button>
				        
	   		        </div>
				</div>
			</form>
		
	</div>
	<!--Test titles list-->
	<br/>
	<div class= "wrapper">
		<div class="col-lg-10 control-label" for="lg">
		<table id="example" class="table table-hover table-bordered table-responsive">
			<thead>
				<th>Test Title</th>
				<th>Edit</th>
			</thead>
			<tbody>
				@foreach($titles as $title)
					<tr>
			 			<td>{{$title->test_title}} @if($title->status == 1)<br/><span class="label label-danger">ACTIVE</span> @endif </td>
						<td>
							<div>  
								<!-- Trigger the modal with a button -->
								<button type="button" class="btn btn-info btn-lg" data-toggle="modal"  data-target="#myModal{{$title->id}}">Edit</button>
								@if($title->status == 0)
									<button type="button" class="btn btn-alert btn-lg" data-toggle="modal"  data-target="#activate{{$title->id}}">Activate</button>
								@endif

								<!-- Edit Title Modal -->
								<div class="modal fade" id="myModal{{$title->id}}" role="dialog">
								    <div class="modal-dialog">
								    
								      <!-- Modal content-->
											<form method="POST" action="/test/addTitle1/{{ $title->id }}" name="submitEditTitle">
												{!! csrf_field() !!}
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title">Edit Title</h4>
												</div>
												<div class="modal-body">
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
												<!-- <input type="text" name="test_description" placeholder="{{$title->test_description}}"> -->
												<textarea class="form-control" rows="5" name="test_description" placeholder="{{$title->test_description}}"></textarea>
												</div>
														<button type="submit" class="btn btn-primary">save</button>	
												</div>

												 <div class="modal-footer">
												  <button type="button" class="btn btn-primary" data-dismiss="modal">cancel</button>
												</div>
											</div>
								      </form>
								    </div>
								</div>

								<!-- Activate Title Modal -->
								<div class="modal fade" id="activate{{$title->id}}" role="dialog">
								    <div class="modal-dialog">
								    
								      <!-- Modal content-->
											<form method="POST" action="/test/activateTitle/{{$title->id}}" name="submitEditTitle">
												{!! csrf_field() !!}
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title">Activate Test Title</h4>
												</div>
												<div class="modal-body">
										          	<label>Do you want to use this title as questionnaire for the Emotional Quotient test?</label>
													<button type="submit" class="btn btn-warning">Yes</button>	
													<button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
												</div>
											</div>
								      </form>
								    </div>
								</div>

							</div>
						</td>
			 		</tr>
			 	@endforeach
			</tbody>	
		</table>
		</div>
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
