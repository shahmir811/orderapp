@extends('main')

@section('title', ' | New Dealer')

@section('stylesheets')

	{!! Html::style('css/parsley.css') !!}

@endsection



@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			
			<h1 class="text-center">New Dealer</h1>
			<hr>

			{{ Form::open(['route' => 'dealers.store', 'method' => 'POST', 'data-parsley-validate' => '']) }}

				{{ Form::label('name', 'Dealer Name:') }}
				{{ Form::text('name', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255']) }}

				<br>

				{{ Form::label('address', 'Address:') }}
				{{ Form::text('address', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255']) }}

				<br>

				{{ Form::label('email', 'Email Address:') }}
				{{ Form::email('email', null, ['class' => 'form-control', 'required' => '']) }}

				<br>

				{{ Form::label('distributor_id', 'Distributor Associated:') }}
				<select class="form-control" name="distributor_id">
					@foreach($distributions as $distribution)
						<option value="{{ $distribution->id }}">{{ $distribution->name }}</option>
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


