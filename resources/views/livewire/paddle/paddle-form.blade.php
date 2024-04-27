<div>
    <input type="hidden" wire:model="paddle_details_id">
                <fieldset wire:loading.attr="disabled">

                <div class="form-group">
                  <label for="email">Paddle Name:</label>
                  <input type="text" class="form-control  @error('paddle_details_name')  border-danger  @enderror" placeholder="Iron Name"  id="email"  wire:model="paddle_details_name" >
                  <div>
                    @error('paddle_details_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                </div>


                <div class="form-group">
                    <label for="email">Paddle Serial Number:</label>
                    <input type="text" class="form-control  @error('paddle_details_serial_number')  border-danger  @enderror" placeholder="Serial Number"  id="email"  wire:model="paddle_details_serial_number" >
                    <div>
                      @error('paddle_details_serial_number') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                  </div>

                  <input type="hidden"   wire:model="paddle_details_status" >




</div>
