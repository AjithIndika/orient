<?php

namespace App\Livewire\MachineList;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;
use App\Helper\apirequest;
use Illuminate\Support\Facades\Auth;
use App\Models\MachinListDetails;
use App\Models\BoxDetails;
use App\Models\IronDetails;
use App\Models\paddleDetails;

use App\Models\Branch;
use App\Models\MachinBrandDetails;
use App\Models\MachinModelDetails;
use App\Models\MachinTypeDetails;

use Livewire\Component;

class MachineList extends Component
{
    public $pnumber; //

    public $box_details; //
    public $machin_brand_details;
    public $machin_model_details;
    public $machin_type_details;
    public $paddle_details;
    public $iron_details;
    public $machin_list_details_daily_rent;
    public $machin_list_details_note;
    public $branches;
    public $machin_list_details_register_user;
    public $machin_list_details_register_date_time;
    public $machin_list_details_status;
    public $machin_list_details;
    public $box_details_id;

    ///paddle
    public $paddle_details_id;
    public $paddle_details_name;
    public $paddle_details_serial_number;
    public $paddle_details_status;

    // machin
    public $machin_list_details_id; //
    public $machin_list_details_barcode; //

    //iron

    public $iron_details_id;
    public $iron_details_name;
    public $iron_details_serial_number;
    public $iron_details_status;

    //branches
    public $branches_id;

    protected $rules = [
        'machin_brand_details' => 'required',
        'machin_type_details' => 'required',
        'machin_model_details' => 'required',
        'machin_list_details_daily_rent' => 'required',
        'branches' => 'required',
    ];

    public function save()
    {
        $validated = $this->validate([
            'machin_brand_details' => 'required',
            'machin_type_details' => 'required',
            'machin_model_details' => 'required',
            'machin_list_details_daily_rent' => 'required',
            'branches' => 'required',
        ]);

        MachinListDetails::create($this->modelData());
        BoxDetails::where('box_details_id', $this->box_details)->update([
            'box_details_status' => str_pad(date('ymdhms'), 8, '0', STR_PAD_LEFT),
        ]);

        //iron details
        IronDetails::where('iron_details_id', $this->iron_details)->update([
            'iron_details_status' => str_pad(date('ymdhms'), 8, '0', STR_PAD_LEFT),
        ]);

        //paddele
        paddleDetails::where('paddle_details_id', $this->paddle_details)->update([
            'paddle_details_status' => str_pad(date('ymdhms'), 8, '0', STR_PAD_LEFT),
        ]);

        $this->createPostModal = false;


        toastr()->success('' . str_pad(date('ymdhms'), 8, '0', STR_PAD_LEFT) . ' Machine has been saved successfully!', 'Congrats');
        $this->reset();
    }

    /// paddleEdit
    public function paddleremove(int $machin_list_details_id)
    {
        $edata = MachinListDetails::where('machin_list_details_id', $machin_list_details_id)->first();
        if ($edata) {
            $this->paddle_details_id = $edata->paddle_details_id;
            $this->machin_list_details_id = $edata->machin_list_details_id;
        } else {
        }
        $this->dispatch('paddlerremove-modal');
    }

    //remove paddel

    public function paddleupdate()
    {
        paddleDetails::where('paddle_details_id', $this->paddle_details_id)->update(['paddle_details_status' => '']);
        MachinListDetails::where('paddle_details_id', $this->paddle_details_id)->update(['paddle_details_id' => '']);
        toastr()->success('Paddle removed successfully!', 'Congrats');
    }

    public function paddleAdd(int $machin_list_details_id)
    {
        $edata = MachinListDetails::where('machin_list_details_id', $machin_list_details_id)->first();
        if ($edata) {
            $this->machin_list_details_id = $edata->machin_list_details_id;
            $this->machin_list_details_barcode = $edata->machin_list_details_barcode;
        } else {
        }
        $this->dispatch('pddleAdd-modal');
    }

    public function paddlesave()
    {
        paddleDetails::where('paddle_details_id', $this->paddle_details)->update(['paddle_details_status' => $this->machin_list_details_barcode]);
        MachinListDetails::where('machin_list_details_id', $this->machin_list_details_id)->update(['paddle_details_id' => $this->paddle_details]);
        toastr()->success('Paddle attached successfully!', 'Congrats');
    }

    public function boxAdd(int $machin_list_details_id)
    {
        $edata = MachinListDetails::where('machin_list_details_id', $machin_list_details_id)->first();
        if ($edata) {
            $this->machin_list_details_id = $edata->machin_list_details_id;
            $this->machin_list_details_barcode = $edata->machin_list_details_barcode;
        } else {
        }
        $this->dispatch('boxAdd-modal');
    }

    public function paddelsave()
    {
        // pddle
        paddleDetails::where('paddle_details_id', $this->paddle_details)->update(['paddle_details_status' => $this->machin_list_details_barcode]);
        MachinListDetails::where('machin_list_details_id', $this->machin_list_details_id)->update(['paddle_details_id' => $this->paddle_details]);
        toastr()->success('Paddle attached successfully!', 'Congrats');
    }

    public function modelData()
    {
        // $this->validate();

        return [
            'machin_list_details_barcode' => str_pad(date('ymdhms'), 8, '0', STR_PAD_LEFT),
            'box_details_id' => $this->box_details,
            'machin_brand_details_id' => $this->machin_brand_details,
            'machin_model_details_id' => $this->machin_model_details,
            'machin_type_details_id' => $this->machin_type_details,
            'paddle_details_id' => $this->paddle_details,
            'machin_list_details_daily_rent' => $this->machin_list_details_daily_rent,
            'machin_list_details_note' => $this->machin_list_details_note,
            'branches_id' => $this->branches,
            'iron_details_id' => $this->iron_details,
            'machin_list_details_register_user' => Auth::user()->name,
            'machin_list_details_register_date_time' => date('Y-m-d H:i:s'),
            // 'machin_list_details_status'=>//
        ];
    }

    //all

    /// box sn
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

    public static function branchname($branches_id)
    {
        echo Branch::where('branches_id', $branches_id)->value('branches_name');
    }

    // iron remove and add

    public function ironview(int $machin_list_details_id)
    {
        $edata = MachinListDetails::where('machin_list_details_id', $machin_list_details_id)->first();
        if ($edata) {
            $this->iron_details_id = $edata->iron_details_id;
            $this->machin_list_details_id = $edata->machin_list_details_id;
        } else {
        }
        $this->dispatch('ironremove-modal');
    }

    public function ironremove()
    {
        IronDetails::where('iron_details_id', $this->iron_details_id)->update(['iron_details_status' => '']);
        MachinListDetails::where('iron_details_id', $this->iron_details_id)->update(['iron_details_id' => '']);
        toastr()->success('Iron has been remove successfully!', 'Congrats');
    }

    public function ironlist(int $machin_list_details_id)
    {
        $edata = MachinListDetails::where('machin_list_details_id', $machin_list_details_id)->first();
        if ($edata) {
            $this->machin_list_details_id = $edata->machin_list_details_id;
            $this->machin_list_details_barcode = $edata->machin_list_details_barcode;
        } else {
        }
        $this->dispatch('iron-add');
    }

    public function ironsave()
    {
        IronDetails::where('iron_details_id', $this->iron_details)->update(['iron_details_status' => $this->machin_list_details_barcode]);
        MachinListDetails::where('machin_list_details_id', $this->machin_list_details_id)->update(['iron_details_id' => $this->iron_details]);
        toastr()->success('' . $this->machin_list_details_barcode . '  Iron Update successfully!', 'Congrats');
    }

    // box update
    public function boxshow(int $machin_list_details_id)
    {
        $edata = MachinListDetails::where('machin_list_details_id', $machin_list_details_id)->first();
        if ($edata) {
            $this->box_details_id = $edata->box_details_id;
            $this->machin_list_details_id = $edata->machin_list_details_id;
        } else {
        }
        $this->dispatch('boxshow-remove-modal');
    }

    public function boxremove()
    {
        BoxDetails::where('box_details_id', $this->box_details_id)->update(['box_details_status' => '']);
        MachinListDetails::where('machin_list_details_id', $this->machin_list_details_id)->update(['box_details_id' => '']);
        toastr()->success('Box has been remove successfully!', 'Congrats');
    }

    public function boxsave()
    {
        BoxDetails::where('box_details_id', $this->box_details)->update(['box_details_status' => $this->machin_list_details_barcode]);
        MachinListDetails::where('machin_list_details_id', $this->machin_list_details_id)->update(['box_details_id' => $this->box_details]);
        toastr()->success('Box attached successfully!', 'Congrats');
    }

    public function machinUpdate(int $machin_list_details_id)
    {
        $edata = MachinListDetails::where('machin_list_details_id', $machin_list_details_id)->first();
        if ($edata) {
            $this->machin_list_details_daily_rent = $edata->machin_list_details_daily_rent;
            $this->machin_list_details_id = $edata->machin_list_details_id;
            $this->branches_id = $edata->branches_id;
        } else {
        }
        $this->dispatch('update_daily_reant');
    }

    public function machinupdatteSave()
    {
        MachinListDetails::where('machin_list_details_id', $this->machin_list_details_id)->update([
            'branches_id' => $this->branches_id,
            'machin_list_details_daily_rent' => $this->machin_list_details_daily_rent,
        ]);
        toastr()->success('Box attached successfully!', 'Congrats');
    }

    public function render()
    {
        $data = MachinListDetails::all();
        $branch = Branch::all();
        $mbrand = MachinBrandDetails::all();
        $mtype = MachinTypeDetails::all();
        $mmodel = MachinModelDetails::all();
        $mbox = BoxDetails::where('box_details_status', '=', null)->where('deliveryNote_id', '=', null)->orwhere('box_details_status', '=', '')->orwhere('deliveryNote_id', '=',' null')->get();
        $mpaddle = paddleDetails::where('paddle_details_status', '=', '')->where('deliveryNote_id', '=', null)->get();
        $miron = IronDetails::where('iron_details_status', '=', '')->where('deliveryNote_id', '=', null)->get();

        $mclist = MachinListDetails::join('machin_type_details', 'machin_type_details.machin_type_details_id', '=', 'machin_list_details.machin_type_details_id')->join('machin_brand_details', 'machin_brand_details.machin_brand_details_id', '=', 'machin_list_details.machin_brand_details_id')->join('machin_model_details', 'machin_model_details.machin_model_details_id', '=', 'machin_list_details.machin_model_details_id')->get();

        return view('livewire.machine-list.machine-list', ['data' => $data, 'branch' => $branch, 'mbrand' => $mbrand, 'mtype' => $mtype, 'mmodel' => $mmodel, 'mbox' => $mbox, 'mpaddle' => $mpaddle, 'miron' => $miron, 'mclist' => $mclist])
            ->layout('livewire.system.template.template')
            ->title('Machine List');
    }
}
