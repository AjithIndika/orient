<form  >
    <fieldset wire:loading.attr="disabled">
        @csrf
    <div class="form-group">
      <label for="email">Branch Name:</label>
      <input type="text" class="form-control  @error('branches_name')  border-danger  @enderror" placeholder="Branch Name" id="email"  wire:model.live="branches_name" >
      <div>
        @error('branches_name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    </div>

    <div class="form-group">
        <label for="email">Branch Address:</label>
        <input type="text" class="form-control @error('branches_address')  border-danger  @enderror" placeholder="Branch Name" id="email" wire:model.live="branches_address">
        <div>
            @error('branches_address') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>


      <div class="form-group">
        <label for="email">Branch Telephone:</label>
        <input type="text" class="form-control @error('branches_telephone')  border-danger  @enderror" placeholder="Branch Name" id="email" wire:model.live="branches_telephone">
        <div>
            @error('branches_telephone') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
     </div>


      <div class="form-group">
        <label for="email">Branch email:</label>
        <input type="text" class="form-control @error('branches_email')  border-danger  @enderror" placeholder="Branch Name" id="email" wire:model.live="branches_email">

        <div>
            @error('branches_email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
      </div>


    <button type="submit" class="btn btn-primary" wire:click.prevent="save()" >Save</button>
  </form>
