<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-12 main-section">
            <div class="dropdown">
                <button type="button" class="btn btn-info" data-toggle="dropdown">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">
                        @if (session('cart') != null)
                            {{ count(session('cart')) }}
                        @else
                            0
                        @endif
                    </span>
                </button>
                @if (session('cart') != null)
                <div class="dropdown-menu">
                    <div class="row total-header-section">
                        <div class="col-lg-6 col-sm-6 col-6">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <span class="badge badge-pill badge-danger">
                                {{ count(session('cart')) }}
                            </span>
                        </div>

                        @if (session('cart') != null)
                            <?php $total = 0 ?>
                            @foreach(session('cart') as $id => $details)
                                <?php $total += $details['price'] * $details['quantity'] ?>
                            @endforeach

                            <div class="col-lg-6 col-sm-6 col-6 total-section text-center">
                                <br>
                                <p>Total: <span class="text-info">RM {{ $total }}</span></p>
                            </div>
                        @endif
                    </div>
                    @if(session('cart') != null)
                        @foreach(session('cart') as $id => $details)
                            <div class="row cart-detail">
                                {{-- <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                    <img src="{{ $details['photo'] }}" />
                                </div> --}}
                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                    <p><b>{{ $details['name'] }}</b></p>
                                    <span class="price text-info"> RM{{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                </div>
                            </div>
                            <br>
                        @endforeach
                    @endif
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                            <a href="{{ url('cart') }}" class="btn btn-primary btn-block">View all</a>
                        </div>
                    </div>
                </div>
                @endif
            </div>

        </div>
    </div>
</div>
<div class="container page">
    @yield('content')
</div>

@yield('scripts')

</body>
</html>
