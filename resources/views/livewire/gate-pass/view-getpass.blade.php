<div>

    <?php
Use App\Livewire\GatePass\ViewGetpass;
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
    <body  style="background-color: grey">
        <div class="h-100 d-flex align-items-center justify-content-center">
@foreach ($getpass as $getdetails)


            <div class="book">
                <div class="page">


                    <div class="row">
                        <div class="col-sm-3"><img src="{{url('image-system/sw.png')}}" class="col"></div>
                        <div class="col"><h2 class="mt-5">ORIENT SEWING MACHINE</h2></div>
                    </div>
                    <div class="row blackdiv" >
                        <div class="col gb-black text-white mt-1">mmmmmmm</div>
                    </div>

                    <div class="text-center mt-1">No840, Colombo Road, Katunayake</div>
                    <div class="text-center">Tel:- 077-0264002 / 076-8469631 / 077-7268270 / 031-2239197</div>
                    <div class="text-center">LR.N0.WAA 11146</div>

                        <div class="text-right mt-1 "><h2>DELIVERY NOTE </h2></div>

                        <div class="text-right mt-1 "> {{$getdetails->geatpass_details_number}}</div>



                        <div class="">Customer's Name {{$getdetails->customers_name}} </div>
                        <div class=""> {{$getdetails->customers_address}} </div>


                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Machine Number</th>
                            <th scope="col">Description</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if(!empty($Machin))
                            @foreach ($Machin as $key=>$machGet)

                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{ViewGetpass::machintype($machGet->machin_type_details_id)}}
                                    {{ViewGetpass::machinBar($machGet->machin_list_details_id)}}
                                </td>
                                <td>{{ViewGetpass::machinnote($machGet->machin_list_details_id)}}</br>
                                    {{ViewGetpass::boxsn($machGet->box_details_id)}}
                                    {{ViewGetpass::paddlesn($machGet->paddle_details_id)}}
                                    {{ViewGetpass::ironsn($machGet->iron_details_id)}}
                        </td>
                              </tr>

                            @endforeach
                            @endif
<!-------- padddle details !------>
                            @empty($paddel)
                            @else
                            <tr class="mt-1">
                                <th colspan="3"> Paddll Details</th>
                            </tr>
                            @foreach ($paddel as $key=>$padd)
                            <tr>
                                <th></th>
                                <td colspan="2"> {{ViewGetpass::paddlesn($padd->paddle_details_id)}}</td>
                            </tr>
                            @endforeach
                           @endempty
<!-------- Iron Details !---------->
                           @empty($iron)
                           @else
                           <tr class="mt-1">
                               <th colspan="3"> Paddll Details</th>
                           </tr>
                           @foreach ($iron as $keys=>$Iron)
                           <tr>
                               <th></th>
                               <td colspan="2"> {{ViewGetpass::ironsn($Iron->ron_details_id)}}</td>
                           </tr>
                           @endforeach
                          @endempty


                        </tbody>
                      </table>

                      <div class="row">
                        <div class="col">Vehicle No : {{$getdetails->geatpass_details_vehicle}}</div>
                      </div>
                      <div class="row">
                        <div class="col">Driver Name : {{$getdetails->geatpass_details_driver_name}}</div>
                      </div>
                      <div class="row">
                        <div class="col">Driver's NIC No :{{$getdetails->geatpass_details_driver_nic}}</div>
                      </div>
                      <div class="row">
                        <div class="col">Contact No :{{$getdetails->geatpass_details_driver_mobile}}</div>
                      </div>

                      <div class="row">
                        <div class="col"></div>
                        <div class="col">{{$getdetails->geatpass_details_crate_by}}</div>
                      </div>
                      <div class="row">
                        <div class="col"></div>
                        <div class="col">Issued By / {{$getdetails->created_at}}</div>
                      </div>
                      <div class="row">
                        <div class="col"></div>
                        <div class="col">{{$getdetails->created_at}}</div>
                      </div>

                      <div class="row">
                       This genarate By System No Need to autharaization 
                      </div>


                </div>
                @endforeach
              </div>
              <style>

                .blackdiv{
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
