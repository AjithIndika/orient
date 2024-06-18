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
                    <th>Payment update</th>
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


                        <button type="button"  class="btn icon-btn btn-outline-success" >
                            <i class="feather icon-log-in"></i>
                        </button>

                        </form>
                    </td>


                    <td>
                        <a href="/viewInvoice/{{$inview->invoice_details_number}}"  wire:navigate target="_empty">
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




</div>
