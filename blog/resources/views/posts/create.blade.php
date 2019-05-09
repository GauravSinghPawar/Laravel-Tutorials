@extends("main")

@section("title","| Create New Post")

@section('stylesheets')
	{{!! Html::style('css/parsley.css') !!}}
	{{!! Html::style('css/select2.min.css') !!}}
@endsection

@section('content')


	<div class="row">

			<div class="col-md-8 offset-md-2">

				<h1>Create New Post</h1>
				<hr>



				{!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '', 'files' => true]) !!}
				  	
				  	{{ Form::label('title','Title:') }}
				  	{{ Form::text('title', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '254']) }}


				  	{{ Form::label('slug', 'Slug:')}}
				  	{{ Form::text('slug', null, ['class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255'])}}

				  	{{ Form::label('category_id', 'Category:')}}
				  	<select class="form-control" name="category_id">

				  		@foreach($categories as $category)
				  			<option value="{{ $category->id }}">{{ $category->name }}</option>
				  		@endforeach
				  	</select>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script type="text/javascript">

	$(document).ready(function() {
    	$('.select2-multi').select2();
	});

</script>








				  	{{ Form::label('tags', 'Tags:')}}
				  	<select class="form-control select2-multi" name="tags[]" multiple="multiple">

				  		@foreach($tags as $tag)
				  			<option value="{{ $tag->id }}">{{ $tag->name }}</option>
				  		@endforeach
				  	</select>


				  	{{ Form::label('featured_image', 'Upload Featured Image:') }}
				  	{{ Form::file('featured_image') }}

				  	{{ Form::label('body', 'Post Body:') }}

	<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=z1o0q9ftqjxl3bsdtjckevmt3m91mze79smmkr0haeqv9erj"></script>
	<script>tinymce.init({ 
							selector:'textarea',
							plugins: "link code",

  						});
  	</script>

				  	{{ Form::textarea('body',null, ['class' => 'form-control']) }}

				  	{{ Form::submit('Create Post', ['class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top:20px;']) }}

				{!! Form::close() !!} 

			</div>
			
	</div>


@endsection


@section('script')





{{!! Html::script('js/parsley.min.js') !!}}	
{{!! Html::script('js/select2.min.js') !!}}	



@endsection