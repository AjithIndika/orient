<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\System\Dashbord\DashBord;
use App\Livewire\System\Setting\Branches;
use App\Livewire\Customers\Customers;
use App\Livewire\Suppliers\Suppliers;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Machine\MachineBrand;
Use App\Livewire\Machine\MachineModel;
use App\Livewire\Machine\MachineType;
use App\Livewire\Iron\Iron;
use App\Livewire\Paddle\Paddle;
use App\Livewire\Box\Box;
use App\Livewire\MachineList\MachineList;
use App\Livewire\GatePass\GatePass;
use App\Livewire\GatePass\SelectCustomerFrom;
Use App\Livewire\GatePass\ViewGetpass;
use App\Livewire\GatePass\GeatPassList;
use App\Livewire\RetunGeatPass\SelectReturnCustomer;
use App\Livewire\RetunGeatPass\NewReturnGetpass;
use App\Livewire\RetunGeatPass\ViewRetunGeatPass;
use App\Livewire\RetunGeatPass\RetunGeatPassList;
use App\Livewire\Invoice\NewInvoiceGenerate;


Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();
Route::get('/dashboard',DashBord::class)->middleware('auth'); // main dashboard
Route::get('/branch',Branches::class)->middleware('auth');  // branch
Route::get('/customers',Customers::class)->middleware('auth');  // customers
Route::get('/suppliers',Suppliers::class)->middleware('auth');  // supliers
Route::get('/machine-brand',MachineBrand::class)->middleware('auth');  // machine brand
Route::get('/machine-model',MachineModel::class)->middleware('auth');  // machine model
Route::get('/machine_type',MachineType::class)->middleware('auth');  // machine type
Route::get('/iron',Iron::class)->middleware('auth');  // Iron
Route::get('/paddle',Paddle::class)->middleware('auth');  // Paddle
Route::get('/box',Box::class)->middleware('auth');  // box
Route::get('/machine_list',MachineList::class)->middleware('auth');
Route::get('/select-customer',SelectCustomerFrom::class)->middleware('auth'); // box
Route::any('/new-getpass/{tempGetpassid}',GatePass::class)->middleware('auth'); // box
Route::get('/view-getpass/{geatpass_details_number}',ViewGetpass::class); // view get paas inside and out side
Route::get('/geat-pass',GeatPassList::class)->middleware('auth'); // view get paas inside and out side
Route::get('/retun-get-pass',SelectReturnCustomer::class)->middleware('auth'); // retun getpass customer select
Route::get('/new-return-getpass/{retun_geatpass_details_number}',NewReturnGetpass::class)->middleware('auth'); //new retungeatpass
Route::get('/retun-get-pass-list',RetunGeatPassList::class)->middleware('auth');//view retun getpass
Route::get('/view-retun-geatpass/{retun_geatpass_details_number}',ViewRetunGeatPass::class)->middleware('auth');//view retun getpass
Route::get('/new-invoice-generate',NewInvoiceGenerate::class)->middleware('auth');//view retun getpass











//Route::get('/dashboard', DashBord::class)->name('Dashboard');
