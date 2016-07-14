@extends('main')

@section('title', ' | Edit Distributor')

@section('content')

	<div class="row">
		
		{!! Form::model($distributions, ['route' => ['distributions.update',$distributions->id], 'method' => 'PUT']) !!}

		<div class="col-md-8" style="margin-top: 18px;">
			
			{{ Form::label('name', 'Distributor Name') }}
			{{ Form::text('name', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255']) }}

			<br>


			{{ Form::label('email', 'Email Address') }}
			{{ Form::email('email', null, ['class' => 'form-control', 'required' => '']) }}
			
			<br>


			{{ Form::label('phone', 'Phone No') }}
			{{ Form::text('phone', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255']) }}

			{{ Form::label('location_id', 'City:')	}}
			<select class="form-control" name="location_id">
				@foreach($locations as $location)
					<option value="{{ $location->id }}">{{ $location->location_name }}</option>
				@endforeach

			</select>

			{{ Form::submit('SAVE', ['class' => 'btn btn-primary btn-lg', 'style' => 'margin-top: 20px;']) }}

			<div class="row">
				<div class="col-md-6">
					{{ Html::linkRoute('distributions.show', 'CANCEL', [$distributions->id], ['class' => 'btn btn-danger btn-lg', 'style' => 'margin-top: 18px;']) }}
				</div>
			</div>

		</div>


		{!! Form::close() !!}
	</div>



@stop

