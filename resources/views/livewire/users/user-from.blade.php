<div>


        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="email">Name:</label>
                    <input type="text" class="form-control  @error('name')  border-danger  @enderror  " placeholder="Enter email" wire:model="name" id="email">
                    <div>
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control  @error('email')  border-danger  @enderror " placeholder="Enter email" id="email" wire:model="email">
                    <div>
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>



        </div>

        <div class="row">

            <div class="col">
                <div class="form-group">
                    <label for="email">Password:</label>
                    <input type="password" class="form-control  @error('password')  border-danger  @enderror"   id="password" wire:model.blur="password">
                    <div>
                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>



            <div class="col">
                <div class="form-group">
                    <label for="email">Password:</label>
                    <input type="password" class="form-control  @error('password_confirmation')  border-danger  @enderror"  id="password-confirm"  wire:model="password_confirmation">
                    <div>
                        @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>


        </div>
        <hr class="hr mt-1" />
        <div class="mt-1 mb-1 row"><h1>System Setting</h1></div>
    <div class="row">



        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                  <input class="form-check-input  @error('system_Setting_view')  border-danger  @enderror" type="checkbox"  value="{{ $system_Setting_view }}" wire:model="system_Setting_view"> view
                </label>
                <div>
                    @error('system_Setting_view') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>
        </div>

    </div>


    <hr class="hr mt-2" />
    <div class="mt-1 mb-1 row"><h1>User</h1></div>

    <div class="row">

        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                  <input class="form-check-input  @error('user_view')  border-danger  @enderror" type="checkbox" wire:model="user_view">View
                </label>
                <div>
                    @error('user_view') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>
        </div>


        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                  <input class="form-check-input  @error('new_user_add')  border-danger  @enderror" type="checkbox" wire:model="new_user_add">Create
                </label>
                <div>
                    @error('new_user_add') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>
        </div>


        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                  <input class="form-check-input  @error('user_edit')  border-danger  @enderror" type="checkbox" wire:model="user_edit">Edit
                </label>
                <div>
                    @error('user_edit') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>
        </div>

        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                  <input class="form-check-input  @error('user_password')  border-danger  @enderror" type="checkbox" wire:model="user_password">Password
                </label>
                <div>
                    @error('user_password') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>
        </div>




    </div>




    <hr class="hr mt-2" />
    <div class="mt-1 mb-1 row"><h1>	Branches</h1></div>

    <div class="row">

        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                  <input class="form-check-input  @error('branches_view')  border-danger  @enderror" type="checkbox" wire:model="branches_view">View
                </label>
                <div>
                    @error('branches_view') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>
        </div>


        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                  <input class="form-check-input  @error('branches_add')  border-danger  @enderror" type="checkbox" wire:model="branches_add">Create
                </label>
                <div>
                    @error('branches_add') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>
        </div>


        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                  <input class="form-check-input  @error('branches_edit')  border-danger  @enderror" type="checkbox" wire:model="branches_edit">Edit
                </label>
                <div>
                    @error('branches_edit') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>
        </div>

        <div class="col">

        </div>




    </div>



<input type="hidden" wire:model="user_password">




</div>
