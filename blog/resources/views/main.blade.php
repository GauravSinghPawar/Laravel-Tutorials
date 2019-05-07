<!doctype html>
<html lang="en">

<head>
  @include('partials._head')
  
  <link href="{{asset('css/select2.min.css')}}" rel="stylesheet">
  
</head>


<body>
      
  @include('partials._nav')



  <div class="container">

  	@include('partials._messages')


  	<!--returns true or false if a user is logged in or logged out-->

  	{{-- {{ Auth::check() ? "Logged In" : "Logged Out"}} --}}

    @yield('content')

  </div><!--End of container-->


  @include('partials._footer')

  @include('partials._javascripts')


  @yield('javascript')
<script src="{{asset('js/select2.min.js')}}"></script>
</body>
</html>