@extends('main')

@section('title', ' | View Dealer')

@section('content')

	<div class="row">
		<div class="col-md-8">
			
			<h1>{{ $dealers->name }}</h1>

			<p>{{ $dealers->address }}</p>

			<p>{{ $dealers->email }}</p>

			<p>{{ $dealers->distributor->name }}</p>

		</div>

		<div class="col-md-4">
			<div class="well" style="margin-top:30px;">
				
				<div class="row">
					<div class="col-sm-6">
						
						{{ Form::open(['route' => ['dealers.edit', $dealers->id], 'method' => 'GET']) }}
						
						{!! Form::submit('EDIT', ['class' => 'btn btn-primary btn-lg']) !!}

						{!! Form::close() !!}

					</div>
				</div>

				<div class="row">
					<div class="col-sm-6" style="margin-top: 18px">
						
						{!! Form::open(['route' => ['dealers.destroy', $dealers->id], 'method' => 'DELETE']) !!}

						{!! Form::submit('DELETE', ['class' => 'btn btn-danger btn-lg']) !!}

						{!! Form::close() !!}

					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						{{ Html::linkRoute('dealers.index', 'Dealers List', [], ['class' => 'btn btn-default btn-block' , 'style'=> 'margin-top: 18px; font-weight: bold;' ]) }}
					</div>
				</div>


			</div>
		</div>

	</div>




@stop

