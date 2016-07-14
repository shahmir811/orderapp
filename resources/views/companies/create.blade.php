@extends('main')

@section('title', ' | New Company')

@section('stylesheets')

	{!! Html::style('css/parsley.css') !!}

@endsection

@section ('content')


	<div class="row"> 
		<div class="col-md-8 col-md-offset-2">

			<h1> New Company </h1>
			<hr>


			{!! Form::open(['route' =>'companies.store', 'data-parsley-validate' => '']) !!}

			{{ Form::label('company_name', 'Company Name:') }}
			{{ Form::text('company_name', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255']) }}

			<br>


			{{ Form::label('industry', 'Industry:') }}
			{{ Form::text('industry', null, ['class' => 'form-control', 'required' => '']) }}
			
			<br>


			{{ Form::label('address', 'Address:') }}
			{{ Form::text('address', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255']) }}

			<br>

			{{ Form::label('employees', 'Employees Number:') }}
			{{ Form::text('employees', null, ['class' => 'form-control', 'required' => '']) }}

			<br>

			{{ Form::label('location_id', 'Location') }}
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


