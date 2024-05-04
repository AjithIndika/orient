<div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-dark">

                <div class="app-brand demo">
                    <span class="app-brand-logo demo">
                        <img src="{{url('assets/img/logo.png')}}" alt="Brand Logo" class="img-fluid">
                    </span>
                    <a href="/dashboard" wire:navigate class="app-brand-text demo sidenav-text font-weight-normal ml-2">{{ env('APP_NAME')}}</a>
                    <a href="javascript:" class="layout-sidenav-toggle sidenav-link text-large ml-auto">
                        <i class="ion ion-md-menu align-middle"></i>
                    </a>
                </div>
                <div class="sidenav-divider mt-0"></div>

                <!-- Links -->
                <ul class="sidenav-inner py-1">

                    <!-- Dashboards -->
                    <li class="sidenav-item active">
                        <a  href="/dashboard" wire:navigate class="sidenav-link">
                            <i class="sidenav-icon feather icon-home"></i>
                            <div>Dashboards</div>
                            <div class="pl-1 ml-auto">
                                <div class="badge badge-danger">Hot</div>
                            </div>
                        </a>
                    </li>

                    <!-- Layouts -->
                    <li class="sidenav-divider mb-1"></li>


                    <!-- UI elements -->
                    <li class="sidenav-item">
                        <a href="javascript:" class="sidenav-link sidenav-toggle">
                            <i class="sidenav-icon feather icon-box"></i>
                            <div>System Settings</div>
                        </a>
                        <ul class="sidenav-menu">
                            <li class="sidenav-item">
                                <a href="/branch"  class="sidenav-link" wire:navigate>
                                    <div>Branch</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="/customers" class="sidenav-link" wire:navigate>
                                    <div>Customers</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="/suppliers" class="sidenav-link" wire:navigate>
                                    <div>Suppliers</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Forms & Tables -->
                    <li class="sidenav-divider mb-1"></li>
                    <li class="sidenav-header small font-weight-semibold">Machine</li>
                    <li class="sidenav-item">
                        <a href="javascript:" class="sidenav-link sidenav-toggle">
                            <i class="sidenav-icon feather icon-settings text-muted"></i>
                            <div>Machine Details</div>
                        </a>
                        <ul class="sidenav-menu">
                            <li class="sidenav-item">
                                <a href="/machine_list" class="sidenav-link" wire:navigate>
                                    <div>Machine List</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="/machine-model" class="sidenav-link" wire:navigate>
                                    <div>Machine Model</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="/machine-brand" class="sidenav-link" wire:navigate>
                                    <div>Machine Brand</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="/machine_type" class="sidenav-link" wire:navigate>
                                    <div>Machine Type</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="/iron" class="sidenav-link" wire:navigate>
                                    <div>Iron In</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="/paddle" class="sidenav-link" wire:navigate>
                                    <div>Paddle In</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="forms_input-groups.html" class="sidenav-link" wire:navigate>
                                    <div>Machine Register</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="/box" class="sidenav-link" wire:navigate>
                                    <div>Machine Box Register</div>
                                </a>
                            </li>
                        </ul>
                    </li>


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




                    <!-- Pages -->
                    <li class="sidenav-divider mb-1"></li>
                    <li class="sidenav-header small font-weight-semibold">Pages</li>
                    <li class="sidenav-item">
                        <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="sidenav-link">
                            <i class="sidenav-icon feather icon-log-out"></i>
                            <div>{{ __('Logout') }}</div>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

                </ul>
            </div>
