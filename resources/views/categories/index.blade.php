@extends('layouts.app')

@section('content')

<div class="col-sm-3">

    <!-- *** MENUS AND FILTERS ***
_________________________________________________________ -->
    <div class="panel panel-default sidebar-menu">

        <div class="panel-heading">
            <h3 class="panel-title">Categories</h3>
        </div>

        <div class="panel-body">
            <ul class="nav nav-pills nav-stacked category-menu">
                @foreach($categories as $category)
                    <li class="active">
                        <a href="shop-category.html"> {{ $category->name }} <span class="badge pull-right">0</span></a>
                        {{--<ul>
                            <li><a href="shop-category.html">T-shirts</a>
                            </li>
                            <li><a href="shop-category.html">Shirts</a>
                            </li>
                            <li><a href="shop-category.html">Pants</a>
                            </li>
                            <li><a href="shop-category.html">Accessories</a>
                            </li>
                        </ul>--}}
                    </li>

                @endforeach

            </ul>

        </div>
    </div>

    <div class="panel panel-default sidebar-menu">

        <div class="panel-heading">
            <h3 class="panel-title">Brands</h3>
            <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> <span class="hidden-sm">Clear</span></a>
        </div>

        <div class="panel-body">

            <form>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox">Armani (10)
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox">Versace (12)
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox">Carlo Bruni (15)
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox">Jack Honey (14)
                        </label>
                    </div>
                </div>

                <button class="btn btn-default btn-sm btn-template-main"><i class="fa fa-pencil"></i> Apply</button>

            </form>

        </div>
    </div>

    <div class="panel panel-default sidebar-menu">

        <div class="panel-heading">
            <h3 class="panel-title clearfix">Colours</h3>
            <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> <span class="hidden-sm">Clear</span></a>
        </div>

        <div class="panel-body">

            <form>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> <span class="colour white"></span> White (14)
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> <span class="colour blue"></span> Blue (10)
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> <span class="colour green"></span> Green (20)
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> <span class="colour yellow"></span> Yellow (13)
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> <span class="colour red"></span> Red (10)
                        </label>
                    </div>
                </div>

                <button class="btn btn-default btn-sm btn-template-main"><i class="fa fa-pencil"></i> Apply</button>

            </form>

        </div>
    </div>

    <!-- *** MENUS AND FILTERS END *** -->

    <div class="banner">
        <a href="shop-category.html">
            <img src="/template/img/banner.jpg" alt="sales 2014" class="img-responsive">
        </a>
    </div>
    <!-- /.banner -->

</div>



<div class="col-sm-9">

    <p class="text-muted lead">In our Ladies department we offer wide selection of the best products we have found and carefully selected worldwide. Pellentesque habitant morbi tristique senectus et netuss.</p>

    <div class="row products">
        @foreach($products as $product)

            <div class="col-md-4 col-sm-6">
                <div class="product">
                    <div class="image">
                        <a href="{{url('/product',['id' => $product->id])}}">
                            <img src="/template/img/product1.jpg" alt="" class="img-responsive image1">
                        </a>
                    </div>
                    <!-- /.image -->
                    <div class="text">
                        <h3><a href="{{url('/product',['id' => $product->id])}}l"> {{ $product->title }} </a></h3>
                        <p class="price"> @if($product->action )<del>&euro; {{ $product->price }}</del> @endif &euro;{{ $product->price - (($product->price/100) * $product->percentage_action ) }}</p>
                        <p class="buttons">
                            <a href="shop-detail.html" class="btn btn-primary">View detail</a>
                            <a href="shop-basket.html" class="btn btn-template-main"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </p>
                    </div>
                    <!-- /.text -->
                </div>
                <div class="ribbon sale">
                    <div class="theribbon">SALE</div>
                    <div class="ribbon-background"></div>
                </div>
                <div class="ribbon new">
                    <div class="theribbon">NEW</div>
                    <div class="ribbon-background"></div>
                </div>
                @if($product->action)
                    <div class="ribbon action">
                        <div class="theribbon">&minus;{{ $product->percentage_action }}&percnt;</div>
                        <div class="ribbon-background"></div>
                    </div>
                @endif
                <!-- /.ribbon -->
                <!-- /.product -->
            </div>
            <!-- /.col-md-4 -->
        @endforeach
    </div>
    <!-- /.products -->

    <div class="row">

        <div class="col-md-12 banner">
            <a href="#">
                <img src="/template/img/banner2.jpg" alt="" class="img-responsive">
            </a>
        </div>

    </div>


    <div class="pages">

        <p class="loadMore">
            <a href="#" class="btn btn-template-main"><i class="fa fa-chevron-down"></i> Load more</a>
        </p>

        <ul class="pagination">
            {{ $products->links() }}
            {{--<li><a href="#">&laquo;</a>
            </li>
            <li class="active"><a href="#">1</a>
            </li>
            <li><a href="#">2</a>
            </li>
            <li><a href="#">3</a>
            </li>
            <li><a href="#">4</a>
            </li>
            <li><a href="#">5</a>
            </li>
            <li><a href="#">&raquo;</a>
            </li>--}}
        </ul>
    </div>


</div>
@endsection
