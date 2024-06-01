<div class="" >
    <?php
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Session;

    if(session()->get('Customer_view')==0){ return redirect()->to('/no-access'); }
        ?>



  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>


  <div class="mt-5 ml-4 mb-1">
    @if(session()->get('Customer_add')==1)

    <button type="button" class="btn btn-lg btn-success" data-toggle="modal" data-target="#new_entry">
  <span class="feather icon-plus"></span>&nbsp;&nbsp;New Customers</button>
  @endif
</div>



    <div class=" bg-white col-sm-11  d-flex align-items-center justify-content-center" >




        <table class="table table-bordered m-1" style="overflow-x:auto;">
          <thead>
            <tr>
            <th>#</th>
              <th>Name</th>
              <th>Address</th>
              <th>Contact officer</th>
              <th>Telephone</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($customer as $key=>$customers)


            <tr>
            <td>{{$key+1}}</td>
              <td>{{$customers->customers_name}}</td>
              <td>{{$customers->customers_address}}</td>
              <td>{{$customers->Customers_relation_officer_name}}</td>
              <td>{{$customers->customers_telephone}}</td>
              <td>{{$customers->customers_email}}</td>
              <td>
                @if(session()->get('Customer_edit')==1)
                <button type="button" class="btn icon-btn  btn-outline-success" data-toggle="modal"  data-target="#showeditbranches" wire:click="cusEdit({{$customers->customers_id}})">
                    <span class="feather icon-edit"></span>
                    </button>
                    @endif

              </td>
            </tr>
            @endforeach

            <tr> <td colspan="7"> {{ $customer->links() }}</td></tr>
          </tbody>
        </table>





      </div>




    {{---- new branches--------}}
  <div wire:ignore.self class="modal fade" id="new_entry" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Add Customers </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <form  >
                @include('livewire.customers.customers-from')
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" wire:click.prevent="save()">Save changes</button>
            </form>
        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>







  {{---- edit branches--------}}

  <div class="modal fade" wire:ignore.self id="showeditbranches" tabindex="-1" role="dialog" aria-labelledby="editBranch" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Edit Customers</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form  >
                @include('livewire.customers.customers-from')
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" wire:click.prevent="updateCustomers()">Save changes</button>

        </form>
        </div>
      </div>
    </div>
  </div>



</div>
