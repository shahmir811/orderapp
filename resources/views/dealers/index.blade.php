@extends('main')

@section('title', ' | Dealers List')

@section('head')

		{!! Html::style('css/bootstrap.css') !!}
		{!! Html::style('css/jquery.dataTables.min.css') !!}

		{!! Html::script('js/jquery-3.0.0.min.js') !!}


@endsection

@section('content')


	<div class="row">
		
		<div class="col-md-8">
			<h1 class="text-center"><strong>All Dealers</strong></h1>
		</div>

		<div class="col-md-4">
			<a href="{{ route('dealers.create') }}", class="btn btn-primary btn-lg" style="margin-top: 30px; margin-left: 15px;"> New Dealer</a>

		</div>

	</div> <!-- End of the Top Row -->

<div class="wrapper">
	<section class="panel panel-primary">
		
		<div class="panel-heading">
			<b>Dealers List</b>
		</div>

		<div class="panel-body">
			<table class="table table-hover table-striped table-bordered" id="myTable">
				
				<thead>
					<th><b>Name</b></th>
					<th>Address</th>
					<th>Email Address</th>
					<th>Distributor Associated</th>
					<th></th>
				</thead>

				<tbody>
					@foreach($dealers as $dealer)
						<tr>
							<td>{{ $dealer->name }}</td>
							<td>{{ $dealer->address }}</td>
							<td>{{ $dealer->email }}</td>
							<td>{{ $dealer->distributor->name }}</td>
							<td><a href="{{ route('dealers.show', $dealer->id) }}" class="btn btn-default btn-sm">View</a></td>
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
