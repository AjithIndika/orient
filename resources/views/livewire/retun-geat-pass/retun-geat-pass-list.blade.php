<div class="container h-100 mt-5">

    <?php

        use Carbon\Carbon;
        ?>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/2.0.6/css/dataTables.bootstrap4.css" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.6/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.6/js/dataTables.bootstrap4.js"></script>




    <table id="example" class="table table-striped table-bordered mt-1 " style="width: 100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>RDN Number</th>
                <th>Customer RDN No</th>
                <th>Customer</th>
                <th></th>

            </tr>
        </thead>
        <tbody>
            @foreach ($retun as $key=>$RDN )


            <tr>
                <td>{{$key+1}}</td>
                <td>{{Carbon::parse($RDN->created_at)->format('Y-m-d')}}</td>
                <td>{{$RDN->retun_geatpass_details_number}}</td>
                <td>{{$RDN->return_gatepass_number}}</td>
                <td>{{$RDN->customers_name }}</td>
                <td><a href="/view-retun-geatpass/{{$RDN->retun_geatpass_details_number}}" class="btn btn-outline-success" target="_blank" wire:navigate><i class="feather icon-edit"></i> </a></td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>RDN Number</th>
                <th>Customer RDN No</th>
                <th>Customer</th>
                <th></th>

            </tr>
        </tfoot>
    </table>

    <script>
        new DataTable('#example');
    </script>
    <style>
        a:hover{
            text-decoration: none;
        }
    </style>




</div>
