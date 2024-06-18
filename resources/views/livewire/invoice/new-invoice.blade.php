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
                    <th>Check</th>
                    <th>Approval</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoice as $key=>$inview)
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td> {{$inview->invoice_details_number}}</td>
                    <td>{{$inview->customers_name}}</td>
                    <td>{{$inview->invoice_details_total}}</td>
                    <td>

                        @if(empty($inview->invoice_details_check_by) AND session()->get('new_invoice_Check')==1)
                        <a href="/edit-invoice/{{$inview->invoice_details_number}}">   <button type="button" class="btn icon-btn btn-outline-success" >
                            <i class="feather icon-check-square "></i>
                        </button>
                     </a>
                     @endempty



                    </td>


                    <td>
                     @if(!empty($inview->invoice_details_check_by) AND session()->get('new_invoice_approval')==1)
                     <a href="/edit-invoice/{{$inview->invoice_details_number}}">   <button type="button" class="btn icon-btn btn-outline-success" >
                        <i class="lnr lnr-thumbs-up"></i>
                     </button>
                  </a>
                  @endempty


                    </td>


                </tr>
                @endforeach

            </tbody>
        </table>
    </div>




</div>
