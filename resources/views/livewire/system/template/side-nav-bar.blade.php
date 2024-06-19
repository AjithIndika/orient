<div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-dark">
    <?php
    use App\Models\Permittion;
    use Livewire\Attributes\Validate;
    use Illuminate\Support\Facades\Session;
    use App\Helper\apirequest;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;
    use App\Models\User;

    ?>

    <div class="app-brand demo">
        <span class="app-brand-logo demo">
            <img src="{{ url('assets/img/logo.png') }}" alt="Brand Logo" class="img-fluid">
        </span>
        <a href="/dashboard" wire:navigate
            class="app-brand-text demo sidenav-text font-weight-normal ml-2">{{ env('APP_NAME') }}</a>
        <a href="javascript:" class="layout-sidenav-toggle sidenav-link text-large ml-auto">
            <i class="ion ion-md-menu align-middle"></i>
        </a>
    </div>
    <div class="sidenav-divider mt-0"></div>

    <!-- Links -->
    <ul class="sidenav-inner py-1">

        <!-- Dashboards -->
        <li class="sidenav-item active">
            <a href="/dashboard" wire:navigate class="sidenav-link">
                <i class="sidenav-icon feather icon-home"></i>
                <div>Dashboards </div>
                <div class="pl-1 ml-auto">
                    <div class="badge badge-danger">Hot</div>
                </div>
            </a>
        </li>

        <!-- Layouts -->


        @if (!empty($per->system_Setting_view))
            <li class="sidenav-divider mb-1"></li>
            <!-- UI elements -->
            <li class="sidenav-item">
                <a href="javascript:" class="sidenav-link sidenav-toggle">
                    <i class="sidenav-icon feather icon-box"></i>
                    <div>System Settings</div>
                </a>
                <ul class="sidenav-menu">
                    @if (!empty($per->user_view))
                    <li class="sidenav-item">
                        <a href="/New-user" class="sidenav-link" wire:navigate>
                            <div>Users</div>
                        </a>
                    </li>
                @endif
                @if(session()->get('branches_view')==1)
                    <li class="sidenav-item">
                        <a href="/branch" class="sidenav-link" wire:navigate>
                            <div>Branch</div>
                        </a>
                    </li>
                    @endif
                    @if(session()->get('Customer_view')==1)
                    <li class="sidenav-item">
                        <a href="/customers" class="sidenav-link" wire:navigate>
                            <div>Customers</div>
                        </a>
                    </li>
                    @endif
                    @if(session()->get('supplier_view')==1)
                    <li class="sidenav-item">
                        <a href="/suppliers" class="sidenav-link" wire:navigate>
                            <div>Suppliers</div>
                        </a>
                    </li>
                    @endif
                </ul>
            </li>
            <li class="sidenav-divider mb-1"></li>
        @endif
        <!-- Forms & Tables -->

        <li class="sidenav-header small font-weight-semibold">Machine</li>
        <li class="sidenav-item">
            <a href="javascript:" class="sidenav-link sidenav-toggle">
                <i class="sidenav-icon feather icon-settings text-muted"></i>
                <div>Machine Details</div>
            </a>


            <ul class="sidenav-menu">
                @if(session()->get('machine_view')==1)
                <li class="sidenav-item">
                    <a href="/machine_list" class="sidenav-link" wire:navigate>
                        <div>Machine List</div>
                    </a>
                </li>
                @endif
                @if(session()->get('machineModel_view')==1)

                <li class="sidenav-item">
                    <a href="/machine-model" class="sidenav-link" wire:navigate>
                        <div>Machine Model</div>
                    </a>
                </li>
                @endif

                @if(session()->get('machineBrand_view')==1)
                <li class="sidenav-item">
                    <a href="/machine-brand" class="sidenav-link" wire:navigate>
                        <div>Machine Brand</div>
                    </a>
                </li>
                @endif

                @if(session()->get('machineType_view')==1)
                <li class="sidenav-item">
                    <a href="/machine_type" class="sidenav-link" wire:navigate>
                        <div>Machine Type</div>
                    </a>
                </li>
                @endif

                @if(session()->get('Iron_view')==1)
                <li class="sidenav-item">
                    <a href="/iron" class="sidenav-link" wire:navigate>
                        <div>Iron In</div>
                    </a>
                </li>
                @endif

                @if(session()->get('paddle_view')==1)
                <li class="sidenav-item">
                    <a href="/paddle" class="sidenav-link" wire:navigate>
                        <div>Paddle In</div>
                    </a>
                </li>
                @endif

                @if(session()->get('box_view')==1)
                <li class="sidenav-item">
                    <a href="/box" class="sidenav-link" wire:navigate>
                        <div>Machine Box Register</div>
                    </a>
                </li>
                @endif
            </ul>
        </li>

        @if(session()->get('delivery_note_view')==1)
        <!-- Delivery Note -->
        <li class="sidenav-divider mb-1"></li>
        <li class="sidenav-header small font-weight-semibold">Delivery Note</li>
        <li class="sidenav-item">
            <a href="javascript:" class="sidenav-link sidenav-toggle">
                <i class="sidenav-icon feather icon-box"></i>
                <div>Delivery Note</div>
            </a>
            <ul class="sidenav-menu">
                <li class="sidenav-item">
                    <a href="/geat-pass" class="sidenav-link" wire:navigate>
                        <div>Delivery Note List</div>
                    </a>
                </li>
                <li class="sidenav-item">
                    <a href="/select-customer" class="sidenav-link" wire:navigate>
                        <div>New Delivery Note</div>
                    </a>
                </li>

            </ul>
        </li>

@endif

@if(session()->get('ret_delivery_note_view')==1)

        <!-- Retune Note -->
        <li class="sidenav-divider mb-1"></li>
        <li class="sidenav-header small font-weight-semibold">Return Delivery Note</li>
        <li class="sidenav-item">
            <a href="javascript:" class="sidenav-link sidenav-toggle">
                <i class="sidenav-icon feather icon-clipboard"></i>
                <div>Return Delivery Note</div>
            </a>
            <ul class="sidenav-menu">
                <li class="sidenav-item">
                    <a href="/retun-get-pass-list" class="sidenav-link" wire:navigate>
                        <div>RDN List</div>
                    </a>
                </li>
                <li class="sidenav-item">
                    <a href="/retun-get-pass" class="sidenav-link" wire:navigate>
                        <div>New RDN</div>
                    </a>
                </li>

            </ul>
        </li>


@endif



@if(session()->get('otherparts_view')==1)
        <!-- Other parts -->
        <li class="sidenav-divider mb-1"></li>
        <li class="sidenav-header small font-weight-semibold">Other Parts</li>
        <li class="sidenav-item">
            <a href="javascript:" class="sidenav-link sidenav-toggle">
                <i class="sidenav-icon feather icon-clipboard"></i>
                <div>Other Parts</div>
            </a>
            <ul class="sidenav-menu">
                <li class="sidenav-item">
                    <a href="/other_parts_type" class="sidenav-link" wire:navigate>
                        <div>Other Parts Type</div>
                    </a>
                </li>
                <li class="sidenav-item">
                    <a href="/OtherParts" class="sidenav-link" wire:navigate>
                        <div>Other Parts</div>
                    </a>
                </li>

            </ul>
        </li>
        @endif

        @if(session()->get('new_invoice_view')==1 Or session()->get('rady_invoice_view')==1 OR session()->get('pending_invoice_menu_view')==1 OR session()->get('complete_invoice_menu_view')==1)
        <!-- Delivery Note -->
        <li class="sidenav-divider mb-1"></li>
        <li class="sidenav-header small font-weight-semibold">Invoice</li>
        <li class="sidenav-item">
            <a href="javascript:" class="sidenav-link sidenav-toggle">
                <i class="sidenav-icon feather icon-box"></i>
                <div>Invoice</div>
            </a>
            <ul class="sidenav-menu">
                <li class="sidenav-item">
                    <a href="/new-invoice" class="sidenav-link" wire:navigate>
                        <div>New Invoice</div>
                    </a>
                </li>

                @if(session()->get('new_invoice_view')==1)
                <li class="sidenav-item">
                    <a href="/ready-to-Send" class="sidenav-link" wire:navigate>
                        <div>Ready to Send</div>
                    </a>
                </li>
                @endif


                @if(session()->get('pending_invoice_menu_view')==1)
                <li class="sidenav-item">
                    <a href="/panding-invoice" class="sidenav-link" wire:navigate>
                        <div>Panding Invoice</div>
                    </a>
                </li>
                @endif


                @if(session()->get('complete_invoice_menu_view')==1)
                <li class="sidenav-item">
                    <a href="/complete-invoice" class="sidenav-link" wire:navigate>
                        <div>Complete Invoice</div>
                    </a>
                </li>
                @endif
            </ul>
        </li>
        @endif




        <!-- Pages -->
        <li class="sidenav-divider mb-1"></li>
        <li class="sidenav-header small font-weight-semibold">Pages</li>
        <li class="sidenav-item">
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                class="sidenav-link">
                <i class="sidenav-icon feather icon-log-out"></i>
                <div>{{ __('Logout') }}</div>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>

    </ul>
</div>
