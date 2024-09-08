<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('homeLayout')}}">Balaji</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                <li><a href="{{route('btobDashboard')}}"><span class="glyphicon glyphicon-user"></span> Welcome-{{ucfirst(Auth::user()->name)}}</a></li>
                <!-- <li><a href="{{route('getItem')}}">ITEM</a></li>
                <li><a href="{{route('getItemCarate')}}">CARATE</a></li>
                <li><a href="{{route('btobPurches')}}">PURCHES</a></li>
                <li><a href="{{route('btobproducts')}}">PRODUCTS</a></li> -->                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-list"></span>Action<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('btobPurches')}}"><span class="glyphicon glyphicon-asterisk"></span>PURCHES</a></li>
                        <li><a href="{{route('btobproducts')}}"><span class="glyphicon glyphicon-asterisk"></span>PRODUCTS</a></li>
                        <li><a href="{{route('getItem')}}"><span class="glyphicon glyphicon-asterisk"></span>ITEM</a></li>
                        <li><a href="{{route('getItemCarate')}}"><span class="glyphicon glyphicon-asterisk"></span>CARATE</a></li>
                    </ul>
                </li>
                <li><a href="{{route('btoblogout')}}"><span class="glyphicon glyphicon-log-out"></span>LOGOUT</a></li>
                @else
                <li><a href="/btob/about">ABOUT</a></li>
                <li><a href="/btob/services">SERVICES</a></li>
                <li><a href="/btob/contact">CONTACT</a></li>
                <li><a href="/btob/register">RGISTER</a></li>
                <li><a href="/btob/login">LOGIN</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>