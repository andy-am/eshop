<div class="row">
    {{ storage_path('fonts/') }}
    @if(!is_null($basket))
        <div class="col-md-12">
            <p class="text-muted lead text-center">You currently have {{ $basket->count() }} item(s) in your cart.</p>
        </div>
    @else
        <div class="col-md-12">
            <p class="text-muted lead text-center">Your cart is empty</p>
        </div>
    @endif
</div>

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