@extends('layouts.app')

@section('content')




    <div class="col-md-9 clearfix" id="basket">

        <div class="basket-items">
            @include('basket._items', ['basket', $basket])
        </div>



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