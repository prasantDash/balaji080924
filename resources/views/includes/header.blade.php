<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
        </div>
        <ul class="nav navbar-nav">
            <li class=""><a href="./">Home</a></li>
            <!-- <li><a href="#">Page 1</a></li>
            <li><a href="#">Page 2</a></li> -->
        </ul>
        <ul class="nav navbar-nav navbar-right">
            
            @if(Auth::check())
                <li><a href="{{route('profile')}}"><span class="glyphicon glyphicon-user"></span> {{ucfirst(Auth::user()->name)}}</a></li>
                <li><a href="{{route('logout')}}"><span class="glyphicon glyphicon-log-in"></span> Logout  </a> </li>
            @else
                <li><a href="/btob"><span class="glyphicon glyphicon-usd"></span> BTOB </a></li>
                <li><a href="{{route('register')}}"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                <li><a href="{{route('login')}}"><span class="glyphicon glyphicon-log-in"></span> Login </a></li>
            @endif            
        </ul>
    </div>
</nav>