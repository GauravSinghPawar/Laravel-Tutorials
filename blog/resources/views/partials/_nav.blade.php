    <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="#">Laravel Blog</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item {{ Request::is('/') ? "active" : "" }}">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
              </li>
             <li class="nav-item {{ Request::is('blog') ? "active" : "" }}">
                <a class="nav-link" href="/blog">Blog <span class="sr-only"></span></a>
              </li>
              <li class="nav-item {{ Request::is('about') ? "active" : "" }}">
                <a class="nav-link" href="about">About Us</a>
              </li>
              <li class="nav-item {{ Request::is('contact') ? "active" : "" }}">
                <a class="nav-link" href="contact">Contact</a>
              </li>
            </ul>


             <span class="nav-item dropdown">

                @if(Auth::check())
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Hello {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="{{ route('posts.index') }}">Posts</a></li>
                  <li><a href="{{ route('categories.index') }}">Categories</a></li>
                  <li><a href="{{ route('tags.index') }}">Tags</a></li>
                  <li>
                  <a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                      Logout
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
                </li>
                </div>
                
                @else

                  <a href="{{ route('login') }}" class="btn btn-default">Login </a>

                @endif

              </span>

          </div>
        </nav>
