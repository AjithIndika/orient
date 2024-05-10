<div class="">
    <div class="mt-5 ml-4 mb-1">
        <button type="button" class="btn btn-lg btn-success" data-toggle="modal" data-target="#new_entry">
            <span class="feather icon-plus"></span>&nbsp;&nbsp;Add New Parts Name Or Type </button>
    </div>


    <div class=" bg-white col-sm-11  d-flex align-items-center justify-content-center">
        <table class="table table-bordered m-1">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Other Parts Name Or Type</th>
                    <th>Other Parts Name </th>
                    <th>SN </th>
                    <th>Daily Rate</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($parts as $key => $othParts)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $othParts->othe_parts_types_name }}</td>
                        <td>{{ $othParts->othe_parts_name }}</td>
                        <td>{{ $othParts->othe_parts_sn }}</td>
                        <td>{{ $othParts->othe_parts_daily_rate }}</td>
                        <td>{{ $othParts->othe_parts_status }}</td>
                        <td>
                            <button type="button" class="btn icon-btn  btn-outline-success" data-toggle="modal"
                                data-target="#showe" wire:click="Edit({{ $othParts->othe_parts_id }})">
                                <span class="feather icon-edit"></span>
                            </button>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="6" class="text-success"> {{ $parts->links() }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-sm-10"> </div>



    {{-- -- new Suppliers------ --}}
    <div wire:ignore.self class="modal fade" id="new_entry" tabindex="-1" role="dialog" aria-labelledby="basicModal"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Add new Prts  </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        @include('livewire.othere-parts.other-parts-all-from')

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







    {{-- -- edit Supplierss------ --}}

    <div class="modal fade" wire:ignore.self id="showe" tabindex="-1" role="dialog" aria-labelledby="editBranch"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Edit Parts</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>

                        @include('livewire.othere-parts.other-parts-all-from')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" wire:click.prevent="update()">Save changes</button>

                    </form>
                </div>
            </div>
        </div>
    </div>



</div>
