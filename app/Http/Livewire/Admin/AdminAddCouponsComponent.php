<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;
class AdminAddCouponsComponent extends Component
{
    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $expire_date;
    public function mount(){
        $this->type='percent';
    }
    public function updated($fields){
        $this->validateOnly($fields,[
            'code'=>'required|unique:coupons',
            
            'value'=>'required',
            'cart_value'=>'required',
            'expire_date'=>'required'
        ]);
    }
    public function storeCoupon(){
        $this->validate([
           'code'=>'required|unique:coupons',
           
           'value'=>'required',
           'cart_value'=>'required',
           'expire_date'=>'required'
        ]);
        $coupon=new Coupon();
        $coupon->code=$this->code;
        $coupon->type=$this->type;
        $coupon->value=$this->value;
        $coupon->cart_value=$this->cart_value;
        $coupon->expire_date=$this->expire_date;
        $coupon->save();
        Session()->flash('message','coupon has been added');


    }
    public function render()
    {
        return view('livewire.admin.admin-add-coupons-component')->layout('layouts.base');
    }
}
