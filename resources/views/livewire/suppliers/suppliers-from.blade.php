<div>
    <input type="hidden" wire:model="suppliers_id">
                <fieldset wire:loading.attr="disabled">
                    @csrf
                <div class="form-group">
                  <label for="email">Suppliers Name:</label>
                  <input type="text" class="form-control  @error('suppliers_name')  border-danger  @enderror" placeholder="Suppliers Name"  id="email"  wire:model="suppliers_name" >
                  <div>
                    @error('suppliers_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                </div>

                <div class="form-group">
                    <label for="email">Suppliers Address:</label>
                    <input type="text" class="form-control @error('suppliers_address')  border-danger  @enderror" placeholder="Suppliers Address" id="email" wire:model="suppliers_address">
                    <div>
                        @error('suppliers_address') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                  <div class="form-group">
                    <label for="email">Suppliers Relation Officer Name:</label>
                    <input type="text" class="form-control @error('suppliers_relation_officer_name')  border-danger  @enderror" placeholder="Suppliers Relation Officer Name" id="email" wire:model="suppliers_relation_officer_name">
                    <div>
                        @error('suppliers_relation_officer_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                 </div>

                  <div class="form-group">
                    <label for="email">Suppliers Telephone:</label>
                    <input type="text" class="form-control @error('suppliers_telephone')  border-danger  @enderror" placeholder="Suppliers Telephone" id="email" wire:model="suppliers_telephone">

                    <div>
                        @error('suppliers_telephone') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="email">Suppliers Email:</label>
                    <input type="text" class="form-control @error('suppliers_email')  border-danger  @enderror" placeholder="Suppliers Email" id="email" wire:model="suppliers_email">

                    <div>
                        @error('suppliers_email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                  </div>

</div>
