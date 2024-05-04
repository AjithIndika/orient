<div>
    <?php
    use App\Livewire\GatePass\ViewGetpass;
    use App\Models\Retun_paddle_details;
    use App\Models\Retun_box_details;
    use App\Models\Retun_iron_details;
    use App\Models\Retun_machine_details;
    use App\Livewire\RetunGeatPass\ViewRetunGeatPass;

    ?>

    <html lang="en">

    <head>
        <title>Getpass</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <body style="background-color: grey">
        <div class="h-100 d-flex align-items-center justify-content-center">



            <div class="book">
                <div class="page">


                    <div class="row">
                        <div class="col-sm-3"><img src="{{ url('image-system/sw.png') }}" class="col"></div>
                        <div class="col">
                            <h2 class="mt-5">ORIENT SEWING MACHINE</h2>
                        </div>
                    </div>
                    <div class="row blackdiv">
                        <div class="col gb-black text-white mt-1"></div>
                    </div>

                    <div class="text-center mt-1">No840, Colombo Road, Katunayake</div>
                    <div class="text-center">Tel:- 077-0264002 / 076-8469631 / 077-7268270 / 031-2239197</div>
                    <div class="text-center">LR.N0.WAA 11146</div>

                    <div class="text-right mt-1 ">
                        <h2>RETUN DELIVERY NOTE </h2>
                    </div>

                    <div class="text-right mt-1 "> {{ $retun_geatpass_details_number }}</div>

                    @foreach ($getpass as $rete)
                        <div class="">Customer's Name </br> {{ $rete->customers_name }}
                            ,{{ $rete->customers_address }}</div>
                        <div class="mb-1"> {{ $rete->Customers_relation_officer_name }} /
                            {{ $rete->customers_telephone }} , {{ $rete->customers_email }} </br></div>


                        <table class="table mt-1">
                            <?php
                            $retunMC = Retun_machine_details::join('machin_list_details', 'machin_list_details.machin_list_details_id', '=', 'retun_machine_details.machin_list_details_id')
                                ->where('retun_geatpass_details_number', '=', $retun_geatpass_details_number)
                                ->where('retun_machine_details.customers_id', '=', $rete->customers_id)
                                ->get();

                            $repaddle = Retun_paddle_details::join('paddle_details', 'paddle_details.paddle_details_id', '=', 'retun_paddle_details.paddle_details_id')
                                ->where('retun_paddle_details.retun_geatpass_details_number', '=', $retun_geatpass_details_number)
                                ->where('retun_paddle_details.customers_id', '=', $rete->customers_id)
                                ->get();

                            $ironD = Retun_iron_details::join('iron_details', 'iron_details.iron_details_id', '=', 'retun_iron_details.iron_details_id')
                                ->where('retun_iron_details.retun_geatpass_details_number', '=', $retun_geatpass_details_number)
                                ->where('retun_iron_details.customers_id', '=', $rete->customers_id)
                                ->get();



                                $BoxRe =Retun_box_details::join('box_details', 'box_details.box_details_id', '=', 'retun_box_details.box_details_id')
                                ->where('retun_box_details.retun_geatpass_details_number', '=', $retun_geatpass_details_number)
                                ->where('retun_box_details.customers_id', '=', $rete->customers_id)
                                ->get();

                            ?>
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Machine Number</th>
                                    <th scope="col">Delivery number</th>
                                    <th scope="col">Box</th>
                                    <th scope="col">Paddle</th>
                                    <th scope="col">Iron</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($retunMC as $key => $rtMc)
                                    <tr>
                                        <th scope="row"></th>
                                        <td>{{ $rtMc->machin_list_details_barcode }}</td>
                                        <td>{{ $rtMc->geatpass_details_number }} </td>
                                        <td>{{ ViewRetunGeatPass::boxsn($rtMc->box_details_id) }}@if (!empty($rtMc->box_details_recive_date))
                                            <i class="lnr lnr-smile text-success"></i> @else<i
                                                    class="lnr lnr-sad text-danger"></i>
                                            @endif
                                        </td>
                                        <td>{{ ViewRetunGeatPass::paddlesn($rtMc->paddle_details_id) }}@if (!empty($rtMc->paddle_details_recive_date))
                                            <i class="lnr lnr-smile text-success"></i> @else<i
                                                    class="lnr lnr-sad text-danger"></i>
                                            @endif
                                        </td>
                                        <td>{{ ViewRetunGeatPass::ironsn($rtMc->iron_details_id) }}@if (!empty($rtMc->iron_details_recive_date))
                                            <i class="lnr lnr-smile text-success"></i> @else<i
                                                    class="lnr lnr-sad text-danger"></i>
                                            @endif
                                        </td>

                                    </tr>
                                @endforeach

                                <!-------- padddle details !------>
                                @if(!@empty($repaddle))
                                    <tr class="mt-1">
                                        <th colspan="3"> Paddll Details</th>
                                    </tr>
                                    @foreach ($repaddle as $padd)
                                        <tr>
                                            <th>Paddle </th>
                                            <td >{{ ViewRetunGeatPass::paddlesn($padd->paddle_details_id) }}</td>
                                            <td>{{ $padd->geatpass_details_number }}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                @endif
                                <!-------- Iron Details !---------->

                               @if(!@empty($ironD))
                                @foreach ($ironD as $Iron)
                                    <tr class="mt-1">
                                        <th > Iron</th>
                                        <td>{{ ViewRetunGeatPass::ironsn($Iron->iron_details_id) }}</td>
                                        <td>{{ $Iron->geatpass_details_number }}</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @endforeach
                                    @endempty

                                    @if(!@empty($BoxRe))
                                    @foreach ($BoxRe as $Box)
                                    <tr>
                                        <th>Box</th>
                                        <td>{{ ViewRetunGeatPass::boxsn($Box->box_details_id) }}</td>
                                        <td>{{ $Box->geatpass_details_number }}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @endforeach
                                @endif








                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col">Vehicle No : {{$rete->retun_geatpass_details_vehicle }}</div>
                        </div>
                        <div class="row">
                            <div class="col">Driver Name :{{ $rete->retun_geatpass_details_driver_name }}</div>
                        </div>
                        <div class="row">
                            <div class="col">Driver's NIC No :{{$rete->retun_geatpass_details_driver_nic }}</div>
                        </div>
                        <div class="row">
                            <div class="col">Contact No :{{ $rete->retun_geatpass_details_driver_mobile }}</div>
                        </div>


                    <div class="row gb-success">
                        <div class="col">Return Gate Pass :{{ $rete->return_gatepass_number }}</div>
                    </div>

                        <div class="row mt-5">
                            <div class="col">{{ $rete->created_at }}</div>
                            <div class="col">{{ $rete->retun_geatpass_details_crate_by }}</div>
                        </div>
                        <div class="row">
                            <div class="col">Date</div>
                            <div class="col">Issued By </div>
                        </div>
                        <div class="row">
                            <div class="col"></div>
                            <div class="col"></div>
                        </div>

                        <div class="row mt-5">
                            This genarate By System No Need to autharaization
                        </div>


                </div>
                @endforeach
            </div>
            <style>
                a:hover{
                    text-decoration: none;
                }
                .blackdiv {
                    background-color: black;
                    border-radius: 3px;
                    height: 50px;
                    margin-top: 30px;
                }

                body {
                    margin: 0;
                    padding: 0;
                    background-color: #FAFAFA;

                    font: 12pt "Tahoma";
                }

                * {
                    box-sizing: border-box;
                    -moz-box-sizing: border-box;
                }

                .page {
                    width: 21cm;
                    min-height: 29.7cm;
                    padding: 1cm;
                    margin: 1cm auto;
                    border: 1px #D3D3D3 solid;
                    border-radius: 5px;
                    background: white;
                    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
                }

                .subpage {
                    padding: 1cm;
                    border: 2px rgb(15, 3, 3) solid;
                    height: 256mm;
                    outline: 1cm #e9e0e0 solid;
                }

                @page {
                    /*  size: A4;*/
                    margin: 0;
                }

                @media print {
                    .page {
                        margin: 0;
                        border: initial;
                        border-radius: initial;
                        width: initial;
                        min-height: initial;
                        box-shadow: initial;
                        background: initial;
                        page-break-after: always;
                    }
                }
            </style>
        </div>


    </body>

    </html>

</div>
