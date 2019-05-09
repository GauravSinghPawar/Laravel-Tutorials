@extends('main')

@section('title', '| All Tags')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h1>Tags</h1>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($tags as $tag)
					<tr>
						<td>{{ $tag->id }}</td>
						<td><a href="{{ route('tags.show',$tag->id) }}">{{ $tag->name }}</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div><!-- end of col-md-8 -->

		<div class="col-md-4">
			<div class="well">
				<h2>Add New Tag</h2>
				<!-- work on html form --?
				<!-- <form method="POST" action="/categories">
					 <input type="hidden" name="_token" value="{{ csrf_token() }}">
					Name :<input type="text" name="name" class="form-control">
					<input type="submit" name="Create" class="btn btn-primary btn-block btn-h1-spacing">
				</form> -->

				{!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}

					{{ Form::label('name', 'Name:') }}
					{{ Form::text('name', null, ['class' => 'form-control']) }}

					{{ Form::submit('Create New Tags', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}

				{!! Form::close() !!}


			</div>
		</div>
	</div>
	
@endsection



