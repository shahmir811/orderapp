@extends('main')

@section('title', ' | New Dealer')

@section('stylesheets')

	{!! Html::style('css/parsley.css') !!}

@endsection

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			
			<h1 class="text-center">New Customer</h1>
			<hr>

			{{ Form::open(['route' => 'customers.store', 'method' => 'POST', 'data-parsley-validate' => '']) }}

				{{ Form::label('line_id', 'LINE ID:') }}
				{{ Form::text('line_id', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255']) }}

				<br>

				{{ Form::label('customer_name', 'Customer Name:') }}
				{{ Form::text('customer_name', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255']) }}

				<br>

				{{ Form::label('address', 'Address:') }}
				{{ Form::text('address', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255']) }}

				<br>

				{{ Form::label('city', 'City:') }}
				{{ Form::text('city', null, ['class' => 'form-control', 'required' => '']) }}

				<br>

				{{ Form::label('dealer_id', 'Dealer Associated:') }}
				<select class="form-control" name="dealer_id">
					@foreach($dealers as $dealer)
						<option value="{{ $dealer->id }}">{{ $dealer->name }}</option>
					@endforeach
				</select>

				<br>

				{{ Form::submit('SAVE', ['class'=>'btn btn-success btn-lg']) }}			
				
			{{ Form::close() }}

		</div>
			
	</div>


@stop 


@section('scripts')
	
	{!! Html::script('js/parsley.min.js') !!}
	
@endsection