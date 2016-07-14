@extends('main')

@section('title', ' | View Distributor')

@section('content')


	<div class="row">
		<div class="col-md-8">
			
			<h1> {{ $distributions->name }} </h1>

			<p> {{ $distributions->email }} </p>

			<p> {{ $distributions->phone }} </p>

			<p><b> {{ $distributions->location->location_name }} </b></p>
			<p> {{ $distributions->location->location_address }} </p>

		</div>

		<div class="col-md-4">
			<div class="well" style="margin-top: 30px;" >
				
				
				<div class="row">
					<div class="col-sm-6">
						
						{!! Form::open(['route' => ['distributions.edit', $distributions->id], 'method' => 'GET']) !!}

						{!! Form::submit('EDIT', ['class' => 'btn btn-primary btn-lg']) !!}

						{!! Form::close() !!}

					</div>
				</div>


				<div class="row">
					<div class="col-sm-6" style="margin-top: 18px">
						
						{!! Form::open(['route' => ['distributions.destroy', $distributions->id], 'method' => 'DELETE']) !!}

						{!! Form::submit('DELETE', ['class' => 'btn btn-danger btn-lg']) !!}

						{!! Form::close() !!}

					</div>
				</div>
				

				<div class="row">
					<div class="col-md-12">
						{{ Html::linkRoute('distributions.index', 'Distributors List', [], ['class' => 'btn btn-default btn-block' , 'style'=> 'margin-top: 18px; font-weight: bold;' ]) }}
					</div>
				</div>


			</div>
		</div>

	</div>


@stop


