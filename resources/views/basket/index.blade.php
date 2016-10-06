@extends('layouts.app')

@section('content')

    @if(!is_null($basket))
        <div class="col-md-12">
            <p class="text-muted lead">You currently have {{ $basket->count() }} item(s) in your cart.</p>
        </div>
    @else
        <div class="col-md-12">
            <p class="text-muted lead text-center">Your cart is empty</p>
        </div>
    @endif


    <div class="col-md-9 clearfix" id="basket">
        @if(!is_null($basket))
            <div class="box">

                <form method="POST" action="{{ url('/order/updateBasket') }}">
                    {{ csrf_field() }}
                    {{--{{ csrf_token() }}--}}
                    <div class="table-responsive">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="2">Product</th>
                                    <th>Quantity</th>
                                    <th>Unit price</th>
                                    <th>DPH</th>
                                    <th colspan="2">Total</th>
                                </tr>
                            </thead>

                                <?php $total = 0; ?>
                                <?php $total_dph = 0; ?>
                                @foreach($basket as $k => $b)
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="#">
                                                    <img src="/template/img/detailsquare.jpg" alt="White Blouse Armani">
                                                </a>
                                            </td>
                                            <td><a href="{{ url('/product',[$b->id]) }}">{{ $b->title}}</a>
                                            </td>
                                            <td>
                                                <input type="hidden" name="product_id[]" value="{{ $b->id }}">
                                                <input type="number" name="quantity[]" value="{{ $quantity[$b->id] }}" min="1" class="form-control">
                                            </td>
                                            <td>&euro;{{ $b->price }}</td>
                                            <td>{{ $b->dph }} &percnt;</td>
                                            <td>&euro;{{ $quantity[$b->id] * $b->price + ($quantity[$b->id] * $b->dph * ($b->price/100)) }}</td>
                                            <td><a href="{{ url('/product/removeFromBasket', [$b->id]) }}"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        <?php $total += $b->price * $quantity[$b->id]; ?>
                                        <?php $total_dph += ($b->price + ($b->dph * ($b->price/100))) * $quantity[$b->id]; ?>
                                    </tbody>
                                @endforeach

                            <tfoot>
                                <tr>
                                    <th colspan="3">Total</th>
                                    <th colspan="1">&euro;{{ number_format($total, 2, ',', ' ') }}</th>
                                    <th colspan="1"></th>
                                    <th colspan="2">&euro;{{ number_format($total_dph, 2, ',', ' ') }}</th>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                    <!-- /.table-responsive -->

                    <div class="box-footer">
                        <div class="pull-left">
                            <a href="shop-category.html" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-default"><i class="fa fa-refresh"></i> Update cart</button>
                            {{--<a href="{{ url('/order/proceedToCheckoutStep_1') }}" class="btn btn-template-main">Proceed to checkout <i class="fa fa-chevron-right"></i></a>--}}
                            <a href="{{ url('/order/doOrder') }}" class="btn btn-template-main">Create Order<i class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>

                </form>

            </div>
        <!-- /.box -->
        @endif

        <div class="row">
            <div class="col-md-3">
                <div class="box text-uppercase">
                    <h3>You may also like these products</h3>
                </div>
            </div>

            <div class="col-md-3">
                <div class="product">
                    <div class="image">
                        <a href="shop-detail.html">
                            <img src="/template/img/product2.jpg" alt="" class="img-responsive image1">
                        </a>
                    </div>
                    <div class="text">
                        <h3><a href="shop-detail.html">Fur coat</a></h3>
                        <p class="price">$143</p>

                    </div>
                </div>
                <!-- /.product -->
            </div>

            <div class="col-md-3">
                <div class="product">
                    <div class="image">
                        <a href="shop-detail.html">
                            <img src="/template/img/product3.jpg" alt="" class="img-responsive image1">
                        </a>
                    </div>
                    <div class="text">
                        <h3><a href="shop-detail.html">Fur coat</a></h3>
                        <p class="price">$143</p>
                    </div>
                </div>
                <!-- /.product -->
            </div>

            <div class="col-md-3">
                <div class="product">
                    <div class="image">
                        <a href="shop-detail.html">
                            <img src="/template/img/product1.jpg" alt="" class="img-responsive image1">
                        </a>
                    </div>
                    <div class="text">
                        <h3><a href="shop-detail.html">Fur coat</a></h3>
                        <p class="price">$143</p>
                    </div>
                </div>
                <!-- /.product -->
            </div>

        </div>

    </div>
    <!-- /.col-md-9 -->

    <div class="col-md-3">
        <div class="box" id="order-summary">
            <div class="box-header">
                <h3>Order summary</h3>
            </div>
            <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

            <div class="table-responsive">
                <table class="table">
                    <tbody>
                    <tr>
                        <td>Order subtotal</td>
                        <th>$446.00</th>
                    </tr>
                    <tr>
                        <td>Shipping and handling</td>
                        <th>$10.00</th>
                    </tr>
                    <tr>
                        <td>Tax</td>
                        <th>$0.00</th>
                    </tr>
                    <tr class="total">
                        <td>Total</td>
                        <th>$456.00</th>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>


        <div class="box">
            <div class="box-header">
                <h4>Coupon code</h4>
            </div>
            <p class="text-muted">If you have a coupon code, please enter it in the box below.</p>
            <form>
                <div class="input-group">

                    <input type="text" class="form-control">

                                    <span class="input-group-btn">

					    <button class="btn btn-template-main" type="button"><i class="fa fa-gift"></i></button>

					</span>
                </div>
                <!-- /input-group -->
            </form>
        </div>

    </div>

@endsection