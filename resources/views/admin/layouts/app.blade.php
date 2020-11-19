<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->

    <title>Dashboard | {{@$title}}</title>

    <!-- vendor css -->
  @include('admin.layouts._css')

</head>

<body>


@guest
    @yield('content')
@else



@include('admin.layouts._sid')


<!-- ########## START: HEAD PANEL ########## -->


@include('admin.layouts._header')


<!-- ########## START: MAIN PANEL ########## -->


@yield('content')




<!-- ########## END: MAIN PANEL ########## -->
@endguest

@include('admin.layouts._js')


</body>
</html>
