<?php

namespace App\Livewire\GatePass;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;
use App\Helper\apirequest;
use Illuminate\Support\Facades\Auth;
use App\Models\GeatpassTempDetails;
use App\Models\GeatpassDetails;
use App\Models\CustomersDetails;
use App\Models\MachinListDetails;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\GetpassTempItemsDetails;
use App\Models\BoxDetails;
use App\Models\paddleDetails;
use App\Models\IronDetails;
use App\Models\tempIrontable;
use App\Models\tempPaddeltable;
use App\Models\DeliveryMachineDetails;
use App\Models\DeliverypaddleDetails;
use App\Models\DeliverypIronDetails;

use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Hash;

class GatePass extends Component
{
    public $tempGetpassid;

    #[Url]
    public $machinlistdetails = [];
    public $machin;
    public $machin_list_details;
    public $organization_id;

    public $MachinListDetails;
    public $machin_list_details_id;
    public $machin_type_details_id;

    //iron
    public $irondetails;

    //paddel detais

    // paddleDetails
    public $PaDetails;
    public $geatpass_details_id;

    public $geatpass_details_number;
    public $geatpass_details_number_hash;
    public $customers_id;
    public $geatpass_details_vehicle;
    public $geatpass_details_driver_name;
    public $geatpass_details_driver_nic;
    public $geatpass_details_driver_mobile;
    public $geatpass_details_crate_by;




    public $box_details_id;

    public $paddle_details_id;
    public $iron_details_id;
    public $machin_list_details_daily_ren;
    public $branches_id;
    public $delivery_machine_details_user;
    public $delivery_machine_details_date;





    public function additems()
    {
        $mclist = MachinListDetails::where('machin_list_details_id', $this->machin_list_details_id)->get();
        foreach ($mclist as $slectmc) {
            //  dump($slectmc->machin_type_details_id);
            GetpassTempItemsDetails::create([
                'tempGetpassid' => $this->tempGetpassid,
                'machin_type_details_id' => $slectmc->machin_type_details_id,
                'machin_list_details_id' => $slectmc->machin_list_details_id,
                'customers_id'=>$this->customers_id,
                'box_details_id' => $slectmc->box_details_id,
                'paddle_details_id' => $slectmc->paddle_details_id,
                'iron_details_id' => $slectmc->iron_details_id,
                'machin_list_details_daily_rent' => $slectmc->machin_list_details_daily_rent,
                'geatpass_temp_details_user_id' => Auth::user()->name,
                'branches_id' => $slectmc->branches_id,
                'geatpass_temp_details_date' => date('Y-m-d H:i:s'),
            ]);
        }
        return redirect()->to('/new-getpass/' . $this->tempGetpassid . '');
    }

    public static function boxsn($box_details_id)
    {
        echo BoxDetails::where('box_details_id', $box_details_id)->value('box_details_serial_number');
    }

    /// paddel sn
    public static function paddlesn($paddle_details_id)
    {
        echo paddleDetails::where('paddle_details_id', $paddle_details_id)->value('paddle_details_serial_number');
    }

    /// paddel sn
    public static function ironsn($iron_details_id)
    {
        echo IronDetails::where('iron_details_id', $iron_details_id)->value('iron_details_serial_number');
    }

    //machin delet temparry table

    public function removeMachin(int $getpass_temp_items_details_id)
    {
        $tempGetpassid = GetpassTempItemsDetails::where('getpass_temp_items_details_id', $getpass_temp_items_details_id)->value('tempGetpassid');
        GetpassTempItemsDetails::where('getpass_temp_items_details_id', $getpass_temp_items_details_id)->delete();
        toastr()->success('Machine removed successfully!', 'Congrats');
        return redirect()->to('/new-getpass/' . $this->tempGetpassid . '');
    }

    //iron add and remove start
    public function addiIron()
    {
        $mclist = IronDetails::where('iron_details_id', $this->irondetails)->get();
   //   $customers_id=  GeatpassTempDetails::where('tempGetpassid','=',$this->tempGetpassid)->values('customers_id');

        foreach ($mclist as $slectmc) {
            tempIrontable::create([
                'tempGetpassid' => $this->tempGetpassid,
                'iron_details_id' => $slectmc->iron_details_id,
                'customers_id'=>GeatpassTempDetails::where('tempGetpassid','=',$this->tempGetpassid)->value('customers_id'),
                'iron_daily_rent' => $slectmc->iron_daily_rent,
                'iron_details_serial_number' => $slectmc->iron_details_serial_number,
            ]);
        }
        return redirect()->to('/new-getpass/' . $this->tempGetpassid . '');
    }

    public function removeIron(int $temp_irontables_id)
    {
        $tempGetpassid = tempIrontable::where('temp_irontables_id', $temp_irontables_id)->value('tempGetpassid');
        tempIrontable::where('temp_irontables_id', $temp_irontables_id)->delete();
        toastr()->success('Iron removed successfully!', 'Congrats');
        return redirect()->to('/new-getpass/' . $tempGetpassid . '');
    }
    //iron add and remove start

    //padel add & remove

    public function addPaddle()
    {

      //  dump($this->tempGetpassid);

     //   dump(GeatpassTempDetails::where('tempGetpassid','=',$this->tempGetpassid)->value('customers_id'));
       // dump($this->PaDetails);

        $mclist = paddleDetails::where('paddle_details_id', $this->PaDetails)->get();
        foreach ($mclist as $slectmc) {
            tempPaddeltable::create([
                'tempGetpassid' => $this->tempGetpassid,
                'paddle_details_id' => $slectmc->paddle_details_id,
                'customers_id'=>GeatpassTempDetails::where('tempGetpassid','=',$this->tempGetpassid)->value('customers_id'),
                'paddle_daily_rent' => $slectmc->paddle_daily_rent,
                'paddle_details_serial_number' => $slectmc->paddle_details_serial_number,
            ]);
        }
        return redirect()->to('/new-getpass/' . $this->tempGetpassid . '');
    }

    public function removepaddle(int $temp_paddeltables_id)
    {
        $tempGetpassid = tempPaddeltable::where('temp_paddeltables_id', $temp_paddeltables_id)->value('tempGetpassid');
        tempPaddeltable::where('temp_paddeltables_id', $temp_paddeltables_id)->delete();
        toastr()->success('Paddle removed successfully!', 'Congrats');
        return redirect()->to('/new-getpass/' . $tempGetpassid . '');
    }





    //Generate Delivery Note
    public function GenerateDeliveryNote(){

      //  dd($this->tempGetpassid);
        if(!empty(GeatpassDetails::orderBy('geatpass_details_number', 'desc')->value('geatpass_details_number'))){
            $p=GeatpassDetails::orderBy('geatpass_details_number', 'desc')->value('geatpass_details_number');
            $er=explode("-",$p);
            $pnumber='ORGP-'.str_pad($er['1']+1, 8, '0', STR_PAD_LEFT);
         }
               else {
                 $pnumber='ORGP-'.str_pad(1, 8, '0', STR_PAD_LEFT);
          }

         $tepget= GeatpassTempDetails::where('tempGetpassid','=',$this->tempGetpassid)->get();

         foreach($tepget as $tgd){
            // getpass details add org
            GeatpassDetails::create([
                'geatpass_details_number'=>$pnumber,
                'geatpass_details_number_hash'=>Hash::make($pnumber),
                'customers_id'=>GeatpassTempDetails::where('tempGetpassid','=',$this->tempGetpassid)->value('customers_id'),
                'geatpass_details_vehicle'=>$tgd->geatpass_temp_details_vehicle,
                'geatpass_details_driver_name'=>$tgd->geatpass_temp_details_driver_name,
                'geatpass_details_driver_nic'=>$tgd->geatpass_temp_details_driver_nic,
                'geatpass_details_driver_mobile'=>$tgd->geatpass_temp_details_driver_mobile,
                'geatpass_details_crate_by'=>Auth::user()->name,

            ]);

         }

         //getpass machin ad and update

        // dump($this->tempGetpassid);
         $tepmItem= GetpassTempItemsDetails::where('tempGetpassid','=',$this->tempGetpassid)->get();

     //    dump( $tepmItem);
         foreach($tepmItem as $Titem){
            DeliveryMachineDetails::create([
                  'geatpass_details_number'=>$pnumber,
                  'machin_list_details_id'=>$Titem->machin_list_details_id,
                  'customers_id'=>GeatpassTempDetails::where('tempGetpassid','=',$this->tempGetpassid)->value('customers_id'),
                  'box_details_id'=>$Titem->box_details_id,
                  'machin_type_details_id'=>$Titem->machin_type_details_id,
                  'paddle_details_id'=>$Titem->paddle_details_id,
                  'iron_details_id'=>$Titem->iron_details_id,
                  'machin_list_details_daily_rent'=>$Titem->machin_list_details_daily_rent,
                  'branches_id'=>$Titem->branches_id,
                  'delivery_machine_details_user'=>Auth::user()->name,
                  'delivery_machine_details_date'=>date('Y-m-d'),
            ]);

            // add to machin delivery number
            MachinListDetails::where('machin_list_details_id',$Titem->machin_list_details_id)->update([
                'machin_list_details_status'=>$pnumber,
             ]);


            // add to box diliver number
             BoxDetails::where('box_details_id',$Titem->box_details_id)->update([
                'deliveryNote_id'=>$pnumber,
             ]);

              // add to paddel diliver number
              paddleDetails::where('paddle_details_id',$Titem->paddle_details_id)->update([
                'deliveryNote_id'=>$pnumber,
             ]);

             // add to paddel diliver number
             IronDetails::where('iron_details_id',$Titem->iron_details_id)->update([
                'deliveryNote_id'=>$pnumber,
             ]);
             /*
//use App\Models\BoxDetails;
use App\Models\paddleDetails;
use App\Models\IronDetails;
*/
         }

         //dilivery padel update
       $temp=  tempPaddeltable::where('tempGetpassid', '=', $this->tempGetpassid)->get();
       foreach($temp as $tp){
        DeliverypaddleDetails::create([
             'geatpass_details_number'=>$pnumber,
             'paddle_details_id'=>$tp->paddle_details_id,
             'customers_id'=>GeatpassTempDetails::where('tempGetpassid','=',$this->tempGetpassid)->value('customers_id'),
             'paddle_daily_rent'=>$tp->paddle_daily_rent,
             'deliverypaddle_user'=>Auth::user()->name,
             'deliverypaddle_date'=>date('Y-m-d'),
             'last_invoice_date'=>'',
             'return_delivery_note_number'=>'',
             'return_delivery_note_date'=>'',
        ]);
        paddleDetails::where('paddle_details_id',$tp->paddle_details_id)->update([
            'deliveryNote_id'=>$pnumber,
         ]);
       }


       // iron delivery note

       $intemp=  tempIrontable::where('tempGetpassid', '=', $this->tempGetpassid)->get();
       foreach($intemp as $intp){
        DeliverypIronDetails::create([
             'geatpass_details_number'=>$pnumber,
             'iron_details_id'=>$intp->iron_details_id,
             'customers_id'=>GeatpassTempDetails::where('tempGetpassid','=',$this->tempGetpassid)->value('customers_id'),
             'iron_daily_rent'=>$intp->iron_daily_rent,
             'deliveryp_iron_user'=>Auth::user()->name,
             'deliveryp_iron_date'=>date('Y-m-d'),
             'last_invoice_date'=>'',
             'return_delivery_note_number'=>'',
             'return_delivery_note_date'=>'',
        ]);
        IronDetails::where('iron_details_id',$intp->iron_details_id)->update([
            'deliveryNote_id'=>$pnumber,
         ]);
       }

       ///clear all temparry dbs
       tempPaddeltable::where('tempGetpassid',$this->tempGetpassid)->delete();
       tempIrontable::where('tempGetpassid',$this->tempGetpassid)->delete();
       GetpassTempItemsDetails::where('tempGetpassid',$this->tempGetpassid)->delete();
       GeatpassTempDetails::where('tempGetpassid',$this->tempGetpassid)->delete();

         return redirect()->to('/view-getpass/'.$pnumber);
         toastr()->success('Paddle removed successfully!','Congrats');
         $this->reset();

    }





    public function render(Request $request)
    {
        $this->tempGetpassid = $request->tempGetpassid;
        $getpassDetails = GeatpassTempDetails::join('customers_details', 'customers_details.customers_id', '=', 'geatpass_temp_details.customers_id')
            ->where('geatpass_temp_details.tempGetpassid', $request->tempGetpassid)
            ->get();
        $custamers = CustomersDetails::all();

        $irDetails = IronDetails::where('iron_details.iron_details_status', '=', '')->where('iron_details.deliveryNote_id', '=',null)->orwhere('iron_details.deliveryNote_id', '=','')->orwhere('iron_details.iron_details_status', '=', null)->get();
        $Pdtails = paddleDetails::where('paddle_details.paddle_details_status', '=', '')->where('paddle_details.deliveryNote_id', '=', null)->orwhere('paddle_details.deliveryNote_id', '=', '')->orwhere('paddle_details.paddle_details_status', '=', null)->get();

        $tempIron = tempIrontable::where('tempGetpassid', '=', $request->tempGetpassid)->get();
        $tempPaddle = tempPaddeltable::where('tempGetpassid', '=', $request->tempGetpassid)->get();

        $mclist = MachinListDetails::join('machin_type_details', 'machin_type_details.machin_type_details_id', '=', 'machin_list_details.machin_type_details_id')->join('machin_brand_details', 'machin_brand_details.machin_brand_details_id', '=', 'machin_list_details.machin_brand_details_id')->join('machin_model_details', 'machin_model_details.machin_model_details_id', '=', 'machin_list_details.machin_model_details_id')->where('machin_list_details.machin_list_details_status','=','')->orwhere('machin_list_details.machin_list_details_status','=',null)->get();

        $tepmachinlist = GetpassTempItemsDetails::join('machin_type_details', 'machin_type_details.machin_type_details_id', '=', 'getpass_temp_items_details.machin_type_details_id')
            ->join('machin_list_details', 'machin_list_details.machin_list_details_id', '=', 'getpass_temp_items_details.machin_list_details_id')
            ->where('getpass_temp_items_details.tempGetpassid', '=', $request->tempGetpassid)
            ->get();

        // $mclist=MachinListDetails::all();
        return view('livewire.gate-pass.gate-pass', [
            'mclist' => $mclist,
            'custamers' => $custamers,
            'getpassDetails' => $getpassDetails,
            'tempGetpassid' => $request->tempGetpassid,
            'tepmachinlist' => $tepmachinlist,
            'irDetails' => $irDetails,
            'Pdtails' => $Pdtails,
            'tempIron' => $tempIron,
            'tempPaddle' => $tempPaddle,
        ])
            ->layout('livewire.system.template.template')
            ->title('New Geat Pass');
    }
}
