
<div class="mt-5">
    <?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
    ?>

@if(session()->get('user_view')==0)

<?php return redirect()->to('/no-access');?>

@endif


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>


    @if(session()->get('new_user_add')==1)
    <div class="mt-5 ml-4 mb-1">
        <button type="button" class="btn btn-lg btn-success" data-toggle="modal" data-target="#new_entry">
            <span class="feather icon-plus"></span>&nbsp;&nbsp;New User </button>
    </div>
@endif


    <div class=" bg-white col-sm-11  d-flex align-items-center justify-content-center">




        <table class="table table-bordered m-1 mt-4">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User Name</th>
                    <th>Password</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>



                @foreach ($usersAll as $key => $allUsers)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $allUsers->name }}</td>
                        <td>{{ $allUsers->permittions }}</br></td>
                        <td>

                            @if(session()->get('user_password')==1)
                            <button type="button" class="btn icon-btn  btn-outline-success" data-toggle="modal"
                                data-target="#password" wire:click="password({{ $allUsers->id }})">
                                <i class="feather icon-more-horizontal"></i>
                            </button>
                             @endif
                        </td>



                        <td>
                            @if(session()->get('user_edit')==1)
                            <button type="button" class="btn icon-btn  btn-outline-success" data-toggle="modal"
                                data-target="#editUser" wire:click="Edit({{ $allUsers->id }})">
                                <span class="feather icon-edit"></span>
                            </button>
                            @endif

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>





    </div>




    {{-- -- new Suppliers------ --}}
    <div wire:ignore.self class="modal fade" id="new_entry" tabindex="-1" role="dialog" aria-labelledby="basicModal"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Add new User </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form>
                        @csrf
                        @include('livewire.users.user-from')
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

    <div class="modal fade" wire:ignore.self id="editUser" tabindex="-1" role="dialog"
        aria-labelledby="editBranch" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Edit Paddle</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        @csrf
                        @include('livewire.users.user-from')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" wire:click.prevent="update()">Save changes</button>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" wire:ignore.self id="password" tabindex="-1" role="dialog"
        aria-labelledby="editBranch" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Edit Paddle</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        @csrf

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
