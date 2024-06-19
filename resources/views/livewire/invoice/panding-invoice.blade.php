<div>

    <div class="card mt-3">
        <div class="card-header">New Invoice</div>
        <table class="table card-table">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Invoice number</th>
                    <th>Customer Name</th>
                    <th>Total Amount</th>
                    @if(session()->get('pending_invoice_payment_update')==1)
                    <th>Payment update</th>
                    @endif
                    @if(session()->get('pending_invoice_view')==1)
                    <th>View</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($invoice as $key=>$inview)

                <tr>
                    <form>

                        @csrf
                    <th scope="row">{{$key+1}}</th>
                    <td> {{$inview->invoice_details_number}}</td>
                    <td>{{$inview->customers_name}}</td>
                    <td>{{$inview->invoice_details_total}}</td>
                    @if(session()->get('pending_invoice_payment_update')==1)
                    <td>
                        <button type="button"  class="btn icon-btn btn-outline-success" data-toggle="modal" data-target="#paymentUpdate"   wire:click="payment({{$inview->invoice_details_id}})">
                            <i class="feather icon-log-in"></i>
                        </button>
                        </form>
                    </td>
               @endif
               @if(session()->get('pending_invoice_view')==1)
                    <td>
                        <a href="/viewInvoice/{{$inview->invoice_details_number}}"  wire:navigate>
                            <button type="button"  class="btn icon-btn btn-outline-success">
                                <i class="lnr lnr-file-empty"></i>
                            </button>
                             </a>
                    </td>
                    @endif
                </tr>






                @endforeach

            </tbody>
        </table>
    </div>


    <div wire:ignore.self class="modal fade" id="paymentUpdate" tabindex="-1" role="dialog"
    aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"> Received Payment updating</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form>
                    @csrf
                    <h1> </h1>
                    <input type="hidden" wire:model.live="invoice_details_id">

                    <div class="form-group">
                        <label for="email">Invoice Amount </label>
                        <input type="text" class="form-control"  wire:model.live="invoice_details_total" readonly>
                      </div>

                      <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="email">Received Amount:</label>
                                <input type="text" class="form-control" placeholder="Received Amount" value="{{$invoice_details_total}}" id="email"   wire:model.live="invoice_details_balance" readonly	>
                              </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="email">Payment Method:</label>
                                <select class="form-control  @error('invoice_details_balance_recive_methord')  border-danger  @enderror" wire:model.live="invoice_details_balance_recive_methord">
                                    <option value="">Select One</option>
                                    <option>Cheque</option>
                                    <option>Cash</option>
                                    <option>Bank Transfer</option>
                                </select>

                              </div>
                        </div>


                      </div>
                      @if($invoice_details_balance_recive_methord=='Cheque')
                      <div class="form-group">
                        <label for="email">Cheque Number:</label>
                        <input type="text" class="form-control @error('invoice_details_balance_recive_cheque_number')  border-danger  @enderror"  	wire:model.live="invoice_details_balance_recive_cheque_number">
                      </div>
                      <div class="form-group">
                        <label for="email">Deposit date:</label>
                        <input type="date" class="form-control @error('invoice_details_balance_recive_cheque_deposit_date')  border-danger  @enderror"  	wire:model.live="invoice_details_balance_recive_cheque_deposit_date">
                      </div>
                      @endif

                      @if($invoice_details_balance_recive_methord=='Bank Transfer')
                      <div class="form-group">
                        <label for="email">Reference number:</label>
                        <input type="text" class="form-control @error('invoice_details_balance_recive_reference_number')  border-danger  @enderror"  	wire:model.live="invoice_details_balance_recive_reference_number">
                      </div>
                      <div class="form-group">
                        <label for="email">Deposit date:</label>
                        <input type="date" class="form-control @error('invoice_details_balance_recive_bank_deposit_date')  border-danger  @enderror"  	wire:model.live="invoice_details_balance_recive_bank_deposit_date">
                      </div>
                      @endif

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="modal_close"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" wire:click.prevent="update_invoice()">Save</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>




</div>
