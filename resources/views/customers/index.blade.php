@extends('main')

@section('title', ' | Customers List')

@section('head')

		{!! Html::style('css/bootstrap.css') !!}
		{!! Html::style('css/jquery.dataTables.min.css') !!}

		{!! Html::script('js/jquery-3.0.0.min.js') !!}


@endsection


@section('content')


	<div class="row">
		
		<div class="col-md-8">
			<h1 class="text-center"><strong>All Customers</strong></h1>
		</div>

		<div class="col-md-4">
			<a href="{{ route('customers.create') }}", class="btn btn-primary btn-lg" style="margin-top: 30px; margin-left: 15px;"> New Customer</a>

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
						<th>Line ID</th>
						<th>Name</th>
						<th>Address</th>
						<th>City</th>
						<th>Dealer Associated</th>
						<th></th>
					</thead>

					<tbody>
						@foreach($customers as $customer)
						<tr>
							<td>{{ $customer->line_id }}</td>
							<td>{{ $customer->customer_name }}</td>
							<td>{{ $customer->address }}</td>
							<td>{{ $customer->city }}</td>
							<td>{{ $customer->dealer->name }}</td>
							<td><a href="{{ route('customers.show', $customer->id) }}" class="btn btn-default btn-sm">View</a></td>

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


