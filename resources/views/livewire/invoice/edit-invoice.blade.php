<div>

    <?php
       use App\Livewire\Invoice\EditInvoice;
        ?>
    @foreach ($invoice as $invo)
    <div class="card mb-4 mt-3">
        <h6 class="card-header">Invoice Details</h6>
        <div class="card-body">
            <form>

                @csrf

                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label class="form-label text-center">Invoice Number</label>
                        <input type="text" class="form-control" placeholder="Email" value="{{$invo->invoice_details_number}}" readonly  wire:model.live="invoice_details_number">
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Customer Name</label>
                        <input type="text" class="form-control" placeholder="Password" value="{{$invo->customers_name}} / {{$invo->customers_address}}">
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-4">
                    <label class="form-label">Customer contact</label>
                    <input type="text" class="form-control" value="{{$invo->Customers_relation_officer_name}} / {{$invo->customers_telephone}}">
                    <div class="clearfix"></div>
                </div>
                <div class="form-group col-md-2">
                    <label class="form-label">Invoice due date</label>
                    <input type="text" class="form-control"  value="{{$invo->invoice_details_due_Date}}" wire:model.live="invoice_details_due_Date">
                    <div class="clearfix"></div>
                </div>

                <div class="form-group col-md-2">
                    <label class="form-label">Customer Number </label>
                    <input type="text" class="form-control" wire:model.live="invoice_details_customer_number">
                    <div class="clearfix"></div>
                </div>


                <div class="form-group col-md-2">
                    <label class="form-label">Invoice Value </label>
                    <input type="text" class="form-control" value="{{$invo->invoice_details_total}}" >
                    <div class="clearfix"></div>
                </div>



                </div>







        </div>
    </div>




    <div class="card mt-2">
        <div class="card-header">Invoice Machine details</div>
        <table class="table card-table">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Gate Pass Number</th>
                    <th>Machine Number</th>
                    <th>Day Rental value</th>
                    <th>Used Date</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($machin as $key=>$mad)


                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{  $mad->geatpass_details_number }}</td>
                    <td>{{  EditInvoice::mcnumber($mad->machin_list_details_id) }}

                        @if (!empty($mad->box_details_id))
                        <li>BoX - {{EditInvoice::boxsn($mad->box_details_id)}}
                            @if (!empty($mad->box_details_recive_date))
                            <strong><i class="lnr lnr-undo"></i></strong>
                            @endif
                        </li>
                        @endif

                        @if (!empty($mad->paddle_details_id))
                        <li>BoX - {{EditInvoice::paddlesn($mad->paddle_details_id)}}
                            @if (!empty($mad->paddle_details_recive_date))
                            <strong><i class="lnr lnr-undo"></i></strong>
                            @endif
                        </li>
                        @endif


                        @if (!empty($mad->iron_details_id))
                        <li>BoX - {{EditInvoice::ironsn($mad->iron_details_id)}}
                            @if (!empty($mad->iron_details_recive_date))
                            <strong><i class="lnr lnr-undo"></i></strong>
                            @endif
                        </li>
                        @endif

                    </td>
                    <td>{{  $mad->machin_list_details_daily_rent }}</td>
                    <td>{{  $mad->used_date }}</td>
                    <td>{{ $mad->cost_of_used_date }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <div class="col-sm-12 mt-2 bg-war">
        @foreach ($invoice as $invo)
@if(empty($invo->invoice_details_check_by))
        <button type="button" class="btn btn-lg btn-success"  wire:click.prevent="check()">
            <i class="feather icon-save"></i>&nbsp;&nbsp;Check
        </button>

@endif


@if(!empty($invo->invoice_details_check_by) & empty($invo->invoice_details_approved))
        <label class="custom-control custom-checkbox m-0 mt-2 mb-2  @error('invoice_details_approved')  border-danger  @enderror">
            <input type="checkbox" class="custom-control-input" value="1"  wire:model.live="invoice_details_approved">
            <span class="custom-control-label text-danger">Check this custom checkbox</span>

            <div>
                @error('invoice_details_approved') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </label>

        <button type="button" class="btn btn-lg btn-success"  wire:click.prevent="save()">
        <i class="feather icon-save"></i>&nbsp;&nbsp;Approved to Send
    </button>

    @endif
    </div>

    @endforeach

</form>





   @endforeach
</div>
