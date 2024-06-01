<div>


    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="email">Name:</label>
                <input type="text" class="form-control  @error('name')  border-danger  @enderror  "
                    placeholder="Enter email" wire:model="name" id="email">
                <div>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control  @error('email')  border-danger  @enderror "
                    placeholder="Enter email" id="email" wire:model="email">
                <div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>



    </div>

    <div class="row">

        <div class="col">
            <div class="form-group">
                <label for="email">Password:</label>
                <input type="password" class="form-control  @error('password')  border-danger  @enderror" id="password"
                    wire:model.blur="password">
                <div>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>



        <div class="col">
            <div class="form-group">
                <label for="email">Password:</label>
                <input type="password" class="form-control  @error('password_confirmation')  border-danger  @enderror"
                    id="password-confirm" wire:model="password_confirmation">
                <div>
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>


    </div>
    <hr class="hr mt-1" />
    <div class="mt-1 mb-1 row">
        <h1>System Setting</h1>
    </div>
    <div class="row">



        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                    <input class="form-check-input  @error('system_Setting_view')  border-danger  @enderror"
                        type="checkbox" value="{{ $system_Setting_view }}" wire:model="system_Setting_view"> view
                </label>
                <div>
                    @error('system_Setting_view')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

    </div>


    <hr class="hr mt-2" />
    <div class="mt-1 mb-1 row">
        <h1>User</h1>
    </div>

    <div class="row">

        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                    <input class="form-check-input  @error('user_view')  border-danger  @enderror" type="checkbox"
                        wire:model="user_view">View
                </label>
                <div>
                    @error('user_view')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>


        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                    <input class="form-check-input  @error('new_user_add')  border-danger  @enderror" type="checkbox"
                        wire:model="new_user_add">Create
                </label>
                <div>
                    @error('new_user_add')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>


        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                    <input class="form-check-input  @error('user_edit')  border-danger  @enderror" type="checkbox"
                        wire:model="user_edit">Edit
                </label>
                <div>
                    @error('user_edit')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                    <input class="form-check-input  @error('user_password')  border-danger  @enderror" type="checkbox"
                        wire:model="user_password">Password
                </label>
                <div>
                    @error('user_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>




    <hr class="hr mt-2" />
    <div class="mt-1 mb-1 row">
        <h1> Branches</h1>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                    <input class="form-check-input  @error('branches_view')  border-danger  @enderror" type="checkbox"
                        wire:model="branches_view">View
                </label>
                <div>
                    @error('branches_view')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                    <input class="form-check-input  @error('branches_add')  border-danger  @enderror" type="checkbox"
                        wire:model="branches_add">Create
                </label>
                <div>
                    @error('branches_add')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                    <input class="form-check-input  @error('branches_edit')  border-danger  @enderror" type="checkbox"
                        wire:model="branches_edit">Edit
                </label>
                <div>
                    @error('branches_edit')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col">
        </div>
    </div>


    <!------- customers !---------->


    <hr class="hr mt-2" />
    <div class="mt-1 mb-1 row">
        <h1>Customer</h1>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                    <input class="form-check-input  @error('Customer_view')  border-danger  @enderror" type="checkbox"
                        wire:model="Customer_view">View
                </label>
                <div>
                    @error('Customer_view')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                    <input class="form-check-input  @error('Customer_add')  border-danger  @enderror" type="checkbox"
                        wire:model="Customer_add">Create
                </label>
                <div>
                    @error('Customer_add')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                    <input class="form-check-input  @error('Customer_edit')  border-danger  @enderror" type="checkbox"
                        wire:model="Customer_edit">Edit
                </label>
                <div>
                    @error('Customer_edit')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col">
        </div>
    </div>





    <!------- Suppliers !---------->


    <hr class="hr mt-2" />
    <div class="mt-1 mb-1 row">
        <h1>Suppliers</h1>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                    <input class="form-check-input  @error('supplier_view')  border-danger  @enderror" type="checkbox"
                        wire:model="supplier_view">View
                </label>
                <div>
                    @error('supplier_view')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                    <input class="form-check-input  @error('supplier_add')  border-danger  @enderror" type="checkbox"
                        wire:model="supplier_add">Create
                </label>
                <div>
                    @error('supplier_add')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                    <input class="form-check-input  @error('supplier_edit')  border-danger  @enderror" type="checkbox"
                        wire:model="supplier_edit">Edit
                </label>
                <div>
                    @error('supplier_edit')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col">
        </div>
    </div>





    <!------- Machin details!---------->


    <hr class="hr mt-2" />
    <div class="mt-1 mb-1 row">
        <h1>Machine List</h1>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                    <input class="form-check-input  @error('machine_view')  border-danger  @enderror" type="checkbox"
                        wire:model="machine_view">View
                </label>
                <div>
                    @error('machine_view')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                    <input class="form-check-input  @error('machine_add')  border-danger  @enderror" type="checkbox"
                        wire:model="machine_add">Create
                </label>
                <div>
                    @error('machine_add')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                    <input class="form-check-input  @error('machine_edit')  border-danger  @enderror" type="checkbox"
                        wire:model="machine_edit">Edit
                </label>
                <div>
                    @error('machine _edit')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col">
        </div>
    </div>




    <!------- Machin Model !---------->


    <hr class="hr mt-2" />
    <div class="mt-1 mb-1 row">
        <h1>Machine Model</h1>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                    <input class="form-check-input  @error('machineModel_view')  border-danger  @enderror" type="checkbox"
                        wire:model="machineModel_view">View
                </label>
                <div>
                    @error('machineModel_view')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                    <input class="form-check-input  @error('machineModel_add')  border-danger  @enderror" type="checkbox"
                        wire:model="machineModel_add">Create
                </label>
                <div>
                    @error('machineModel_add')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                    <input class="form-check-input  @error('machineModel_edit')  border-danger  @enderror" type="checkbox"
                        wire:model="machineModel_edit">Edit
                </label>
                <div>
                    @error('machineModel_edit')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col">
        </div>
    </div>


    <!------- Machin Brand !---------->


    <hr class="hr mt-2" />
    <div class="mt-1 mb-1 row">
        <h1>Machine Brand</h1>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                    <input class="form-check-input  @error('machineBrand_view')  border-danger  @enderror" type="checkbox"
                        wire:model="machineBrand_view">View
                </label>
                <div>
                    @error('machineBrand_view')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                    <input class="form-check-input  @error('machineBrand_add')  border-danger  @enderror" type="checkbox"
                        wire:model="machineBrand_add">Create
                </label>
                <div>
                    @error('machineBrand_add')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                    <input class="form-check-input  @error('machineBrand_edit')  border-danger  @enderror" type="checkbox"
                        wire:model="machineBrand_edit">Edit
                </label>
                <div>
                    @error('machineBrand_edit')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col">
        </div>
    </div>




    <!------- Machin type !---------->


    <hr class="hr mt-2" />
    <div class="mt-1 mb-1 row">
        <h1>Machine Type</h1>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                    <input class="form-check-input  @error('machineType_view')  border-danger  @enderror" type="checkbox"
                        wire:model="machineType_view">View
                </label>
                <div>
                    @error('machineType_view')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                    <input class="form-check-input  @error('machineType_add')  border-danger  @enderror" type="checkbox"
                        wire:model="machineType_add">Create
                </label>
                <div>
                    @error('machineType_add')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                    <input class="form-check-input  @error('machineType_edit')  border-danger  @enderror" type="checkbox"
                        wire:model="machineType_edit">Edit
                </label>
                <div>
                    @error('machineType_edit')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col">
        </div>
    </div>




    <!------- Iron !---------->
    <hr class="hr mt-2" />
    <div class="mt-1 mb-1 row">
        <h1>Iron</h1>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                    <input class="form-check-input  @error('Iron_view')  border-danger  @enderror" type="checkbox"
                        wire:model="Iron_view">View
                </label>
                <div>
                    @error('Iron_view')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                    <input class="form-check-input  @error('Iron_add')  border-danger  @enderror" type="checkbox"
                        wire:model="Iron_add">Create
                </label>
                <div>
                    @error('Iron_add')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                    <input class="form-check-input  @error('Iron_edit')  border-danger  @enderror" type="checkbox"
                        wire:model="Iron_edit">Edit
                </label>
                <div>
                    @error('Iron_edit')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col">
        </div>
    </div>


    <!------- Paddle !---------->
    <hr class="hr mt-2" />
    <div class="mt-1 mb-1 row">
        <h1>Paddle</h1>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                    <input class="form-check-input  @error('paddle_view')  border-danger  @enderror" type="checkbox"
                        wire:model="paddle_view">View
                </label>
                <div>
                    @error('paddle_view')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                    <input class="form-check-input  @error('paddle_add')  border-danger  @enderror" type="checkbox"
                        wire:model="paddle_add">Create
                </label>
                <div>
                    @error('paddle_add')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                    <input class="form-check-input  @error('paddle_edit')  border-danger  @enderror" type="checkbox"
                        wire:model="paddle_edit">Edit
                </label>
                <div>
                    @error('paddle_edit')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col">
        </div>
    </div>




    <!------- BoX !---------->
    <hr class="hr mt-2" />
    <div class="mt-1 mb-1 row">
        <h1>Box</h1>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                    <input class="form-check-input  @error('box_view')  border-danger  @enderror" type="checkbox"
                        wire:model="box_view">View
                </label>
                <div>
                    @error('box_view')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                    <input class="form-check-input  @error('box_add')  border-danger  @enderror" type="checkbox"
                        wire:model="box_add">Create
                </label>
                <div>
                    @error('box_add')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                    <input class="form-check-input  @error('box_edit')  border-danger  @enderror" type="checkbox"
                        wire:model="box_edit">Edit
                </label>
                <div>
                    @error('box_edit')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col">
        </div>
    </div>





    <!------- BoX !---------->
    <hr class="hr mt-2" />
    <div class="mt-1 mb-1 row">
        <h1>Delivery Note</h1>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                    <input class="form-check-input  @error('delivery_note_view')  border-danger  @enderror" type="checkbox"
                        wire:model="delivery_note_view">View
                </label>
                <div>
                    @error('delivery_note_view')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                    <input class="form-check-input  @error('delivery_note_add')  border-danger  @enderror" type="checkbox"
                        wire:model="delivery_note_add">Create
                </label>
                <div>
                    @error('delivery_note_add')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                    <input class="form-check-input  @error('delivery_note_edit')  border-danger  @enderror" type="checkbox"
                        wire:model="delivery_note_edit">Edit
                </label>
                <div>
                    @error('delivery_note_edit')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col">
        </div>
    </div>




    <!------- reten Delivery Note !---------->
    <hr class="hr mt-2" />
    <div class="mt-1 mb-1 row">
        <h1>Return Delivery Note</h1>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                    <input class="form-check-input  @error('ret_delivery_note_view')  border-danger  @enderror" type="checkbox"
                        wire:model="ret_delivery_note_view">View
                </label>
                <div>
                    @error('ret_delivery_note_view')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                    <input class="form-check-input  @error('ret_delivery_note_add')  border-danger  @enderror" type="checkbox"
                        wire:model="ret_delivery_note_add">Create
                </label>
                <div>
                    @error('ret_delivery_note_add')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col">
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label">
                    <input class="form-check-input  @error('ret_delivery_note_edit')  border-danger  @enderror" type="checkbox"
                        wire:model="ret_delivery_note_edit">Edit
                </label>
                <div>
                    @error('ret_delivery_note_edit')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col">
        </div>
    </div>














    <input type="hidden" wire:model="user_password">




</div>
