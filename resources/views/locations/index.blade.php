@extends('main')

@section('title', ' | All Locations')

@section('stylesheets')

	{!! Html::style('css/parsley.css') !!}

@endsection

@section('content')

	<div class="row">
		<div class="col-md-8" style="margin-top: 30px;">
			
			<h1 class="text-center"><strong>All Locations</strong></h1>

			{!! Form::open([ 'route' => 'locations.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left', 'style' => "margin-top: 15px; margin-left: -15px;", 'role' => 'search']) !!}
			
				<div class="input-group">
					{!! Form::text('term', Request::get('term'), ['class' => 'form-control', 'placeholder' => 'Search...', 'id' => 'term']) !!}
					<span class="input-group-btn">
						<button class="btn btn-default" type="submit">
							<i class="glyphicon glyphicon-search"></i>
						</button>
					</span>
				</div>
			{!! Form::close() !!}

			
			<table class="table">

			
				
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

			<div class="text-center">
				{!! $locations->appends ( Request::query() )->render() !!}<!-- This is used for pagination at the bottom of the table -->
			</div>

		</div> <!-- End of col-md-8 div -->

		<div class="col-md-3" style="margin-top: 50px;">
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

@stop

@section('scripts')
	
	{!! Html::script('js/parsley.min.js') !!}
	
@endsection