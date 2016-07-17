@extends('main')

@section('title', ' | Companies List')

@section('head')

		{!! Html::style('css/bootstrap.css') !!}
		{!! Html::style('css/jquery.dataTables.min.css') !!}

		{!! Html::script('js/jquery-3.0.0.min.js') !!}


@endsection


@section('content')

	<div class="row">
		
		<div class="col-md-8">
			<h1 class="text-center"><strong>All Companies</strong></h1>
		</div>

		<div class="col-md-4">
			<a href="{{ route('companies.create') }}", class="btn btn-primary btn-lg" style="margin-top: 30px; margin-left: 15px;"> Create New Company</a>

		</div>

	</div> <!-- End of the Top Row -->

	<div class="wrapper">
		<section class="panel panel-primary">
			
			<div class="panel-heading">
				<b>All Comapnies List</b>
			</div>

			<div class="panel-body">
				<table class="table table-hover table-striped table-bordered" id="myTable">
					
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
			</div>
		</section>
	</div>



@stop 



@section ('scriptsoutside')


	{!! Html::script('js/jquery.dataTables.min.js') !!}
	{!! Html::script('js/select.js') !!}

	<script type="text/javascript">
		$('#myTable').DataTable({
			"sPaginationType": "listbox"
		});
	</script>

@endsection


