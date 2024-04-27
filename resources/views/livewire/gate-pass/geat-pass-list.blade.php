<div class="bg-white p-4">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css">
    <table id="example" class="display bg-white" style="width:100%">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($getpass as $key => $gtpass)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $gtpass->geatpass_details_number }}</td>
                    <td>{{ $gtpass->customers_name }}</td>
                    <td>
                          <a  class="btn btn-outline-success" href="/view-getpass/{{ $gtpass->geatpass_details_number }}" wire:custom-directive >View Delivery Note</a>  </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
        </tfoot>
    </table>

    <script>
        Livewire.directive('custom-directive', {
          bind: function (el, binding, vnode) {
            el.addEventListener('click', function (event) {
              if (event.ctrlKey || event.metaKey) {
                event.preventDefault();
                window.open(binding.value);
              }
            });
          },
        });
        </script>


    <script>
        new DataTable('#example', {
            columnDefs: [{
                    targets: [0],
                    orderData: [0, 1]
                },
                {
                    targets: [1],
                    orderData: [1, 0]
                },
                {
                    targets: [3],
                    orderData: [3, 0]
                }
            ]
        });
    </script>




</div>
