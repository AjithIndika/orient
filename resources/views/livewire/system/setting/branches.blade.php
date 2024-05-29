<div>

    <?php
     use Illuminate\Support\Facades\Session;
?>


@if(session()->get('branches_view')==0)

<?php return redirect()->to('/no-access');?>

@endif


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <div class="mt-5 ml-4">

        @if(session()->get('branches_add')==1)
                  <button type="button" class="btn btn-lg btn-success" data-toggle="modal" data-target="#new_entry">
                <span class="feather icon-plus"></span>&nbsp;&nbsp;New Branche</button>

                @endif
            </div>
    <div class="row">

        <div class="col-sm-11  d-flex align-items-center justify-content-center">


            <div class="card mt-5 col-sm-11">
                <div class="card-header">Branches</div>
                <table class="table card-table mb-5">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Branches</th>
                            <th>Address</th>
                            <th>Telephone</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>



                        @foreach ($branch as $key=>$branch )
                        <tr>
                            <th scope="row">{{1+$key}}</th>
                            <td>{{$branch->branches_name }}</td>
                            <th>{{$branch->branches_address }}</th>
                            <th>{{$branch->branches_telephone }}</th>
                            <th>{{$branch->branches_name }}</th>
                            <td>

                                @if(session()->get('branches_edit')==1)
                                <button type="button" class="btn icon-btn  btn-outline-success" data-toggle="modal"  data-target="#showeditbranches" wire:click="branchEdit({{$branch->branches_id }})">
                                <span class="feather icon-edit"></span>
                                </button>
                                @endif

                         </td>
                         </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>


        </div>
    </div>





    {{---- new branches--------}}
  <div wire:ignore.self class="modal fade" id="new_entry" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Add new branch  </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           @include('livewire.components.from-components.branch-from')
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>







  {{---- edit branches--------}}

  <div class="modal fade" wire:ignore.self id="showeditbranches" tabindex="-1" role="dialog" aria-labelledby="editBranch" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Edit Branch</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form  >
                <input type="hidden" wire:model="branches_id">
                <fieldset wire:loading.attr="disabled">
                    @csrf
                <div class="form-group">
                  <label for="email">Branch Name:</label>
                  <input type="text" class="form-control  @error('branches_name')  border-danger  @enderror"  id="email"  wire:model="branches_name" >
                  <div>
                    @error('branches_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                </div>

                <div class="form-group">
                    <label for="email">Branch Address:</label>
                    <input type="text" class="form-control @error('branches_address')  border-danger  @enderror" placeholder="Branch Name" id="email" wire:model="branches_address">
                    <div>
                        @error('branches_address') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                  <div class="form-group">
                    <label for="email">Branch Telephone:</label>
                    <input type="text" class="form-control @error('branches_telephone')  border-danger  @enderror" placeholder="Branch Name" id="email" wire:model="branches_telephone">
                    <div>
                        @error('branches_telephone') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                 </div>

                  <div class="form-group">
                    <label for="email">Branch email:</label>
                    <input type="text" class="form-control @error('branches_email')  border-danger  @enderror" placeholder="Branch Name" id="email" wire:model="branches_email">

                    <div>
                        @error('branches_email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                  </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" wire:click.prevent="updateBranch()">Save changes</button>

        </form>
        </div>
      </div>
    </div>
  </div>



    <style>
        .modal{
            border-color: green;
        }
    </style>


</div>
