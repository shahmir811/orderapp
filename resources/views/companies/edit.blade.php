@extends('main')

@section('title', ' | Edit Company')

@section('content')

	<div class="row">
		
		{!! Form::model($companies, ['route' => ['companies.update',$companies->id], 'method' => 'PUT']) !!}

		<div class="col-md-8" style="margin-top: 18px;">
			
			{{ Form::label('company_name', 'Company Name:') }}
			{{ Form::text('company_name', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255']) }}

			<br>


			{{ Form::label('industry', 'Industry:') }}
			{{ Form::text('industry', null, ['class' => 'form-control', 'required' => '']) }}
			
			<br>


			{{ Form::label('address', 'Address:') }}
			{{ Form::text('address', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255']) }}

			<br>


			{{ Form::label('employees', 'Number of Employees:') }}
			{{ Form::text('employees', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255']) }}

			<br>

			{{ Form::label('location_id', 'Location') }}
			<select class="form-control" name="location_id">
				@foreach($locations as $location)
					<option value="{{ $location->id }}">{{ $location->location_name }}</option>
				@endforeach
			</select>


			{{ Form::submit('SAVE', ['class' => 'btn btn-primary btn-lg', 'style' => 'margin-top: 20px;']) }}

			<div class="row">
				<div class="col-md-6">
					{{ Html::linkRoute('companies.show', 'CANCEL', [$companies->id], ['class' => 'btn btn-danger btn-lg', 'style' => 'margin-top: 18px;']) }}
				</div>
			</div>

		</div>


		{!! Form::close() !!}
	</div>



@stop

