@extends('main')

@section('title', ' | Edit Customer')

@section('stylesheets')

	{!! Html::style('css/parsley.css') !!}

@endsection

@section('content')

	<div class="row">
		
		{!! Form::model($customers, ['route' => ['customers.update',$customers->id], 'method' => 'PUT', 'data-parsley-validate' => '']) !!}

		<div class="col-md-8" style="margin-top: 18px;">

			{{ Form::label('line_id', 'Line ID:') }}
			{{ Form::text('line_id', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255']) }}

			<br>

			{{ Form::label('customer_name', 'Customer Name:') }}
			{{ Form::text('customer_name', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255']) }}

			<br>

			{{ Form::label('address', 'Address:') }}
			{{ Form::text('address', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255']) }}

			<br>

			{{ Form::label('city', 'City:') }}
			{{ Form::text('city', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255']) }}
			
			<br>

			{{ Form::label('dealer_id', 'Distributor Associated:')	}}
			<select class="form-control" name="dealer_id">
				@foreach($dealers as $dealer)
					<option value="{{ $dealer->id }}">{{ $dealer->name }}</option>
				@endforeach

			</select>		

			{{ Form::submit('SAVE', ['class' => 'btn btn-primary btn-lg', 'style' => 'margin-top: 20px;']) }}

			<div class="row">
				<div class="col-md-6">
					{{ Html::linkRoute('customers.show', 'CANCEL', [$customers->id], ['class' => 'btn btn-danger btn-lg', 'style' => 'margin-top: 18px;']) }}
				</div>
			</div>

		</div>


		{!! Form::close() !!}
	</div>


@stop

@section('scripts')
	
	{!! Html::script('js/parsley.min.js') !!}
	
@endsection
