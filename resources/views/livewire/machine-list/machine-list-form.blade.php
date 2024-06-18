<div>



    <input type="hidden" wire:model.live="machin_list_details">
    <input type="hidden" wire:model.live="machin_list_details_barcode">


                <fieldset wire:loading.attr="disabled">


                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="email">Machine Type:</label>
                                <select  class="form-control @error('machin_type_details')  border-danger  @enderror "  wire:model.live="machin_type_details" required>
                                  <option selected>Machine Type</option>
                                  @foreach ($mtype as $MachineType)
                                  <option value="{{$MachineType->machin_type_details_id}}">{{$MachineType->machin_type_details_name}}</option>
                                  @endforeach
                                </select>
                                <div>
                                  @error('machin_type_details') <span class="text-danger">{{ $message }}</span> @enderror
                              </div>
                              </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="email">Machin Brand:</label>
                                <select  class="form-control @error('machin_brand_details')  border-danger  @enderror "  wire:model.live="machin_brand_details" required>
                                  <option selected>Machin Brand</option>
                                  @foreach ($mbrand as $MachinBrand)
                                  <option value="{{$MachinBrand->machin_brand_details_id}}">{{$MachinBrand->machin_brand_details_name}}</option>
                                  @endforeach
                                </select>
                                <div>
                                  @error('machin_brand_details') <span class="text-danger">{{ $message }}</span> @enderror
                              </div>
                              </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="email">Machin Model:</label>
                                <select  class="form-control @error('machin_model_details')  border-danger  @enderror "  wire:model.live="machin_model_details" required>
                                  <option selected>Machin Model</option>
                                  @foreach ($mmodel as $MachinModel)
                                  <option value="{{$MachinModel->machin_model_details_id}}">{{$MachinModel->machin_model_details_name}}</option>
                                  @endforeach
                                </select>
                                <div>
                                  @error('machin_model_details') <span class="text-danger">{{ $message }}</span> @enderror
                              </div>
                              </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="email">Box:</label>
                                <select  class="form-control @error('box_details')  border-danger  @enderror "  wire:model.live="box_details">
                                  <option selected>Box</option>
                                  @foreach ($mbox as $Box)
                                        @empty($Box->box_details_status)
                                            <option value="{{$Box->box_details_id}}">{{$Box->box_details_serial_number}}</option>
                                        @endempty
                                  @endforeach
                                </select>
                                <div>
                                  @error('box_details') <span class="text-danger">{{ $message }}</span> @enderror
                              </div>
                              </div>
                        </div>
                    </div>





                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="email">Paddle:</label>
                                <select  class="form-control @error('paddle_details')  border-danger  @enderror "  wire:model.live="paddle_details">
                                  <option selected>Paddle</option>
                                  @foreach ($mpaddle as $Paddle)
                                        @empty($Paddle->paddle_details_status)
                                            <option value="{{$Paddle->paddle_details_id}}">{{$Paddle->paddle_details_serial_number}}</option>
                                        @endempty
                                  @endforeach
                                </select>
                                <div>
                                  @error('paddle_details') <span class="text-danger">{{ $message }}</span> @enderror
                              </div>
                              </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="email">Iron:</label>
                                <select  class="form-control @error('iron_details')  border-danger  @enderror "  wire:model.live="iron_details">
                                  <option selected>Iron</option>
                                    @foreach ($miron as $iron)
                                        @empty($iron->iron_details_status)
                                            <option value="{{$iron->iron_details_id}}">{{$iron->iron_details_serial_number}}</option>
                                        @endempty
                                    @endforeach
                                </select>
                                <div>
                                  @error('iron_details') <span class="text-danger">{{ $message }}</span> @enderror
                              </div>
                              </div>
                        </div>
                    </div>




                    <div class="row">
                      <div class="col">
                          <div class="form-group">
                              <label for="email">Branche:</label>
                              <select  class="form-control @error('branches')  border-danger  @enderror col-sm-4"  wire:model.live="branches" required>
                                <option selected>Branche</option>
                                @foreach ($branch as $branch)
                                    <option value="{{$branch->branches_id}}">{{$branch->branches_name}}</option>
                               @endforeach

                              </select>
                              <div>
                                @error('branches') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            </div>
                      </div>

                      <div class="col">
                        <div class="form-group">
                            <label for="email">Daily Rent:</label>
                            <input type="text" class="form-control  @error('machin_list_details_daily_rent')  border-danger  @enderror" placeholder="Daily Rent"  id="email"  wire:model.live="machin_list_details_daily_rent" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"  required>
                              @error('machin_list_details_daily_rent') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                          </div>

                  </div>



                  <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="email">Note:</label>
                            <input type="text"  class="form-control  @error('machin_list_details_note')  border-danger  @enderror" placeholder="Note"  id="email"  wire:model.live="machin_list_details_note" >
                            <div>
                              @error('machin_list_details_note') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                          </div>
                    </div>
                </div>




</div>
