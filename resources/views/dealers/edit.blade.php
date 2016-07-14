@extends('main')

@section('title', ' | Edit Dealer')

@section('content')

	<div class="row">
		
		{!! Form::model($dealers, ['route' => ['dealers.update',$dealers->id], 'method' => 'PUT']) !!}

		<div class="col-md-8" style="margin-top: 18px;">

			{{ Form::label('name', 'Dealer Name:') }}
			{{ Form::text('name', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255']) }}

			<br>

			{{ Form::label('address', 'Address:') }}
			{{ Form::text('address', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255']) }}

			<br>

			{{ Form::label('email', 'Email Address') }}
			{{ Form::email('email', null, ['class' => 'form-control', 'required' => '']) }}
			
			<br>

			{{ Form::label('distributor_id', 'Distributor Associated:')	}}
			<select class="form-control" name="distributor_id">
				@foreach($distributions as $distribution)
					<option value="{{ $distribution->id }}">{{ $distribution->name }}</option>
				@endforeach

			</select>		

			{{ Form::submit('SAVE', ['class' => 'btn btn-primary btn-lg', 'style' => 'margin-top: 20px;']) }}

			<div class="row">
				<div class="col-md-6">
					{{ Html::linkRoute('dealers.show', 'CANCEL', [$dealers->id], ['class' => 'btn btn-danger btn-lg', 'style' => 'margin-top: 18px;']) }}
				</div>
			</div>

		</div>


		{!! Form::close() !!}
	</div>


@stop 


