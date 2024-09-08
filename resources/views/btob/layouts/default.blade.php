<!DOCTYPE html>
<html lang="en">
@include('btob.includes.head')
<body>
    @include('btob.includes.header')
    <div class="container body-container" style="margin-top:40px">
        @yield('content')
    </div>    
    @include('btob.includes.footer')
</body>
</html>