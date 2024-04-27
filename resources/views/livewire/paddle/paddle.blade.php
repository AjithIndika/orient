<div class="" >



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>


    <div class="mt-5 ml-4 mb-1">
      <button type="button" class="btn btn-lg btn-success" data-toggle="modal" data-target="#new_entry">
    <span class="feather icon-plus"></span>&nbsp;&nbsp;Add New Paddle </button>
  </div>



      <div class=" bg-white col-sm-11  d-flex align-items-center justify-content-center" >




          <table class="table table-bordered m-1">
            <thead>
              <tr>
              <th>#</th>
                <th>Iron Name</th>
                <th>Serial Number</th>
                <th>Attached Machine Number</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

              @foreach ( $data as $key=>$dataAll)


              <tr>
              <td>{{$key+1}}</td>
                <td>{{$dataAll->paddle_details_name}}</td>
                <td>{{$dataAll->paddle_details_serial_number}}</td>
                <td>{{$dataAll->paddle_details_status}}</td>

                <td>
                  <button type="button" class="btn icon-btn  btn-outline-success" data-toggle="modal"  data-target="#showeditbranches" wire:click="Edit({{$dataAll->paddle_details_id}})">
                      <span class="feather icon-edit"></span>
                      </button>

                </td>
              </tr>
              @endforeach
            </tbody>
          </table>


                  {{ $data->links() }}


        </div>




      {{---- new Suppliers--------}}
    <div wire:ignore.self class="modal fade" id="new_entry" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Add new  Paddle  </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

              <form  >
                @csrf
                @include('livewire.paddle.paddle-form')
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







    {{---- edit Supplierss--------}}

    <div class="modal fade" wire:ignore.self id="showeditbranches" tabindex="-1" role="dialog" aria-labelledby="editBranch" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Edit Paddle</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form  >
                @csrf
                @include('livewire.paddle.paddle-form')
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
