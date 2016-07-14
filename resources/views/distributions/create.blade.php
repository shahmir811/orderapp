@extends('main')

@section('title', ' | New Distributor')

@section('stylesheets')

	{!! Html::style('css/parsley.css') !!}

@endsection

@section ('content')


	<div class="row"> 
		<div class="col-md-8 col-md-offset-2">

			<h1> New Distributor </h1>
			<hr>


			{!! Form::open(['route' =>'distributions.store', 'data-parsley-validate' => '']) !!}

			{{ Form::label('name', 'Distributor Name') }}
			{{ Form::text('name', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255']) }}

			<br>


			{{ Form::label('email', 'Email Address') }}
			{{ Form::email('email', null, ['class' => 'form-control', 'required' => '']) }}
			
			<br>


			{{ Form::label('phone', 'Phone No') }}
			{{ Form::text('phone', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255']) }}

			<br>

			{{ Form::label('location_id', 'City') }}
			<select class="form-control" name="location_id">
				
				@foreach ($locations as $location)
					<option value="{{ $location->id }}"> {{ $location->location_name }} </option>
				@endforeach
			</select>


			{{ Form::submit('Create', ['class' => 'btn btn-primary btn-lg', 'style' => 'margin-top: 20px;']) }}


			{!! Form::close() !!}


		</div>
	</div>


@stop 

@section('scripts')
	
	{!! Html::script('js/parsley.min.js') !!}
	
@endsection


