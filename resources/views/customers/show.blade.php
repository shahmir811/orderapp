@extends('main')

@section('title', ' | View Dealer')

@section('content')

	<div class="row">
		<div class="col-md-8">
			
			<h1>{{ $customers->customer_name }}</h1>

			<p><b>Address: </b>{{ $customers->address }}</p>

			<p><b>City: </b>{{ $customers->city }}</p>

			<p><b>Dealer Assossiated: </b>{{ $customers->dealer->name }}</p>

		</div>

		<div class="col-md-4">
			<div class="well" style="margin-top:30px;">
				
				<div class="row">
					<div class="col-sm-6">
						
						{{ Form::open(['route' => ['customers.edit', $customers->id], 'method' => 'GET']) }}
						
						{!! Form::submit('EDIT', ['class' => 'btn btn-primary btn-lg']) !!}

						{!! Form::close() !!}

					</div>
				</div>

				<div class="row">
					<div class="col-sm-6" style="margin-top: 18px">
						
						{!! Form::open(['route' => ['customers.destroy', $customers->id], 'method' => 'DELETE']) !!}

						{!! Form::submit('DELETE', ['class' => 'btn btn-danger btn-lg']) !!}

						{!! Form::close() !!}

					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						{{ Html::linkRoute('customers.index', 'Customers List', [], ['class' => 'btn btn-default btn-block' , 'style'=> 'margin-top: 18px; font-weight: bold;' ]) }}
					</div>
				</div>


			</div>
		</div>

	</div>



@stop

