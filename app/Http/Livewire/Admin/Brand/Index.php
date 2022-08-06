<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name, $slug, $status;

    public function render()
    {
        $brands = Brand::paginate(5);
        return view('livewire.admin.brand.index', ['brands' => $brands])->extends('layouts.master')->section('content');
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'slug' => 'required',
            'status' => 'required|in:visible,hidden'
        ];
    }

    public function store()
    {
        $this->validate();
        Brand::create([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status

        ]);
        session()->flash('success', 'Brand Added Succesfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetFields();
        return redirect()->route('brand.index');


    }

    public function resetFields()
    {
        $this->name = null;
        $this->slug = null;
        $this->status = null;
    }


}
