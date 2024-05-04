<div>

    <?php
    use App\Livewire\GatePass\GatePass;
    ?>
    <div class="card mb-4 p-3 m-5">


        <h3 class="card-header">Delivery Note</h3>
        <div class="card-body">

            @foreach ($getpassDetails as $getpassDetails)
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Customer Name</label>
                        <input type="text" class="form-control" value=" {{ $getpassDetails->customers_name }}">
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">customers_address</label>
                        <input type="text" class="form-control" value="{{ $getpassDetails->customers_address }}">
                        <div class="clearfix"></div>
                    </div>
                </div>
        </div>
        @endforeach

        <div class="row">

            <div class="col">
                <div wire:ignore>
                    <form>
                        @csrf
                        <div class="form-group col-md-4">
                            <label class="form-label">Machine</label>


                            <select class="custom-select machinselec" id="jmachinselec" wire:model="machin_list_details_id">
                                <option selected>Select Machine</option>

                                @foreach ($mclist as $mclists)
                                    <option value="{{ $mclists->machin_list_details_id }}">
                                        {{ $mclists->machin_list_details_barcode }}</option>
                                @endforeach
                            </select>

                        </div>
                        <input type="hidden" wire:model="tempGetpassid">
                        <button type="submit" class="btn btn-primary" wire:click.prevent="additems()">Add
                            Machine</button>
                    </form>

                </div>

            </div>

            <div class="col">
                <div class="row mt-5">
                    <div class="col">
                        <div wire:ignore>
                            <form>
                                @csrf
                                <div class="form-group ">
                                    <label class="form-label">Paddle</label>


                                    <select class="custom-select Paddelselect" wire:model="PaDetails">
                                        <option selected>Select Paddle</option>

                                        @foreach ($Pdtails as $Pd)
                                            <option value="{{ $Pd->paddle_details_id }}">
                                                {{ $Pd->paddle_details_serial_number }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <input type="hidden" wire:model="tempGetpassid">
                                <button type="submit" class="btn btn-primary" wire:click.prevent="addPaddle()">Add
                                    Paddle</button>
                            </form>

                        </div>
                    </div>


                    <div class="col">
                        <div wire:ignore>
                            <form>
                                @csrf
                                <div class="form-group ">
                                    <label class="form-label">Iron</label>


                                    <select class="custom-select Ironselect" wire:model="irondetails">
                                        <option selected>Select </option>

                                        @foreach ($irDetails as $irDet)
                                            <option value="{{ $irDet->iron_details_id }}">
                                                {{ $irDet->iron_details_serial_number }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <input type="hidden" wire:model="tempGetpassid">
                                <button type="submit" class="btn btn-primary" wire:click.prevent="addiIron()">Add
                                    Iron</button>
                            </form>

                        </div>
                    </div>


                </div>
            </div>
        </div>








        <div class="card mb-2 p-3 m-5">
            <h6 class="card-header">Machine Details</h6>
            <div class="card-body">

                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Machine Barcode</th>
                            <th>Description</th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($tepmachinlist as $key => $tepMach)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $tepMach->machin_list_details_barcode }}</td>
                                <td>{{ $tepMach->machin_list_details_note }}
                                    </br>

                                    <table class="bg-success">
                                        @if (!empty($tepMach->box_details_id))
                                            <tr>
                                                <td>Box Number :</td>
                                                <td> {{ GatePass::boxsn($tepMach->box_details_id) }}</td>
                                            </tr>
                                        @endif
                                        @if (!empty($tepMach->paddle_details_id))
                                            <tr>
                                                <td>Paddle :</td>
                                                <td> {{ GatePass::paddlesn($tepMach->paddle_details_id) }}</td>
                                            </tr>
                                        @endif
                                        @if (!empty($tepMach->iron_details_id))
                                            <tr>
                                                <td>Iron : </td>
                                                <td>{{ GatePass::ironsn($tepMach->iron_details_id) }}</td>
                                            </tr>
                                        @endif

                                    </table>


                                </td>
                                <td>
                                    <button type="button" class="btn icon-btn btn-sm btn-outline-warning waves-effect"
                                        data-toggle="modal" data-target="#boxshow-remove-modal"
                                        wire:click="removeMachin({{ $tepMach->getpass_temp_items_details_id }})">
                                        <span class="feather icon-trash-2"></span>
                                    </button>
                                </td>

                            </tr>
                        @endforeach



                    </tbody>
                </table>
            </div>


        </div>


        <div class="card mb-4 p-1 m-5">
            <h6 class="card-header">Iron Details</h6>
            <div class="card-body">

                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Iron SN</th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($tempIron as $keys => $TpIron)
                            <tr>
                                <td>{{ $keys + 1 }}</td>
                                <td>{{ $TpIron->iron_details_serial_number }}
                                    </br></td>
                                <td>
                                    <button type="button" class="btn icon-btn btn-sm btn-outline-warning waves-effect"
                                        data-toggle="modal" data-target="#boxshow-remove-modal"
                                        wire:click="removeIron({{ $TpIron->temp_irontables_id }})">
                                        <span class="feather icon-trash-2"></span>
                                    </button>
                                </td>
                            </tr>
                        @endforeach



                    </tbody>
                </table>
            </div>


        </div>




        <div class="card mb-4 p-1 m-5">
            <h6 class="card-header">Paddle Details</h6>
            <div class="card-body">

                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Paddle SN</th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($tempPaddle as $keyd => $tpPaddle)
                            <tr>
                                <td>{{ $keyd + 1 }}</td>
                                <td>{{ $tpPaddle->paddle_details_serial_number }}
                                    </br></td>
                                <td>
                                    <button type="button" class="btn icon-btn btn-sm btn-outline-warning waves-effect"
                                        data-toggle="modal" data-target="#boxshow-remove-modal"
                                        wire:click="removepaddle({{ $tpPaddle->temp_paddeltables_id }})">
                                        <span class="feather icon-trash-2"></span>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


            <div>
                <from>
                    <input type="hidden" wire:model="tempGetpassid">
                <button type="submit" class="btn btn-xl btn-success" wire:click="GenerateDeliveryNote()">Generate Delivery Note</button>
            </from>
            </div>

        </div>


    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.machinselec').select2();
            $('.machinselec').on('change', function() {
                let data = $(this).val();
                @this.MachinListDetails = data;
            });
        });

        //iron select

        $(document).ready(function() {
            $('.Ironselect').select2();
            $('.Ironselect').on('change', function() {
                let data = $(this).val();
                @this.irondetails = data;
            });
        });


        $(document).ready(function() {
            $('.Paddelselect').select2();
            $('.Paddelselect').on('change', function() {
                let data = $(this).val();
                @this.PaDetails = data;
            });
        });
    </script>




</div>
</div>
