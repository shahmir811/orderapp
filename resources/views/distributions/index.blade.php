@extends('main')

@section('title', ' | Distributors List')

@section('head')

		{!! Html::style('css/bootstrap.css') !!}
		{!! Html::style('css/jquery.dataTables.min.css') !!}

		{!! Html::script('js/jquery-3.0.0.min.js') !!}


@endsection


@section('content')

	<div class="row">
		
		<div class="col-md-8">
			<h1 class="text-center"><strong> All Distributors </strong></h1>
		</div>

		<div class="col-md-4">


			<a href="{{ route('distributions.create') }}", class="btn btn-primary btn-lg " style="margin-top: 30px; margin-left: 15px;"> Create New Distributor</a>
	
			
		</div>

	</div> <!-- End of the Top Row -->

<div class="wrapper">
	<section class="panel panel-primary">
		
		<div class="panel-heading">
			<b>All Distribution List</b>
		</div>

		<div class="panel-body">
			<table class="table table-hover table-striped table-bordered" id="myTable">
				
				<thead>
					<th><b>Name</b></th>
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

