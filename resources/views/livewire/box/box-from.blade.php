<div>
    <input type="hidden" wire:model="box_details_id">
                <fieldset wire:loading.attr="disabled">

                <div class="form-group">
                  <label for="email">BOX Name:</label>
                  <input type="text" class="form-control  @error('box_details_name')  border-danger  @enderror" placeholder="BOX Name"  id="email"  wire:model="box_details_name" >
                  <div>
                    @error('box_details_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                </div>


                <div class="form-group">
                    <label for="email">BOX Serial Number:</label>
                    <input type="text" class="form-control  @error('box_details_serial_number')  border-danger  @enderror" placeholder="Serial Number"  id="email"  wire:model="box_details_serial_number" >
                    <div>
                      @error('box_details_serial_number') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                  </div>
                    <input  type="hidden"  wire:model="box_details_status"  value="0">

</div>
