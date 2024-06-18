<?php

namespace App\Http\Middleware;
use App\Models\Permittion;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;
use App\Helper\apirequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use Closure;

use Symfony\Component\HttpFoundation\Response;


class SessionPermition
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {


$per=json_decode(Permittion::where('user_id',Auth::id())->value('permittions'));

Session::put(['user_view'=>$per->user_view,
              'new_user_add'=>$per->new_user_add,
              'user_edit'=>$per->user_edit,
              'user_password'=>$per->user_password,
              'branches_view'=>$per->branches_view,
              'branches_add'=>$per->branches_add,
              'branches_edit'=>$per->branches_edit,
              'Customer_view'=>$per->Customer_view,
              'Customer_add'=>$per->Customer_add,
              'Customer_edit'=>$per->Customer_edit,
              'supplier_view'=>$per->supplier_view,
              'supplier_add'=>$per->supplier_add,
              'supplier_edit'=>$per->supplier_edit,
              'machine_view'=>$per->machine_view ,
             'machine_add'=>$per->machine_add,
             'machine_edit'=>$per->machine_edit,
             'machineModel_view'=>$per->machineModel_view ,
             'machineModel_add'=>$per->machineModel_add,
             'machineModel_edit'=>$per->machineModel_edit,
             'machineBrand_view'=>$per->machineBrand_view,
             'machineBrand_add'=>$per->machineBrand_add,
             'machineBrand_edit'=>$per->machineBrand_edit,
             'machineType_view'=>$per->machineType_view,
             'machineType_add'=>$per->machineType_add,
             'machineType_edit'=>$per->machineType_edit,
             'Iron_view'=>$per->Iron_view,
             'Iron_add'=>$per->Iron_add,
             'Iron_edit'=>$per->Iron_edit,
             'paddle_view'=>$per->paddle_view,
             'paddle_add'=>$per->paddle_add,
             'paddle_edit'=>$per->paddle_edit,
             'box_view'=>$per->box_view,
             'box_add'=>$per->box_add,
             'box_edit'=>$per->box_edit,
             'delivery_note_view'=>$per->delivery_note_view,
             'delivery_note_add'=>$per->delivery_note_add,
             'delivery_note_edit'=>$per->delivery_note_edit,
             'ret_delivery_note_view'=>$per->ret_delivery_note_view,
             'ret_delivery_note_add'=>$per->ret_delivery_note_add,
             'ret_delivery_note_edit'=>$per->ret_delivery_note_edit,
             'otherparts_view'=>$per->otherparts_view,
             'otherparts_add'=>$per->otherparts_add,
             'otherparts_edit'=>$per->otherparts_edit,

             'new_invoice_view'=>$per->new_invoice_view,
             'new_invoice_Check'=>$per->new_invoice_Check,
             'new_invoice_approval'=>$per->new_invoice_approval,

            ]);

        return $next($request);
    }
}
