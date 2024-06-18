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
                    <th>Email</th>
                    <th>View</th>
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
                    <td>

                        @if(!empty($inview->customers_email))
                        <button type="button"  class="btn icon-btn btn-outline-success" data-toggle="modal" data-target="#sendemailModal"   wire:click="sendEmails({{$inview->invoice_details_id}})">
                            <i class="lnr lnr-envelope"></i>
                        </button>
                        @endif
                        </form>
                    </td>


                    <td>
                        <a href="/viewInvoice/{{$inview->invoice_details_number}}">
                            <button type="button"  class="btn icon-btn btn-outline-success">
                                <i class="lnr lnr-file-empty"></i>
                            </button>
                             </a>
                        </td>


                </tr>






                @endforeach

            </tbody>
        </table>
    </div>


    <div wire:ignore.self class="modal fade" id="sendemailModal" tabindex="-1" role="dialog"
    aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Email Sending Confirmation</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form>
                    @csrf
                    <h1> {{$invoice_details_number}} Do you need to send this via email?</h1>
                    <input type="hidden" wire:model.live="invoice_details_id">
                    <input type="hidden" wire:model.live="customers_email">
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="modal_close"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" wire:click.prevent="emailSensconfrom()">yes I
                        confirm it</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>




</div>
