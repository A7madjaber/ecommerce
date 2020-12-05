
<!DOCTYPE html>
<html lang="en">
<head>
    <title>E-commerce | {{@$title}}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('front.layouts._css')
<style>
    .semipolar-spinner, .semipolar-spinner * {
        box-sizing: border-box;
    }

    .semipolar-spinner {
        height: 65px;
        width: 65px;
        position: relative;
    }

    .semipolar-spinner .ring {
        border-radius: 50%;
        position: absolute;
        border: calc(65px * 0.05) solid transparent;
        border-top-color: #ff1d5e;
        border-left-color: #ff1d5e;
        animation: semipolar-spinner-animation 2s infinite;
    }

    .semipolar-spinner .ring:nth-child(1) {
        height: calc(65px - 65px * 0.2 * 0);
        width: calc(65px - 65px * 0.2 * 0);
        top: calc(65px * 0.1 * 0);
        left: calc(65px * 0.1 * 0);
        animation-delay: calc(2000ms * 0.1 * 4);
        z-index: 5;
    }

    .semipolar-spinner .ring:nth-child(2) {
        height: calc(65px - 65px * 0.2 * 1);
        width: calc(65px - 65px * 0.2 * 1);
        top: calc(65px * 0.1 * 1);
        left: calc(65px * 0.1 * 1);
        animation-delay: calc(2000ms * 0.1 * 3);
        z-index: 4;
    }

    .semipolar-spinner .ring:nth-child(3) {
        height: calc(65px - 65px * 0.2 * 2);
        width: calc(65px - 65px * 0.2 * 2);
        top: calc(65px * 0.1 * 2);
        left: calc(65px * 0.1 * 2);
        animation-delay: calc(2000ms * 0.1 * 2);
        z-index: 3;
    }

    .semipolar-spinner .ring:nth-child(4) {
        height: calc(65px - 65px * 0.2 * 3);
        width: calc(65px - 65px * 0.2 * 3);
        top: calc(65px * 0.1 * 3);
        left: calc(65px * 0.1 * 3);
        animation-delay: calc(2000ms * 0.1 * 1);
        z-index: 2;
    }

    .semipolar-spinner .ring:nth-child(5) {
        height: calc(65px - 65px * 0.2 * 4);
        width: calc(65px - 65px * 0.2 * 4);
        top: calc(65px * 0.1 * 4);
        left: calc(65px * 0.1 * 4);
        animation-delay: calc(2000ms * 0.1 * 0);
        z-index: 1;
    }

    @keyframes semipolar-spinner-animation {
        50% {
            transform: rotate(360deg) scale(0.7);
        }
    }
</style>


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
