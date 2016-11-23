<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Faktúra: {{ $invoice_number }} </title>

    {{--<link href="https://fonts.googleapis.com/css?family=Frank+Ruhl+Libre" rel="stylesheet">--}}
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="{{ public_path().'/libs/bootstrap-3.3.7-dist/css/bootstrap.css' }}">
    <style>

        body{
            /*font-family: 'Frank Ruhl Libre', sans-serif;*/

        }
        p,td strong{
            /*font-family: DejaVu Sans, sans-serif;*/
            /*font-family: 'Dosis', sans-serif;*/
            /*font-family: "DejaVu Sans Mono", monospace;*/

        }
        p{
            padding: -7px;
        }
        .page-break {
            page-break-after: always;
        }
        .bold{
            font-weight: bold;
        }
        .supplier{
            margin-left: 0%;
            width: 47%;
            color: #000000;
            float: left;

        }
        .subscriber{
            margin-left: 49%;
            width: 47%;
            color: #000000;

        }
        .vertical_line{
            /*border-right: 1px solid rgba(111, 76, 70, 0.30);*/
            margin-left: 48%;
            width:2%;
        }
        .left_offset{
            padding-left: 15px;
        }
        .invoice_number{
            margin-bottom: 15px;
            width: 100%;
            height: 30px;
            font-size: 20px;
            text-align: right;
        }
        .delivery_box{
            margin-bottom: 15px;
            /*border-bottom: 1px dotted;*/
        }


    </style>

<body>
{{ public_path().'/libs/bootstrap-3.3.7-dist/css/bootstrap.css' }}
    <div class="delivery_box">
        <div class="vertical_line"></div>
        <div class="invoice_number"><strong>Faktúra: # {{ $invoice_number }}</strong></div>
        <div class="supplier">
            <p class="bold" style="color: #0081c2">DODÁVATEĽ:</p>
            <hr/>
            <div class="left_offset">
                <p>{{ $company_data->company_name }}</p>
                <p>{{ $company_data->company_street }}</p>
                <p>{{ $company_data->company_zip_code }} {{ $company_data->company_city }}</p>
                <p>{{ $company_data->company_country }}</p>
            </div>


        </div>
        <div class="subscriber">
            <p class="bold" style="color: #0081c2;">ODBREATEĽ:</p>
            <hr/>
            <div class="left_offset">
                <p>{{ $customer_data->degree_before_name }} {{ $customer_data->first_name }} {{ $customer_data->last_name }} {{ $customer_data->degree_behind_name }}</p>
                <p>{{ $customer_data->street }}</p>
                <p>{{ $customer_data->zip_code }} {{ $customer_data->city }}</p>
                <p>{{ $customer_data->country }}</p>
            </div>

        </div>
    </div>

    <hr/>

    <div class="bold"></div>


    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Sumár:</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                            <tr>
                                <td><strong>Položka</strong></td>
                                <td class="text-center"><strong>Jednotková cena</strong></td>
                                <td class="text-center"><strong><>Počet</strong></td>
                                <td class="text-center"><strong>DPH</strong></td>
                                <td class="text-right"><strong>Spolu</strong></td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $total = 0 ?>
                            <?php $total_dph = 0 ?>
                            <?php $shipping = 2 ?>
                            @foreach($order_data as $data)
                                <tr>
                                    <td>{{ $data->title }}</td>
                                    <td class="text-center">{{ $data->price }}&euro;</td>
                                    <td class="text-center">{{ $data->count }}</td>
                                    <td class="text-center">{{ $data->dph.'%' }}</td>
                                    <td class="text-right">{{ $data->total_price_dph_product }}&euro;</td>
                                </tr>
                                <?php $total += $data->total_price_product; ?>
                                <?php $total_dph += $data->total_price_dph_product; ?>
                            @endforeach
                            <tr>
                                <td class="thick-line"></td>
                                <td class="thick-line"></td>
                                <td class="thick-line"></td>
                                <td class="thick-line text-center"><strong>Prepočet:</strong></td>
                                <td class="thick-line text-right">{{ number_format($total_dph, 2, ',', ' ') }}&euro;</td>
                            </tr>
                            <tr>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line text-center"><strong>Zaslanie:</strong></td>
                                <td class="no-line text-right">{{ number_format($shipping + ($shipping * 0.19), 2,',',' ' )}}&euro;</td>
                            </tr>
                            <tr>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line text-center"><strong>Spolu s DPH</strong></td>
                                <td class="no-line text-right">{{ number_format($total_dph + $shipping +($shipping * 0.19) , 2, ',', ' ') }}&euro;</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




</body>
</html>



