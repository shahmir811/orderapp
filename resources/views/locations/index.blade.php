@extends('main')

@section('title', ' | All Locations')

@section('stylesheets')

	{!! Html::style('css/parsley.css') !!}

@endsection

@section('head')

		{!! Html::style('css/bootstrap.css') !!}
		{!! Html::style('css/jquery.dataTables.min.css') !!}

		{!! Html::script('js/jquery-3.0.0.min.js') !!}


@endsection

@section('content')

<div class="wrapper1 col-md-10">
	<section class="panel panel-primary">
		
		<div class="panel-heading">
			<b>Locations List</b>
		</div>

		<div class="panel-body">
			<table class="table table-hover table-striped table-bordered" id="myTable">
				
				<thead>
					<tr>
						<th>Location</th>
						<th>Address</th>
						<th></th>					
					</tr>
				</thead>

				<tbody>
					@foreach($locations as $location)
					<tr>
						<td>{{ $location->location_name }}</td>
						<td>{{ $location->location_address }}</td>
						<td><a href="{{ route('locations.show',$location->id) }}" class="btn btn-sm btn-default">View</a></td>	
					</tr>
					@endforeach
				</tbody>
			</table>	
		</div>
	</section>
</div>


<div class="row">

		<h1 class="text-center"><strong>All Locations</strong></h1>

		<div class="col-md-4 col-offset-10" style="margin-top: 50px;">
			<div class="well">
				
				{!! Form::open(['route' => 'locations.store', 'method' => 'POST','data-parsley-validate' => '']) !!}

				<h2>Add Location</h2>

				{{ Form::label('location_name', 'Location') }}
				{{ Form::text('location_name', null, ['class' => 'form-control', 'required' => '']) }}

				<br>

				{{ Form::label('location_address', 'Address') }}
				{{ Form::text('location_address', null, ['class' => 'form-control', 'required' => '']) }}				

				<br>

				{{ Form::submit('SAVE', ['class' => 'btn btn-success btn-lg']) }}

				{!! Form::close() !!}

			</div>
		</div>

	</div>

</div> <!-- End of col-md-8 div -->


@stop

@section('scripts')
	
	{!! Html::script('js/parsley.min.js') !!}
	
@endsection

@section ('scriptsoutside')


	{!! Html::script('js/jquery.dataTables.min.js') !!}
	{!! Html::script('js/select.js') !!}

	<script type="text/javascript">
		$('#myTable').DataTable({
			"sPaginationType": "listbox"
		});
	</script>

@endsection
