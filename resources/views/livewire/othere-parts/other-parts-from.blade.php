<div>
    @csrf
    <div class="form-group">
        <label for="email">Other Parts Type:</label>
        <input type="text" class="form-control  @error('othe_parts_types_name')  border-danger  @enderror" placeholder="Other Parts Type"  id="email"  wire:model="othe_parts_types_name" >
        <div>
          @error('othe_parts_types_name') <span class="text-danger">{{ $message }}</span> @enderror
      </div>
      </div>

      <input type="hidden" wire:model="othe_parts_types_id">

</div>
