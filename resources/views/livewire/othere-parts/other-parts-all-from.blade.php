<div>

    <?php
    use App\Livewire\OthereParts\OtherParts;
    ?>


    @csrf


    <div class="form-group">
        <label for="email">Other Parts Type:</label>
        <select class="form-control   @error('othe_parts_types_id')  border-danger  @enderror"  wire:model.live="othe_parts_types_id" >
          @if(!empty($othe_parts_types_id))
            <option value="{{$othe_parts_types_id}}">{{OtherParts::partsName('$othe_parts_types_id')}}</option>
                 @else
                 <option  selected>Select One</option>
            @endif


            @foreach ($partType as $atPartType)
            <option value="{{$atPartType->othe_parts_types_id}}">{{$atPartType->othe_parts_types_name}}</option>
            @endforeach


        </select>

        <div>
          @error('othe_parts_types_id') <span class="text-danger">{{ $message }}</span> @enderror
      </div>
      </div>




    <div class="form-group">
        <label for="email">Other PartsName (Option):</label>
        <input type="text" class="form-control  @error('othe_parts_name')  border-danger  @enderror"   id="email"  wire:model.live="othe_parts_name" >
        <div>
          @error('othe_parts_name') <span class="text-danger">{{ $message }}</span> @enderror
      </div>
      </div>



      <div class="form-group">
        <label for="email">Other Parts SN:</label>
        <input type="text" class="form-control  @error('othe_parts_sn')  border-danger  @enderror" placeholder="Other Parts SN"  id="email"  wire:model.live="othe_parts_sn" >
        <div>
          @error('othe_parts_sn') <span class="text-danger">{{ $message }}</span> @enderror
      </div>
      </div>




      <div class="form-group">
        <label for="email">Daily Rate:</label>
        <input type="text" class="form-control  @error('othe_parts_daily_rate')  border-danger  @enderror"   id="email"  wire:model.live="othe_parts_daily_rate" >
        <div>
          @error('othe_parts_daily_rate') <span class="text-danger">{{ $message }}</span> @enderror
      </div>
      </div>



      <input type="hidden" wire:model.live="othe_parts_id">

</div>
