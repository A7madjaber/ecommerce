
<!DOCTYPE html>
<html lang="en">
<head>
    <title>E-commerce | {{@$title}}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('front.layouts._css')

</head>

<body>

<div class="super_container">

    <!-- Header -->

   @include('front.layouts._header')

    <!-- Banner -->



@yield('content')

    @include('front.layouts._footer')

    <!-- Copyright -->

</div>

@include('front.layouts._js')
</body>

</html>
