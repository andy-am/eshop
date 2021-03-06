@extends('layouts.app')

@section('content')

    <div class="col-md-9 clearfix" id="checkout">

        <div class="box">
            <form method="post" action="shop-checkout2.html">

                <ul class="nav nav-pills nav-justified">
                    <li class="active"><a href="#"><i class="fa fa-map-marker"></i><br>Address</a>
                    </li>
                    <li class="disabled"><a href="#"><i class="fa fa-truck"></i><br>Delivery Method</a>
                    </li>
                    <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                    </li>
                    <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                    </li>
                </ul>

                <div class="content">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="firstname">Firstname</label>
                                <input type="text" class="form-control" id="firstname">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="lastname">Lastname</label>
                                <input type="text" class="form-control" id="lastname">
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="company">Company</label>
                                <input type="text" class="form-control" id="company">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="street">Street</label>
                                <input type="text" class="form-control" id="street">
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label for="zip">ZIP</label>
                                <input type="text" class="form-control" id="zip">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label for="state">State</label>
                                <select class="form-control" id="state"></select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label for="country">Country</label>
                                <select class="form-control" id="country"></select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="phone">Telephone</label>
                                <input type="text" class="form-control" id="phone">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email">
                            </div>
                        </div>

                    </div>
                    <!-- /.row -->
                </div>

                <div class="box-footer">
                    <div class="pull-left">
                        <a href="shop-basket.html" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to basket</a>
                    </div>
                    <div class="pull-right">
                        <button type="submit" class="btn btn-template-main">Continue to Delivery Method<i class="fa fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->


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

    </div>
    <!-- /.col-md-3 -->

@endsection