@extends('main')

@section('title', '| All Categories')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h1>Categories</h1>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($categories as $category)
					<tr>
						<td>{{ $category->id }}</td>
						<td>{{ $category->name }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div><!-- end of col-md-8 -->

		<div class="col-md-4">
			<div class="well">
				<h2>Add New Category</h2>
				<!-- work on html fomr --?
				<!-- <form method="POST" action="/categories">
					 <input type="hidden" name="_token" value="{{ csrf_token() }}">
					Name :<input type="text" name="name" class="form-control">
					<input type="submit" name="Create" class="btn btn-primary btn-block btn-h1-spacing">
				</form> -->

				{!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}

					{{ Form::label('name', 'Name:') }}
					{{ Form::text('name', null, ['class' => 'form-control']) }}

					{{ Form::submit('Create New Category', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}

				{!! Form::close() !!}


			</div>
		</div>
	</div>




@endsection



