<div class="bg-white">
    <?php
    use App\Models\DeliveryMachineDetails;
    use App\Models\MachinListDetails;
    use App\Livewire\RetunGeatPass\NewReturnGetpass;
    use App\Models\DeliverypaddleDetails;
    use App\Models\DeliverypIronDetails;
    use App\Models\OtheParts;
    use App\Models\delivery_Othe_Parts;

    ?>


    <div class="" class="col-sm-10" style="margin-top: 60px">

        <style>
            .maintitel {
                font-size: 250%;
                font-weight: bolder;
            }

            .notiece {
                font-size: 180%;
                font-weight: bolder;

            }
        </style>
        <h2 class="text-center maintitel">Retun your Item</h2>
        <p class="text-danger text-center notiece">Carefully, Double check after returning it. this can't roll back</p>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>#</th>

                    <th class="text-center">
                        <h1 class="">All Details Customer Used</h1>
                    </th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>Machine</td>
                    <td>
                        <table class="table table-hover">
                            <thead>
                                <th colspan="6" class="text-center bg-warning text-white">Machine</th>
                                <tr>
                                    <th>#</th>
                                    <th>Machine Number</th>
                                    <th>Box</th>
                                    <th>Paddle</th>
                                    <th>Iron</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getpassNumbes as $geat)
                                    <?php
                                    //not retun machin numbers
                                    $mach = DeliveryMachineDetails::join('machin_list_details', 'machin_list_details.machin_list_details_id', '=', 'delivery_machine_details.machin_list_details_id')
                                        ->where('geatpass_details_number', '=', $geat->geatpass_details_number)
                                        ->where('return_delivery_note_date', '=', null)
                                        ->orwhere('return_delivery_note_date', '=', '')
                                        ->get();

                                    $Dpadd = DeliverypaddleDetails::join('paddle_details', 'paddle_details.paddle_details_id', '=', 'deliverypaddle_details.paddle_details_id')
                                        ->where('deliverypaddle_details.geatpass_details_number', '=', $geat->geatpass_details_number)
                                        ->where('deliverypaddle_details.return_delivery_note_date', '=', null)
                                        ->orwhere('deliverypaddle_details.return_delivery_note_date', '=', '')
                                        ->get();

                                    $iron = DeliverypIronDetails::join('iron_details', 'iron_details.iron_details_id', '=', 'deliveryp_iron_details.iron_details_id')
                                        ->where('deliveryp_iron_details.geatpass_details_number', '=', $geat->geatpass_details_number)
                                        ->where('deliveryp_iron_details.return_delivery_note_date', '=', null)
                                        ->orwhere('deliveryp_iron_details.return_delivery_note_date', '=', '')
                                        ->get();

                                        $other =delivery_Othe_Parts::join('othe_parts', 'othe_parts.othe_parts_id', '=', 'delivery__othe__parts.othe_parts_id')
                                        ->where('geatpass_details_number', '=', $geat->geatpass_details_number)
                                        ->where('return_delivery_note_date', '=', null)
                                        ->orwhere('return_delivery_note_date', '=', '')
                                        ->get();
                                    ?>

                                    @foreach ($mach as $key => $ma)
                                        @if (empty($ma->machin_list_details_barcode))
                                        @else
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $ma->machin_list_details_barcode }}</td>
                                                <td>{{ NewReturnGetpass::boxsn($ma->box_details_id) }}

                                                    &nbsp;
                                                    @if (!empty($ma->box_details_id) and empty($ma->box_details_recive_date))
                                                        <button type="button" class="btn icon-btn btn-outline-danger"
                                                            data-toggle="modal" data-target="#MC-boxShowe-modal"
                                                            wire:click="boxshowmachin({{ $ma->delivery_machine_details_id }})"><span
                                                                class="feather icon-corner-up-left"
                                                                style="width:24px;height:24px;"></span></button>
                                                    @endif

                                                </td>
                                                <td>{{ NewReturnGetpass::paddlesn($ma->paddle_details_id) }}
                                                    &nbsp;
                                                    @if (!empty($ma->paddle_details_id) and empty($ma->paddle_details_recive_date))
                                                        <button type="button" class="btn icon-btn btn-outline-danger"
                                                            data-toggle="modal" data-target="#MC-PaddleShowe-modal"
                                                            wire:click="paddleshowmachin({{ $ma->delivery_machine_details_id }})"><span
                                                                class="feather icon-corner-up-left"
                                                                style="width:24px;height:24px;"></span></button>
                                                    @endif
                                                </td>
                                                <td>{{ NewReturnGetpass::ironsn($ma->iron_details_id) }}
                                                    &nbsp;
                                                    @if (!empty($ma->iron_details_id) and empty($ma->iron_details_recive_date))
                                                        <button type="button" class="btn icon-btn btn-outline-danger"
                                                            data-toggle="modal" data-target="#MC-ironShowe-modal"
                                                            wire:click="ironshowmachin({{ $ma->delivery_machine_details_id }})"><span
                                                                class="feather icon-corner-up-left"
                                                                style="width:24px;height:24px;"></span></button>
                                                    @endif
                                                </td>
                                                <td>{{ $geat->geatpass_details_number }}
                                                    &nbsp;
                                                    @if (!empty($geat->geatpass_details_number))
                                                        <button type="button" class="btn icon-btn btn-outline-danger"
                                                            data-toggle="modal" data-target="#MC-retun-modal"
                                                            wire:click="mcretun({{ $ma->delivery_machine_details_id }})"><span
                                                                class="feather icon-corner-up-left"
                                                                style="width:24px;height:24px;"></span></button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endforeach


                            </tbody>
                        </table>


                    </td>
                </tr>

            </tbody>



            <tbody>

                <tr>
                    <td>Paddlle</td>
                    <td>
                        <table class="table table-hover">

                            <thead>
                                <th colspan="6" class="text-center bg-success text-white">Paddlle</th>
                                <tr>
                                    <th>#</th>
                                    <th></th>
                                    <th></th>
                                    <th>Paddle</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($Dpadd ))

                                @foreach ($Dpadd as $itkey => $dp)
                                    <tr>
                                        <td>{{ $itkey + 1 }}</td>
                                        <td></td>
                                        <td></td>
                                        <td>{{ $dp->paddle_details_serial_number }}&nbsp;
                                            @if ($dp->return_delivery_note_date==null)
                                                <button type="button" class="btn icon-btn btn-outline-danger"
                                                    data-toggle="modal" data-target="#PaddleShowe-modal"
                                                    wire:click="paddleshow({{ $dp->deliverypaddle_details_id }})"><span
                                                        class="feather icon-corner-up-left"
                                                        style="width:24px;height:24px;"></span></button>
                                            @endif
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforeach

                                @else

@endif

                            </tbody>
                        </table>


                    </td>
                </tr>

            </tbody>


            <tbody>

                <tr>
                    <td>Iron</td>
                    <td>
                        <table class="table table-hover">

                            <thead>
                                <th colspan="6" class="text-center bg-info text-white">Iron</th>
                                <tr>
                                    <th>#</th>
                                    <th></th>
                                    <th></th>
                                    <th>Iron</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @if (!empty($iron))


                                @foreach ($iron as $irtkey => $iron)
                                    <tr>
                                        <td>{{ $irtkey + 1 }}</td>
                                        <td></td>
                                        <td></td>
                                        <td>{{ $iron->iron_details_serial_number }} &nbsp;
                                            @if ($iron->return_delivery_note_date==null OR $iron->return_delivery_note_date=='')
                                                <button type="button" class="btn icon-btn btn-outline-danger" data-toggle="modal" data-target="#iron-modal-view" wire:click="IronReciveShow({{$iron->deliveryp_iron_details_id}})"><span
                                                        class="feather icon-corner-up-left"
                                                        style="width:24px;height:24px;"></span></button>
                                            @endif
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforeach

                                @else

                                @endif

                            </tbody>
                        </table>


                    </td>
                </tr>

            </tbody>



<!----- other Parts !---------------->


            <tbody>

                <tr>
                    <td>Other Parts</td>
                    <td>
                        <table class="table table-hover">

                            <thead>
                                <th colspan="6" class="text-center bg-info text-white">Iron</th>
                                <tr>
                                    <th>#</th>
                                    <th></th>
                                    <th></th>
                                    <th>Iron</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @if (!empty($other))


                                @foreach ($other as $ortkey => $or)
                                    <tr>
                                        <td>{{ $ortkey + 1 }}</td>
                                        <td></td>
                                        <td>{{ $or->othe_parts_name }}</td>
                                        <td>{{ $or->othe_parts_sn }} &nbsp;
                                            @if ($or->return_delivery_note_date==null OR $or->return_delivery_note_date=='')
                                                <button type="button" class="btn icon-btn btn-outline-danger" data-toggle="modal" data-target="#other-part-modal-view" wire:click="othepartsShow({{$or->delivery_othe_parts_id}})"><span
                                                        class="feather icon-corner-up-left"
                                                        style="width:24px;height:24px;"></span></button>
                                            @endif
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforeach

                                @else

                                @endif

                            </tbody>
                        </table>


                    </td>
                </tr>

            </tbody>






            <tbody>

                <tr>
                    <td></td>
                    <td>
                        <table class="table table-hover">

                            <thead>
                                <th colspan="6" class="text-center "></th>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td><a href="/view-retun-geatpass/{{$retungetpass}}">pass</a></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>


                            </tbody>
                        </table>


                    </td>
                </tr>

            </tbody>



        </table>


        <!--- machin box retun view !--------->
        <div wire:ignore.self class="modal fade" id="MC-boxShowe-modal" tabindex="-1" role="dialog"
            aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Retun Box</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form>
                            @csrf
                            <h1> {{ NewReturnGetpass::boxsn($box_details_id) }} Did you receive this Box?</h1>
                            <input type="hidden" wire:model="box_details_id">
                            <input type="hidden" wire:model="machin_list_details_id">
                            <input type="hidden" wire:model="delivery_machine_details_id">
                            <input type="hidden" wire:model="geatpass_details_number">
                            <input type="hidden" wire:model="geatpass_details_number">
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" id="modal_close"
                                data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" wire:click.prevent="mCBoxconfrom()">yes I
                                confirm it</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!---Machin  paddle box remove !-------->

        <div wire:ignore.self class="modal fade" id="MC-PaddleShowe-modal" tabindex="-1" role="dialog"
            aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Retun Box</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form>
                            @csrf
                            <h1> {{ NewReturnGetpass::paddlesn($paddle_details_id) }} Did you receive this Paddl?</h1>
                            <input type="hidden" wire:model="paddle_details_id">
                            <input type="hidden" wire:model="machin_list_details_id">
                            <input type="hidden" wire:model="delivery_machine_details_id">
                            <input type="hidden" wire:model="geatpass_details_number">
                            <input type="hidden" wire:model="customers_id">
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" id="modal_close"
                                data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" wire:click.prevent="mCpaddleconfrom()">yes
                                I confirm it</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <!---Machin  iron  remove !-------->

        <div wire:ignore.self class="modal fade" id="MC-ironShowe-modal" tabindex="-1" role="dialog"
            aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Retun Iron</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form>
                            @csrf
                            <h1> {{ NewReturnGetpass::ironsn($iron_details_id) }} Did you receive this Iron?</h1>
                            <input type="hidden" wire:model="iron_details_id">
                            <input type="hidden" wire:model="machin_list_details_id">
                            <input type="hidden" wire:model="delivery_machine_details_id">
                            <input type="hidden" wire:model="geatpass_details_number">
                            <input type="hidden" wire:model="customers_id">
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" id="modal_close"
                                data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" wire:click.prevent="mCironeconfrom()">yes
                                I confirm it</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>



        <!---Machin  iron  remove !-------->

        <div wire:ignore.self class="modal fade" id="MC-retun-modal" tabindex="-1" role="dialog"
            aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Return Machine</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form>
                            @csrf
                            <h1> {{ NewReturnGetpass::machin($machin_list_details_id) }} Did you receive this Machine?
                            </h1>
                            <input type="hidden" wire:model="iron_details_id">
                            <input type="hidden" wire:model="paddle_details_id">
                            <input type="hidden" wire:model="box_details_id">
                            <input type="hidden" wire:model="machin_list_details_id">
                            <input type="hidden" wire:model="delivery_machine_details_id">
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" id="modal_close"
                                data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" wire:click.prevent="mcretunconf()">yes I
                                confirm it</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>




         <!---Machin  paddle remove !-------->
         <div wire:ignore.self class="modal fade" id="PaddleShowe-modal" tabindex="-1" role="dialog"
         aria-labelledby="basicModal" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">

                 <!-- Modal Header -->
                 <div class="modal-header">
                     <h4 class="modal-title">Paddle Retun </h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                 </div>

                 <!-- Modal body -->
                 <div class="modal-body">
                     <form>
                         @csrf
                         <h1>  Did you receive this Paddle ?
                         </h1>
                         <input type="hidden" wire:model="paddle_details_id">
                         <input type="hidden" wire:model="deliverypaddle_details_id">
                 </div>

                 <!-- Modal footer -->
                 <div class="modal-footer">
                     <div class="modal-footer">
                         <button type="button" class="btn btn-default" id="modal_close"
                             data-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary" wire:click.prevent="paddlereciveConfrom()">yes I
                             confirm it</button>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>



     <!---Machin  Iron  remove !-------->
     <div wire:ignore.self class="modal fade" id="iron-modal-view" tabindex="-1" role="dialog"
     aria-labelledby="basicModal" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">

             <!-- Modal Header -->
             <div class="modal-header">
                 <h4 class="modal-title">Iron Retun </h4>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
             </div>

             <!-- Modal body -->
             <div class="modal-body">
                 <form>
                     @csrf
                     <h1>  Did you receive this Iron ?  </h1>
                     <input type="hidden" wire:model="iron_details_id">
                     <input type="hidden" wire:model="deliveryp_iron_details_id">
             </div>

             <!-- Modal footer -->
             <div class="modal-footer">
                 <div class="modal-footer">
                     <button type="button" class="btn btn-default" id="modal_close"
                         data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary" wire:click.prevent="IronReciveConfrom()">yes I
                         confirm it</button>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>




<!--------- otherparts remove---------!------->
 <div wire:ignore.self class="modal fade" id="other-part-modal-view" tabindex="-1" role="dialog"
         aria-labelledby="basicModal" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">

                 <!-- Modal Header -->
                 <div class="modal-header">
                     <h4 class="modal-title">Other Parts Retun </h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                 </div>

                 <!-- Modal body -->
                 <div class="modal-body">
                     <form>
                         @csrf
                         <h1>  Did you receive this Parts ?
                         </h1>
                         <input type="hidden" wire:model="othe_parts_id">
                         <input type="hidden" wire:model="delivery_othe_parts_id">
                 </div>

                 <!-- Modal footer -->
                 <div class="modal-footer">
                     <div class="modal-footer">
                         <button type="button" class="btn btn-default" id="modal_close"
                             data-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary" wire:click.prevent="othepartsreciveConfrom()">yes I
                             confirm it</button>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>









    </div>

    <style>
        body {
            background-color: whitesmoke;
        }
    </style>
</div>

@section('script')
    <script>
        window.addEventListener('close-modal', event => {

            $('#MC-boxShowe-modal').modal('hide');
            $('#updateStudentModal').modal('hide');
            $('#deleteStudentModal').modal('hide');
        })
    </script>
@endsection
