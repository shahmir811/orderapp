@extends('main')

@section('title', ' | Distributors List')

@section('content')

	<div class="row">
		
		<div class="col-md-8">
			<h1 class="text-center"><strong> All Distributors </strong></h1>
		</div>

		<div class="col-md-4">


			<a href="{{ route('distributions.create') }}", class="btn btn-primary btn-lg " style="margin-top: 30px; margin-left: 15px;"> Create New Distributor</a>
			
			{!! Form::open([ 'route' => 'distributions.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left', 'style' => "margin-top: 15px;", 'role' => 'search']) !!}
			
				<div class="input-group">
					{!! Form::text('term', Request::get('term'), ['class' => 'form-control', 'placeholder' => 'Search...', 'id' => 'term']) !!}
					<span class="input-group-btn">
						<button class="btn btn-default" type="submit">
							<i class="glyphicon glyphicon-search"></i>
						</button>
					</span>
				</div>
			{!! Form::close() !!}
			
		</div>



		<div class="col-md-12">
			<hr>
		</div>


	</div> <!-- End of the Top Row -->


	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>Name</th>
					<th>Email Address</th>
					<th>Phone No</th>
					<th></th>
				</thead>

				<tbody>
					@foreach($distributions as $distribution)
					<tr>

						<td>{{ $distribution->name }}</td>
						<td>{{ $distribution->email }}</td>
						<td>{{ $distribution->phone }}</td>
						<td><a href="{{ route('distributions.show', $distribution->id) }}" class="btn btn-default btn-sm">View</a></td>

					</tr>
					@endforeach
				</tbody>
			</table>

			<div class="text-center">
				{!! $distributions->appends ( Request::query() )->render() !!} <!-- This is used for pagination at the bottom of the table -->
			</div>

		</div>
	</div>




@stop 
