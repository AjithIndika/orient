<div>
    <input type="hidden" wire:model="machin_model_details_id">
                <fieldset wire:loading.attr="disabled">

                <div class="form-group">
                  <label for="email">Machin Model Name:</label>
                  <input type="text" class="form-control  @error('machin_model_details_name')  border-danger  @enderror" placeholder="Machin Model Name"  id="email"  wire:model="machin_model_details_name" >
                  <div>
                    @error('machin_model_details_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                </div>




</div>
