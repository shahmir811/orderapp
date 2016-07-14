@extends('main')

@section('title', ' | Edit Location')

@section('stylesheets')

	{!! Html::style('css/parsley.css') !!}

@endsection

@section('content')
	
	<div class="row">

		<h1>Edit Location</h1>

		{!! Form::model($locations, ['route' => ['locations.update', $locations->id], 'method' => 'PUT', 'data-parsley-validate' => '']) !!}

		<div class="col-md-8" style="margin-top: 18px;">

			{{ Form::label('location_name', 'City:') }}
			{{ Form::text('location_name', null, ['class' => 'form-control', 'maxlength' => '255', 'required' => '']) }}

			<br>

			{{ Form::label('location_address', 'City:') }}
			{{ Form::text('location_address', null, ['class' => 'form-control', 'maxlength' => '255', 'required' => '']) }}

			<br>

			{{ Form::submit('SAVE', ['class' => 'btn btn-success btn-lg', 'style' => 'margin-top: 20px;']) }}

			<br>

			<div class="row">
				<div class="col-md-6">
					{{ Html::linkRoute ('locations.show', 'CANCEL', [$locations->id], ['class' => 'btn btn-danger btn-lg', 'style' => 'margin-top: 18px;']) }}
				</div>
			</div>

		</div>
		{!! Form::close() !!}

	</div>

@stop

@section('scripts')
	
	{!! Html::script('js/parsley.min.js') !!}
	
@endsection