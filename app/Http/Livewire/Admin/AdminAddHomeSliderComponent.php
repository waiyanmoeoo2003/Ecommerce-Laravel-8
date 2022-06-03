<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\WithFileUploads;
class AdminAddHomeSliderComponent extends Component
{
    use WithFileuploads;
    public $title;
    public $subtitle;
    public $image;
    public $link;
    public $status;
    public $price;
    public function mount(){
        $this->status=0;

    }
    public function updated($fields){
        $this->validateOnly($fields,[
            'title'=>'required',
            'subtitle'=>'required|unique:homesliders',
            'image'=>'required',
            'link'=>'required',
            'regular_price'=>'required',
            'price'=>'numeric',
        ]);
    }
    public function addSlider(){
        $this->validate([
            'title'=>'required',
            'subtitle'=>'required|unique:homesliders',
            'image'=>'required',
            'link'=>'required',
            'regular_price'=>'required',
            'price'=>'numeric',
        ]);
        $slider=new HomeSlider();
        $slider->title=$this->title;
        $slider->subtitle=$this->subtitle;
        $imageName=Carbon::now()->timestamp.".".$this->image->extension();
        $this->image->storeAs('sliders',$imageName);
        $slider->image=$imageName;
        $slider->link=$this->link;
        $slider->status=$this->status;
        $slider->price=$this->price;
        $slider->save();
        session()->flash('message','Slider has been created');

    }
    public function render()
    {
        return view('livewire.admin.admin-add-home-slider-component')->layout('layouts.base');
    }
}
