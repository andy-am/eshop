@extends('layouts.app')

@section('content')
    <div class="col-md-9 clearfix">

        <p class="lead">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>

        <div class="row products">
            @foreach($products as $product)
                <div class="col-md-3 col-sm-4">
                    <div class="product">
                        <div class="image">
                            <a href="{{url('/product',['id' => $product->id])}}">
                                <img src="/template/img/product1.jpg" alt="" class="img-responsive image1">
                            </a>
                        </div>
                        <!-- /.image -->
                        <div class="text">
                            <h3><a href="{{url('/product',['id' => $product->id])}}">{{ $product->title }}</a></h3>
                            <p class="price">@if($product->action )<del>&euro; {{ $product->price }}</del> @endif &euro;{{ $product->price - (($product->price/100) * $product->percentage_action ) }}</p>
                            <p class="buttons">
                                <a href="shop-detail.html" class="btn btn-default">View detail</a>
                                <a href="shop-basket.html" class="btn btn-template-main"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </p>
                        </div>
                        <!-- /.text -->

                        <div class="ribbon sale">
                            <div class="theribbon">SALE</div>
                            <div class="ribbon-background"></div>
                        </div>
                        <!-- /.ribbon -->

                        <div class="ribbon new">
                            <div class="theribbon">NEW</div>
                            <div class="ribbon-background"></div>
                        </div>
                        <!-- /.ribbon -->

                        @if($product->action)
                            <div class="ribbon action">
                                <div class="theribbon">&minus;{{ $product->percentage_action }}&percnt;</div>
                                <div class="ribbon-background"></div>
                            </div>
                        @endif
                    </div>
                    <!-- /.product -->
                </div>
            @endforeach

            <!-- /.col-md-4 -->
        </div>
        <!-- /.products -->

    </div>
    <!-- /.col-md-9 -->

    <!-- *** LEFT COLUMN END *** -->

    <!-- *** RIGHT COLUMN ***
_________________________________________________________ -->

    <div class="col-md-3">
        <!-- *** CUSTOMER MENU ***
_________________________________________________________ -->
        <div class="panel panel-default sidebar-menu">

            <div class="panel-heading">
                <h3 class="panel-title">Customer section</h3>
            </div>

            <div class="panel-body">

                <ul class="nav nav-pills nav-stacked">
                    <li class="active">
                        <a href="customer-orders.html"><i class="fa fa-list"></i> My orders</a>
                    </li>
                    <li>
                        <a href="customer-wishlist.html"><i class="fa fa-heart"></i> My wishlist</a>
                    </li>
                    <li>
                        <a href="customer-account.html"><i class="fa fa-user"></i> My account</a>
                    </li>
                    <li>
                        <a href="index.html"><i class="fa fa-sign-out"></i> Logout</a>
                    </li>
                </ul>
            </div>

        </div>
        <!-- /.col-md-3 -->

        <!-- *** CUSTOMER MENU END *** -->
    </div>
@endsection