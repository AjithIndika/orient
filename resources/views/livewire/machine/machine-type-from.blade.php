<div>
    <input type="hidden" wire:model.live="machin_type_details_id">
                <fieldset wire:loading.attr="disabled">

                <div class="form-group">
                  <label for="email">Machin Type Name:</label>
                  <input type="text" class="form-control  @error('machin_type_details_name')  border-danger  @enderror" placeholder="Machin Type Name"  id="email"  wire:model.live="machin_type_details_name" >
                  <div>
                    @error('machin_type_details_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                </div>


                <div class="form-group">
                    <label for="email">Machin Type Description:</label>
                    <input type="text" class="form-control  @error('machin_type_details_description')  border-danger  @enderror" placeholder="Machin Type Description"  id="email"  wire:model.live="machin_type_details_description" >
                    <div>
                      @error('machin_type_details_description') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                  </div>




</div>
