
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


{{--order tracking--}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Your Order Status Code</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                 <form method="post" action="{{route('order.tracking')}}">
                     @csrf
                     <div class="modal-body">
                         <label>Status Code</label>
                         <input type="text" name="code" required="" class="form-control" placeholder="Your Order Status Code">
                     </div>
                     <button class=" btn btn-info float-right" type="submit">Track Now</button>

                 </form>
            </div>


        </div>
    </div>
</div>


@include('front.layouts._js')
</body>

</html>
