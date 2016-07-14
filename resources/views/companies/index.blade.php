@extends('main')

@section('title', ' | Companies List')

@section('content')

	<div class="row">
		
		<div class="col-md-8">
			<h1 class="text-center"><strong>All Companies</strong></h1>
		</div>

		<div class="col-md-4">
			<a href="{{ route('companies.create') }}", class="btn btn-primary btn-lg" style="margin-top: 30px; margin-left: 15px;"> Create New Company</a>

		{!! Form::open([ 'route' => 'companies.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left', 'style' => "margin-top: 15px;", 'role' => 'search']) !!}
			
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
					<th>Industry</th>
					<th>Address</th>
					<th>No of Employees</th>
					<th>Location</th>
					<th></th>
				</thead>

				<tbody>
					@foreach($companies as $company)
					<tr>

						<td>{{ $company->company_name }}</td>
						<td>{{ $company->industry }}</td>
						<td>{{ $company->address }}</td>
						<td>{{ $company->employees }}</td>
						<td>{{ $company->location->location_name}}</td>					
						<td><a href="{{ route('companies.show', $company->id) }}" class="btn btn-default btn-sm">View</a></td>

					</tr>
					@endforeach
				</tbody>
			</table>

			<div class="text-center">
				{!! $companies->appends ( Request::query() )->render() !!}<!-- This is used for pagination at the bottom of the table -->
			</div>

		</div>
	</div>




@stop 
