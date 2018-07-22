<nav class="navbar-inverse navbar-toggleable-md" style="border: none; height: 110px;">
  <div class = "navbar-brand">
      <a href="{{ url('/') }}">
        <div id="imageBlock">
        <img id="logo" src="{{ asset('assets/images/love-825283_640.png') }}" alt="heart with pawprint" style="width:150px;height:150px;">
        </div>
          <!-- {{ config('app.name', 'Pet Stop') }} -->
      </a>
  </div>

  <ul class="nav navbar-nav">
       <!-- Authentication Links -->
       @guest
      <li><a href="{{ route('login') }}">Login</a></li>
      <li><a href="{{ route('register') }}">Register</a></li>
       @else
           <a class="nav-link" v-pre>
               {{ Auth::user()->name }} <span class="caret"></span>
           </a>

           <li><a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Logout</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                       {{ csrf_field() }}
            </form>
       @endguest
        <li><a class="{{ Request::is ('/') ? 'active': ''}}" href="/">Home</a></li>
        <li><a class="{{ Request::is ('about') ? 'active': ''}}" href="/about">About</a></li>
        <li><a class="{{ Request::is ('contact') ? 'active': ''}}" href="/contact">Contact</a></li>
        <li><a class="{{ Request::is ('profile') ? 'active': ''}}" href="/profile">Profile</a></li>
        <li><a class="{{ Request::is ('petSearch') ? 'active': ''}}" href="/petSearch">Pet Search</a></li>
        <li><a class="{{ Request::is ('serviceSearch') ? 'active': ''}}" href="/serviceSearch">Pet Services</a></li>
      </ul>
</nav>
