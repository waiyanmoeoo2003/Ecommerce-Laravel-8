<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
class AdminEditCategoryComponent extends Component
{
    public $category_slug;
    public $category_id;
    public $name;
    public $slug;
    public function mount($category_slug){
        $this->category_slug=$category_slug;
        $category=Category::where('slug',$category_slug)->first();//old
        $this->category_id=$category->id;//1
        $this->name=$category->name;//
        $this->slug=$category->slug;
    }
    public function updated($fields){
        $this->validateOnly($fields,[
            'name'=>'required',
            'slug'=>'required|unique:categories'
        ]);
    }
    public function generateslug(){
        $this->slug=Str::slug($this->name);
    }
    public function updateCategory(){
        $this->validate([
            'name'=>'required',
            'slug'=>'required|unique:categories'
        ]);
        $category=Category::find($this->category_id);//old
        $category->slug=$this->slug;
        $category->name=$this->name;
        $category->save();
        session()->flash('message','Category has been updated');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-category-component')->layout('layouts.base');
    }
}
