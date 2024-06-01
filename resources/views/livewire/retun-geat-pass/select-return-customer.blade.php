<div class="mt-5 col-sm-8 ml-5 bg-white " style="padding: 20px">


    <?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
if(session()->get('ret_delivery_note_view')==0){ return redirect()->to('/no-access'); }
?>

    <from >
        @csrf
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="email">Select Customer:</label>
                <select  class="form-control @error('customers_details')  border-danger  @enderror"  required  wire:model="customers_id">
                  <option selected>Select Customer:</option>
                  @foreach ($custamers as $custamers)
                      <option value="{{$custamers->customers_id}}">{{$custamers->customers_name}}</option>
                 @endforeach

                </select>
                <div>
                  @error('customers_id') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
              </div>
        </div>

        <div class="col">
          <div class="form-group">
              <label for="email">Driver Name:</label>
              <input type="text" class="form-control  @error('geatpass_temp_details_driver_name')  border-danger  @enderror" placeholder="Driver Name"  id="email"  wire:model="geatpass_temp_details_driver_name"   required>
                @error('geatpass_temp_details_driver_name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            </div>
    </div>



    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="email">Driver NIC:</label>
                <input type="text" class="form-control  @error('geatpass_temp_details_driver_nic')  border-danger  @enderror" placeholder="Driver NIC"  id="email"  wire:model="geatpass_temp_details_driver_nic"  required>
                  @error('geatpass_temp_details_driver_nic') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
              </div>

        <div class="col">
          <div class="form-group">
              <label for="email">Driver Mobile:</label>
              <input type="text" class="form-control  @error('geatpass_temp_details_driver_mobile')  border-danger  @enderror" placeholder="Driver Mobile"  id="email"  wire:model="geatpass_temp_details_driver_mobile"  required>
                @error('geatpass_temp_details_driver_mobile') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="email">Vehicle Number:</label>
                <input type="text" class="form-control  @error('geatpass_temp_details_vehicle')  border-danger  @enderror" placeholder="Driver NIC"  id="email"  wire:model="geatpass_temp_details_vehicle"  required>
                  @error('geatpass_temp_details_vehicle') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
              </div>

        <div class="col">
            <div class="form-group">
                <label for="email">Getpass Number:</label>
                <input type="text" class="form-control  @error('gatepass_number')  border-danger  @enderror" placeholder="Gate pass Number"  id="email"  wire:model="gatepass_number"  required>
                  @error('gatepass_number') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
        </div>
    </div>
    <button type="button" class="btn btn-lg btn-danger" wire:click.prevent="tempsave()">
        <span class="feather icon-skip-forward"></span>&nbsp;&nbsp;Next</button>
    </from>


    <script type="text/javascript">
        $(document).ready(function() {
            $('.selectcustomer').select2();
            $('.selectcustomer').on('change', function(){
                let data =$(this).val();
                    @this.customers_details=data;
            });
        });
        </script>



</div>
