@extends('layout.default')

@section('head')
    <h1>Student Records</h1>
@endsection

@section('content')
	<div  class='row'>
		<div class="col-sm-12">
			<table id="studentsTestsTable" class="table table-hover table-bordered table-striped 
									 dataTable no-footer">
				<thead>
					<th>ID Number</th>
					<th>Student Name</th>
					<th>Age</th>
					<th>Gender</th>
					<th>Course</th>
					<th>Test Taken</th>
				</thead>
				@foreach( $tests as $test )
					<tr>
						<td><a href="{{ URL::to('records', [$test->user->id]) }}">
							{{ $test->user->id_number }} </a></td>
						<td>{{ $test->user->fname." ".$test->user->fname }}</td>
						<td>{{ $test->user->age }}</td>
						<td>@if( $test->user->gender == 1 ) male @else female @endif</td>
						<td>{{ $test->user->course }}</td>
						<td>{{ $test->date_taken }}</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
@endsection

@section('scripts')
	<script type="text/javascript" src="https://cdn.datatables.net/r/dt/dt-1.10.9/datatables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.9/js/dataTables.bootstrap.min.js"/></script>

	<script>
		$(document).ready(function(){
			$('#studentsTestsTable').DataTable();
		});
	</script>
@endsection