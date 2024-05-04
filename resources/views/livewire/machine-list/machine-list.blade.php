<div class="bg-white">

    <?php

    use App\Livewire\MachineList\MachineList;

    ?>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <div class="mt-5 ml-4 mb-2">
        <button type="button" class="btn btn-lg btn-success" data-toggle="modal" data-target="#new_entry">
            <span class="feather icon-plus"></span>&nbsp;&nbsp;Add New Machine</button>
    </div>


    <div class="col-sm-12 mt-2  justify-content-center align-items-center">





        <style>
            #dt-search-0 {
                border-radius: 10px;
                margin-bottom: 5px;
            }

            a:hover {
                text-decoration: none;
            }
        </style>


        <table id="example" class="table table-striped table-bordered mt-2" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Barcode</th>
                    <th>Get Pass</th>
                    <th>Type</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Paddle</th>
                    <th>Iron</th>
                    <th>Box</th>
                    <th>Rental</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mclist as $key => $mclist)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $mclist->machin_list_details_barcode }}</td>
                        <td>{{ $mclist->machin_list_details_status }}</td>
                        <td>{{ $mclist->machin_type_details_name }}</td>
                        <td>{{ $mclist->machin_brand_details_name }}</td>
                        <td>{{ $mclist->machin_model_details_name }}</td>
                        <td>{{ MachineList::paddlesn($mclist->paddle_details_id) }}

                            @if (!empty($mclist->paddle_details_id))
                                <button type="button" class="btn icon-btn btn-sm btn-outline-warning waves-effect"
                                    data-toggle="modal" data-target="#paddlerremove-modal"
                                    wire:click="paddleremove({{ $mclist->machin_list_details_id }})">
                                    <span class="feather icon-trash-2"></span>
                                </button>
                            @else
                                <button type="button" class="btn icon-btn btn-sm btn-outline-success waves-effect"
                                    data-toggle="modal" data-target="#pddleAdd-modal"
                                    wire:click="paddleAdd({{ $mclist->machin_list_details_id }})">
                                    <span class="feather icon-plus"></span>
                                </button>
                            @endif

                        </td>
                        <td>{{ MachineList::ironsn($mclist->iron_details_id) }}
                            @if (!empty($mclist->iron_details_id))
                                <button type="button" class="btn icon-btn btn-sm btn-outline-warning waves-effect"
                                    data-toggle="modal" data-target="#ironremove-modal"
                                    wire:click="ironview({{ $mclist->machin_list_details_id}})">
                                    <span class="feather icon-trash-2"></span>
                                </button>
                            @else
                                <button type="button" class="btn icon-btn btn-sm btn-outline-success waves-effect"
                                    data-toggle="modal" data-target="#iron-add"
                                    wire:click="ironlist({{ $mclist->machin_list_details_id }})">
                                    <span class="feather icon-plus"></span>
                                </button>
                            @endif

                        </td>
                        <td>{{ MachineList::boxsn($mclist->box_details_id) }}


                            @if (!empty($mclist->box_details_id))
                                <button type="button" class="btn icon-btn btn-sm btn-outline-warning waves-effect"
                                    data-toggle="modal" data-target="#boxshow-remove-modal"
                                    wire:click="boxshow({{ $mclist->machin_list_details_id }})">
                                    <span class="feather icon-trash-2"></span>
                                </button>
                            @else
                                <button type="button" class="btn icon-btn btn-sm btn-outline-success waves-effect"
                                    data-toggle="modal" data-target="#boxAdd-modal"
                                    wire:click="boxAdd({{ $mclist->machin_list_details_id }})">
                                    <span class="feather icon-plus"></span>
                                </button>
                            @endif


                        </td>
                        <td>{{ $mclist->machin_list_details_daily_rent }}</td>
                        <td>
                            <button type="button" class="btn icon-btn  btn-outline-success" data-toggle="modal"
                                data-target="#update_daily_reant"
                                wire:click="machinUpdate({{ $mclist->machin_list_details_id }})">
                                <span class="feather icon-edit"></span>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Barcode</th>
                    <th>Type</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Box</th>
                    <th>Paddle</th>
                    <th>Iron</th>
                    <th>Rental</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>



    {{-- -- new Machin----- --}}
    <div wire:ignore.self class="modal fade" id="new_entry" tabindex="-1" role="dialog" aria-labelledby="basicModal"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">New Machine </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form>
                        @csrf
                        @include('livewire.machine-list.machine-list-form')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="modal_close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" wire:click.prevent="save()">Save changes</button>
                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>




    {{-- -- upddate daily rent----- --}}
    <div wire:ignore.self class="modal fade" id="update_daily_reant" tabindex="-1" role="dialog"
        aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Update Machine </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form>
                        @csrf

                        <input type="hidden" readonly wire:model="machin_list_details_id">

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="email">Branche:</label>
                                    <select class="form-control @error('branches')  border-danger  @enderror "
                                        wire:model="branches" required>
                                        @if (!@empty($mclist->branches_id))
                                            <option value="{{ $mclist->branches_id }}">
                                                {{ MachineList::branchname($mclist->branches_id) }} </option>
                                        @endempty


                                        @foreach ($branch as $branch)
                                            <option value="{{ $branch->branches_id }}">
                                                {{ $branch->branches_name }}</option>
                                        @endforeach

                                </select>
                                <div>
                                    @error('branches')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="email">Daily Rent:</label>
                                <input type="text"
                                    class="form-control  @error('machin_list_details_daily_rent')  border-danger  @enderror"
                                    placeholder="Daily Rent" id="email"
                                    wire:model="machin_list_details_daily_rent"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                    required>
                                @error('machin_list_details_daily_rent')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="modal_close"
                    data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" wire:click.prevent="machinupdatteSave()">Save
                    changes</button>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>





{{-- -- pddlerremove-modal------ --}}
<div wire:ignore.self class="modal fade" id="paddlerremove-modal" tabindex="-1" role="dialog"
    aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Paddle Remove </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <h3> Do you need to remove this part ?</h3>

                <form>
                    @csrf

                    <div class="form-group">
                        <input type="hidden" readonly wire:model="paddle_details_id">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="modal_close"
                    data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" wire:click.prevent="paddleupdate()">Yes
                    Remove</button>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>




{{-- -- pddleAdd------ --}}
<div wire:ignore.self class="modal fade" id="pddleAdd-modal" tabindex="-1" role="dialog"
    aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add Paddle </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form>
                    @csrf

                    <input type="hidden" wire:model="machin_list_details_id">
                    <input type="hidden" wire:model="machin_list_details_barcode">
                    <div class="form-group">
                        <label for="email">Paddle:</label>
                        <select class="form-control @error('paddle_details')  border-success  @enderror "
                            wire:model="paddle_details">
                            <option selected>Paddle</option>
                            @foreach ($mpaddle as $Paddle)

                                    <option value="{{ $Paddle->paddle_details_id }}">
                                        {{ $Paddle->paddle_details_serial_number }}</option>

                            @endforeach
                        </select>
                        <div>
                            @error('paddle_details')
                                <span class="text-success">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group">

                        <input type="hidden" readonly wire:model="paddle_details_serial_number">
                        <input type="hidden" readonly wire:model="paddle_details_id">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="modal_close"
                    data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" wire:click.prevent="paddelsave()">Save
                    changes</button>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

<!------- iron !------------>


{{-- -- iron remove------ --}}
<div wire:ignore.self class="modal fade" id="ironremove-modal" tabindex="-1" role="dialog"
    aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Iron Remove </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <h3> Do you need to remove this part ?</h3>

                <form>
                    @csrf

                    <div class="form-group">
                        <input type="hidden" readonly wire:model="iron_details_id">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="modal_close"
                    data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" wire:click.prevent="ironremove()">Yes
                    Remove</button>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>




{{-- -- Iron Add------ --}}
<div wire:ignore.self class="modal fade" id="iron-add" tabindex="-1" role="dialog"
    aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add Iron </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    @csrf
                    <div class="form-group">
                        <label for="email">Iron:</label>
                        <select class="form-control @error('iron_details')  border-success  @enderror "
                            wire:model="iron_details">
                            <option selected>Iron</option>
                            @foreach ($miron as $iron)

                                    <option value="{{ $iron->iron_details_id }}">
                                        {{ $iron->iron_details_serial_number }}</option>

                            @endforeach
                        </select>
                        <div>
                            @error('iron_details')
                                <span class="text-success">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group">

                        <input type="hidden" readonly wire:model="machin_list_details_id">
                        <input type="hidden" readonly wire:model="machin_list_details_barcode">

                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="modal_close"
                    data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" wire:click.prevent="ironsave()">Save
                    changes</button>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>


<!-------- Box -----!---->

{{-- -- Box  remove------ --}}
<div wire:ignore.self class="modal fade" id="boxshow-remove-modal" tabindex="-1" role="dialog"
    aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Box Remove </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <h3> Do you need to remove this part ?</h3>

                <form>
                    @csrf

                    <div class="form-group">
                        <input type="hidden" readonly wire:model="machin_list_details_id">
                        <input type="hidden" readonly wire:model="box_details_id">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="modal_close"
                    data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" wire:click.prevent="boxremove()">Yes
                    Remove</button>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>




{{-- -- Box Add------ --}}
<div wire:ignore.self class="modal fade" id="boxAdd-modal" tabindex="-1" role="dialog"
    aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add Box </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form>
                    @csrf

                    <input type="hidden" wire:model="machin_list_details_id">
                    <input type="hidden" wire:model="machin_list_details_barcode">

                    <div class="form-group">
                        <label for="email">Box:</label>
                        <select class="form-control @error('box_details')  border-danger  @enderror "
                            wire:model="box_details">
                            <option selected>Box</option>
                            @foreach ($mbox as $Box)

                                    <option value="{{ $Box->box_details_id }}">{{ $Box->box_details_serial_number }}
                                    </option>

                            @endforeach
                        </select>
                        <div>
                            @error('box_details')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group">

                        <input type="hidden" readonly wire:model="paddle_details_serial_number">
                        <input type="hidden" readonly wire:model="paddle_details_id">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="modal_close"
                    data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" wire:click.prevent="boxsave()">Save
                    changes</button>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>






<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap4.js"></script>

<script>
    new DataTable('#example', {
        select: true
    });
</script>



<script type="text/javascript">
    $(document).ready(function() {
        $('.machinselec').select2();
        $('.machinselec').on('change', function() {
            let data = $(this).val();
            @this.MachinListDetails = data;
        });
    });
</script>





</div>
