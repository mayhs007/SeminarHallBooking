<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SeminarHallBooking|Admin</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{ HTML::Script("js/jquery.min.js") }} 
        {{ HTML::Style("css/materialize.min.css") }}
        {{ HTML::Style("css/font-awesome.min.css") }}
        {{ HTML::Style("css/material-icons.css") }}
        {{ HTML::Style("css/materialize-stepper.min.css") }} 
        {{ HTML::Style("css/app.css") }}
        {{ HTML::Style("css/my.css") }}
        {{ HTML::Style("css/nav.css") }}
        {{ HTML::Script("js/materialize.min.js") }}
        {{ HTML::Script("js/materialize-stepper.min.js") }}    
        {{ HTML::Script("js/app.js") }}
        {{ HTML::Script("js/select.js") }}
<body>
@include('layouts.partials.admin_nav')
@include('layouts.partials.flash')
<br>
<div class="container">
@yield('content')
</div>
</body>

</html>
