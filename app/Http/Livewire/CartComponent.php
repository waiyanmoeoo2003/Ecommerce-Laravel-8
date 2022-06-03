<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Coupon;
class CartComponent extends Component
{
    public $haveCouponCode;
    public $couponCode;
    public $discount;
    public $subtotalAfterDiscount;
    public $taxAfterDiscount;
    public $totalAfterDiscount;
    public function increaseQuantity($rowId)
    {
        $product=Cart::instance('cart')->get($rowId);
        $qty=$product->qty+1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-count-component','refreshComponent');
    }
    public function decreaseQuantity($rowId){
        $product=Cart::instance('cart')->get($rowId);
        $qty=$product->qty-1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-count-component','refreshComponent');
    }
    public function destroy($rowId){
        Cart::instance('cart')->remove($rowId);
        session()->flash('success_message','Item has been removed');
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('sucess_message','Item has been removed');
        
    }
    public function destroyAll(){
        Cart::instance('cart')->destroy();
        $this->emitTo('cart-count-component','refreshComponent');
    }
    public function switchToSaveForLater($rowId){
        $item=Cart::instance('cart')->get($rowId);
        Cart::instance('cart')->remove($rowId);
        Cart::instance('saveforlater')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('success_message','Item has been save for later');
    }
    public function moveToCart($rowId){
        $item=Cart::instance('saveforlater')->get($rowId);
        Cart::instance('saveforlater')->remove($rowId);
        Cart::instance('cart')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('s_success_message','Item has been move to cart');
    }
    public function deleteFromSaveForLater($rowId){
        Cart::instance('saveforlater')->remove($rowId);
        session()->flash('s_success_message','Item has been removed from save for later');
    }
    public function applyCouponCode(){
        $coupon=Coupon::where('code',$this->couponCode)->where('expire_date','>=',Carbon::today())->where('cart_value','<=',Cart::instance('cart')->subtotal())->first();
        if(!$coupon){
            session()->flash('coupon_message','Coupon is invalid');
            return;
        }
        session()->put('coupons',[
            'code'=>$coupon->code,
            'type'=>$coupon->type,
            'value'=>$coupon->value,
            'cart_value'=>$coupon->cart_value
        ]);
    }
    public function calculateDiscounts(){
        if(session()->has('coupons')){
            if(session()->get('coupons')['type'] == 'fixed'){
                $this->discount=session()->get('coupons')['value'];
            }else{
                $this->discount=(Cart::instance('cart')->subtotal() * session()->get('coupons')['value'])/100;
            }
            $this->subtotalAfterDiscount=Cart::instance('cart')->subtotal() - $this->discount;
            $this->taxAfterDiscount=($this->subtotalAfterDiscount * config('cart.tax'))/100;
            $this->totalAfterDiscount=$this->subtotalAfterDiscount + $this->taxAfterDiscount;

        }
    }
    public function removeCoupon(){

           
        session()->forget('coupons');
    }
    public function checkout(){
        if(Auth::check()){
            return redirect()->route('checkout');
        }else{
            return redirect()->route('login');
        }
    }
    public function setAmountForCheckOut(){
        if(!Cart::instance('cart')->count() > 0){
            session()->forget('checkout');
            return;
        }
        
        if(session()->has('coupon')){
            session()->put('checkout',[
                'discount'=>$this->discount,
                'subtotal'=>$this->subtotalAfterDiscount,
                'tax'=>$this->taxAfterDiscount,
                'total'=>$this->totalAfterDiscount
            ]);
        }else{
            session()->put('checkout',[
                'discount'=>0,
                'subtotal'=>Cart::instance('cart')->subtotal(),
                'tax'=>Cart::instance('cart')->tax(),
                'total'=>Cart::instance('cart')->total()
            ]);
        }
    }
    public function render()
    {
        if(session()->has('coupons')){
            if(Cart::instance('cart')->subtotal() < session()->get('coupons')['cart_value']){
                session()->forget('coupons');
            }else{
                $this->calculateDiscounts();
            }
        }
        $this->setAmountForCheckOut();
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
 