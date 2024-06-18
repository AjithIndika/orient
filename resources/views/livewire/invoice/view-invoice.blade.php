
<div>


<?php

use Carbon\Carbon;
use App\Livewire\Invoice\ReadyToSend;
use App\Models\InvoiceMacineDetails;

?>


    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet"
        href="https://github.com/sahrullahh/invoice-template-html/blob/master/assets/css/invoice.css" />

    <style>
       /* @import "https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap";*/





        .wrapper-invoice {
            display: flex;
            justify-content: center;
        }

        .wrapper-invoice .invoice {
            height: auto;
            background: #fff;
            padding: 5vh;
            margin-top: 5vh;
            max-width: 100%;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #dcdcdc;
        }

        .wrapper-invoice .invoice .invoice-information {
            float: right;
            text-align: right;
        }

        .wrapper-invoice .invoice .invoice-information b {
            color: "#0F172A";
        }

        .wrapper-invoice .invoice .invoice-information p {
            font-size: 2vh;
            color: gray;
        }

        .wrapper-invoice .invoice .invoice-logo-brand h2 {
            text-transform: uppercase;
            font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
            font-size: 2.9vh;
            color: "#0F172A";
        }

        .wrapper-invoice .invoice .invoice-logo-brand img {
            max-width: 100px;
            width: 100%;
            object-fit: fill;
        }

        .wrapper-invoice .invoice .invoice-head {
            display: flex;
            margin-top: 8vh;
        }

        .wrapper-invoice .invoice .invoice-head .head {
            width: 100%;
            box-sizing: border-box;
        }

        .wrapper-invoice .invoice .invoice-head .client-info {
            text-align: left;
        }

        .wrapper-invoice .invoice .invoice-head .client-info h2 {
            font-weight: 500;
            letter-spacing: 0.3px;
            font-size: 2vh;
            color: "#0F172A";
        }

        .wrapper-invoice .invoice .invoice-head .client-info p {
            font-size: 2vh;
            color: gray;
        }

        .wrapper-invoice .invoice .invoice-head .client-data {
            text-align: right;
        }

        .wrapper-invoice .invoice .invoice-head .client-data h2 {
            font-weight: 500;
            letter-spacing: 0.3px;
            font-size: 2vh;
            color: "#0F172A";
        }

        .wrapper-invoice .invoice .invoice-head .client-data p {
            font-size: 2vh;
            color: gray;
        }

        .wrapper-invoice .invoice .invoice-body {
            margin-top: 8vh;
        }

        .wrapper-invoice .invoice .invoice-body .table {
            border-collapse: collapse;
            width: 100%;
        }

        .wrapper-invoice .invoice .invoice-body .table thead tr th {
            font-size: 2vh;
            border: 1px solid #dcdcdc;
            text-align: left;
            padding: 1vh;
            background-color: #eeeeee;
        }

        .wrapper-invoice .invoice .invoice-body .table tbody tr td {
            font-size: 2vh;
            border: 1px solid #dcdcdc;
            text-align: left;
            padding: 1vh;
            background-color: #fff;
        }

        .wrapper-invoice .invoice .invoice-body .table tbody tr td:nth-child(2) {
            text-align: right;
        }

        .wrapper-invoice .invoice .invoice-body .flex-table {
            display: flex;
        }

        .wrapper-invoice .invoice .invoice-body .flex-table .flex-column {
            width: 100%;
            box-sizing: border-box;
        }

        .wrapper-invoice .invoice .invoice-body .flex-table .flex-column .table-subtotal {
            border-collapse: collapse;
            box-sizing: border-box;
            width: 100%;
            margin-top: 2vh;
        }

        .wrapper-invoice .invoice .invoice-body .flex-table .flex-column .table-subtotal tbody tr td {
            font-size: 2vh;
            border-bottom: 1px solid #dcdcdc;
            text-align: left;
            padding: 1vh;
            background-color: #fff;
        }

        .wrapper-invoice .invoice .invoice-body .flex-table .flex-column .table-subtotal tbody tr td:nth-child(2) {
            text-align: right;
        }

        .wrapper-invoice .invoice .invoice-body .invoice-total-amount {
            margin-top: 1rem;
        }

        .wrapper-invoice .invoice .invoice-body .invoice-total-amount p {
            font-weight: bold;
            color: "#0F172A";
            text-align: right;
            font-size: 2vh;
        }

        .wrapper-invoice .invoice .invoice-footer {
            margin-top: 4vh;
        }

        .wrapper-invoice .invoice .invoice-footer p {
            font-size: 1.7vh;
            color: gray;
        }

        .copyright {
            margin-top: 2rem;
            text-align: center;
        }

        .copyright p {
            color: gray;
            font-size: 1.8vh;
        }

        @media print {
            .table thead tr th {
                -webkit-print-color-adjust: exact;
                background-color: #eeeeee !important;
            }

            .copyright {
                display: none;
            }
        }

        .rtl {
            direction: rtl;
            font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
        }

        .rtl .invoice-information {
            float: left !important;
            text-align: left !important;
        }

        .rtl .invoice-head .client-info {
            text-align: right !important;
        }

        .rtl .invoice-head .client-data {
            text-align: left !important;
        }

        .rtl .invoice-body .table thead tr th {
            text-align: right !important;
        }

        .rtl .invoice-body .table tbody tr td {
            text-align: right !important;
        }

        .rtl .invoice-body .table tbody tr td:nth-child(2) {
            text-align: left !important;
        }

        .rtl .invoice-body .flex-table .flex-column .table-subtotal tbody tr td {
            text-align: right !important;
        }

        .rtl .invoice-body .flex-table .flex-column .table-subtotal tbody tr td:nth-child(2) {
            text-align: left !important;
        }

        .rtl .invoice-body .invoice-total-amount p {
            text-align: left !important;
        }

        /*# sourceMappingURL=invoice.css.map */
    </style>


<body>
    <section class="wrapper-invoice">

        <?php
        $invo = json_decode($invoice);

        ?>






        <!-- switch mode rtl by adding class rtl on invoice class -->
        <div class="invoice">
            <div class="invoice-information">
                <p><b>Invoice #</b> :{{ $invoice_details_number }} </p>
                <p><b>Created Date </b>:{{ Carbon::parse($invo->invoice_details_jenarate_Date)->format('Y M d') }}</p>
                <p><b>Due Date</b> : {{ Carbon::parse($invo->invoice_details_due_Date)->format('Y M d') }}</p>
            </div>
            <!-- logo brand invoice -->
            <div class="invoice-logo-brand">
                <!-- <h2>Tampsh.</h2> -->




                <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/image-system/sw.png'))) }}">

            </div>
            <!-- invoice head -->
            <div class="invoice-head">
                <div class="head client-info">
                    <p> {{ $invo->customers_name }}</p>
                    <p>{{ $invo->customers_address }}</p>

                </div>
                <div class="head client-data">
                    <p>-</p>
                    <p>{{ $invo->Customers_relation_officer_name }}</p>
                    <p>{{ $invo->customers_telephone }}</p>
                    <p>{{ $invo->customers_email }}</p>
                </div>
            </div>





            <!-- invoice body-->
            <div class="invoice-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Item Description</th>
                            <th style="width:10%;text-align: center;">Used Date</th>
                            <th style="width:10%;text-align: center;">Daily Rate</th>
                            <th style="width:10%;text-align: center;">Amount</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            $inMc =InvoiceMacineDetails::where('invoice_details_number','=',$invoice_details_number)->get();

                            ?>
                        @foreach ($inMc as $mc)
                            <tr>
                                <td>{{ ReadyToSend::mcdetails($mc->machin_list_details_id) }}
                                    <br>{{ ReadyToSend::mcde($mc->machin_list_details_id) }} <br>

                                    @if (!empty($mc->box_details_id))
                                        {{ ReadyToSend::boxsn($mc->box_details_id) }}

                                        @if (!empty($mc->box_details_recive_date))
                                            - Returned
                                        @endif
                                        <br>
                                    @endif


                                    @if (!empty($mc->paddle_details_id))
                                    {{ ReadyToSend::paddlesn($mc->paddle_details_id) }}

                                    @if (!empty($mc->paddle_details_recive_date))
                                        - Returned
                                    @endif
                                    <br>
                                @endif

                                @if (!empty($mc->iron_details_id))
                                    {{ ReadyToSend::ironsn($mc->iron_details_id) }}

                                    @if (!empty($mc->iron_details_recive_date))
                                        - Returned
                                    @endif
                                    <br>
                                @endif
                                </td>
                                <td style="width:10%;text-align: center;">{{$mc->used_date }} </td>
                                <td style="width:10%;text-align: center;">Rs: {{$mc->machin_list_details_daily_rent }}</td>
                                <td style="width:10%;text-align: center;">Rs: {{$mc->cost_of_used_date }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="flex-table">
                    <div class="flex-column"></div>
                    <div class="flex-column">
                        <table class="table-subtotal">
                            <tbody>
                                <tr>
                                    <td>Subtotal</td>
                                    <td>Rs:{{$invo->invoice_details_total}}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- invoice total  -->
                <div class="invoice-total-amount">
                    <p>Total :Rs: {{$invo->invoice_details_total}}</p>
                </div>
            </div>
            <!-- invoice footer -->
            <div class="invoice-footer">
                <p></p>
            </div>
        </div>
    </section>
    <div class="copyright">
        <p>System Design and Development  @ <a href="www.webiosa.com">Webi Osa(Pvt)Ltd.</a></p>
    </div>


    <style type="text/css">
    @media print {
  #printPageButton {
    display: none;
  }
}</style>





    <button type="button" id="printPageButton" class="btn btn-lg btn-success"  wire:click.prevent="pdf()">
        <i class="feather icon-save"></i>&nbsp;&nbsp;Approved 
    </button>




</div>
