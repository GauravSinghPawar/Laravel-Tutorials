@extends('main')



@section('stylesheet')

@endsection


@section('title','| Homepage')


@section('content')
    <div classs="row">
        <div class="col-md-12">

            <div class="jumbotron">
              <h1 class="display-4">Welcome to Laravel Blog</h1>
              <p class="lead">This is our testing website on Laravel. Please visit our Popular Blog.</p
              <hr class="my-4">
              <p>Please Keep visiting to check the latest Laravel News</p>
              <a class="btn btn-primary btn-lg" href="#" role="button">Popular Posts</a>
            </div>
        </div>
    </div><!--End of .row-->

    <div class="row">
        <div class="col-md-8">


            @foreach($posts as $post)

            <div class="post">
                <h3>{{ $post->title }}</h3>
                <p>{{ substr(strip_tags($post->body), 0, 80) }}{{ strlen(strip_tags($post->body)) > 80 ? "...": ""}}</p>
                <a href="{{url('blog',$post->slug)}}" class="btn btn-primary">Read More</a>
            </div>
            <hr>
            
            @endforeach

        </div>

        <div class="col-md-3 col-md-offset-1">
            <h3>Sidebar</h3>
        </div>
    </div>

@endsection



@section('javascript')
    
    <script type="text/javascript">
        
        //confirm("javascript is beign loaded");

    </script>
@endsection