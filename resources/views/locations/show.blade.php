@extends('main')

@section('title', ' | Location Details')

@section('content')

	<h1 class="text-center" style="font-size:50px;">Location Details</h1>

	<div class="row">
		<div class="col-md-6">	
			<h1> {{ $locations->location_name }} </h1>

			<h3> {{ $locations->location_address }} </h3>	

		</div>

		<div class="col-md-3">
			<div class="well" style="margin-left:15px;  margin-top:15px;">
				
			{!! Form::open(['route' => ['locations.edit', $locations->id], 'method' => 'GET']) !!}

				{{ Form::submit('EDIT', ['class' => 'btn btn-primary btn-lg']) }}

			{!! Form::close() !!}

			{!! Form::open(['route' => ['locations.destroy', $locations->id], 'method' => 'DELETE']) !!}

				{{ Form::submit('DELETE', ['class' => 'btn btn-danger btn-lg', 'style' => 'margin-top:15px;']) }}

			{!! Form::close() !!}

			{{ Html::linkRoute('locations.index', 'Locations List', [], ['class' => 'btn btn-default btn-block' , 'style'=> 'margin-top: 18px; font-weight: bold;' ]) }}

			</div>

		</div>
	</div>

@stop 