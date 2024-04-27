<div>
    <input type="hidden" wire:model="customers_id">
                <fieldset wire:loading.attr="disabled">
                    @csrf
                <div class="form-group">
                  <label for="email">Customers Name:</label>
                  <input type="text" class="form-control  @error('customers_name')  border-danger  @enderror" placeholder="Customers Name"  id="email"  wire:model="customers_name" >
                  <div>
                    @error('customers_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                </div>

                <div class="form-group">
                    <label for="email">Customers Address:</label>
                    <input type="text" class="form-control @error('customers_address')  border-danger  @enderror" placeholder="Customers Address" id="email" wire:model="customers_address">
                    <div>
                        @error('customers_address') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                  <div class="form-group">
                    <label for="email">Customers Relation Officer Name:</label>
                    <input type="text" class="form-control @error('Customers_relation_officer_name')  border-danger  @enderror" placeholder="Customers Relation Officer Name" id="email" wire:model="Customers_relation_officer_name">
                    <div>
                        @error('Customers_relation_officer_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                 </div>

                  <div class="form-group">
                    <label for="email">Customers Telephone:</label>
                    <input type="text" class="form-control @error('customers_telephone')  border-danger  @enderror" placeholder="Customers Telephone" id="email" wire:model="customers_telephone">

                    <div>
                        @error('customers_telephone') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="email">Customers Email:</label>
                    <input type="text" class="form-control @error('customers_email')  border-danger  @enderror" placeholder="Customers Email" id="email" wire:model="customers_email">

                    <div>
                        @error('customers_email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                  </div>

                  

</div>
