@extends('main')

@section('title', ' | View Company')

@section('content')


	<div class="row">
		<div class="col-md-8">
			
			<h1> {{ $companies->company_name }} </h1>

			<p> {{ $companies->industry }} </p>

			<p> {{ $companies->address }} </p>

			<p> {{ $companies->employees }} </p>

			<p> {{ $companies->location->location_name }}</p>
			
		</div>

		<div class="col-md-4">
			<div class="well" style="margin-top: 30px;" >
				
				
				<div class="row">
					<div class="col-sm-6">
						
						{!! Form::open(['route' => ['companies.edit', $companies->id], 'method' => 'GET']) !!}

						{!! Form::submit('EDIT', ['class' => 'btn btn-primary btn-lg']) !!}

						{!! Form::close() !!}

					</div>
				</div>


				<div class="row">
					<div class="col-sm-6" style="margin-top: 18px">
						
						{!! Form::open(['route' => ['companies.destroy', $companies->id], 'method' => 'DELETE']) !!}

						{!! Form::submit('DELETE', ['class' => 'btn btn-danger btn-lg']) !!}

						{!! Form::close() !!}

					</div>
				</div>
				

				<div class="row">
					<div class="col-md-12">
						{{ Html::linkRoute('companies.index', 'Companies List', [], ['class' => 'btn btn-default btn-block' , 'style'=> 'margin-top: 18px' ]) }}
					</div>
				</div>


			</div>
		</div>

	</div>


@stop


