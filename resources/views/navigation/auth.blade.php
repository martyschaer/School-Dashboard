<ul class="nav navbar-nav">
  <li><a href="{{url('/dashboard')}}">Dashboard</a></li>
</ul>

<p class='navbar-text'>Logged in as {{Auth::user()->email}}</p>
<ul class="nav navbar-nav navbar-right">
    <li><a href="{{url('logout')}}">Logout</a></li>
</ul>
