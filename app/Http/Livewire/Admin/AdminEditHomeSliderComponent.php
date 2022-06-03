<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\WithFileUploads;
class AdminEditHomeSliderComponent extends Component
{
    use WithFileuploads;
    public $title;
    public $subtitle;
    public $newImage;
    public $image;
    public $link;
    public $status;
    public $price;
    public $slide_id;
    public function mount($slide_id){
        $slider=HomeSlider::find($slide_id);
        $this->title=$slider->title;
        $this->subtitle=$slider->subtitle;
        $this->image=$slider->image;
        $this->link=$slider->link;
        $this->status=$slider->status;
        $this->price=$slider->price;
        $this->slider_id=$slider->slider_id;
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
    public function updateSlider(){
        $this->validate([
            'title'=>'required',
            'subtitle'=>'required|unique:homesliders',
            'image'=>'required',
            'link'=>'required',
            'regular_price'=>'required',
            'price'=>'numeric',
        ]);
        $slider=HomeSlider::find($this->slide_id);
        $slider->title=$this->title;
        $slider->subtitle=$this->subtitle;
        if($this->newImage){
            $imageName=Carbon::now()->timestamp . '.' . $this->newImage->extension();
            $this->newImage->storeAs('sliders',$imageName);
            $slider->image=$imageName;
        }
        
        $slider->link=$this->link;
        $slider->status=$this->status;
        $slider->price=$this->price;
        $slider->save();
        session()->flash('message','Slider has been updated');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-home-slider-component')->layout('layouts.base');
    }
}
