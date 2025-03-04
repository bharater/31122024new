<?php
namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    // Declare the category_id public property
    public $category_id, $name, $slug, $status, $brand_id, $isEditing = false;

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:brands,slug,' . $this->brand_id,
            'status' => 'nullable|boolean',
            'category_id' => 'required|exists:categories,id',  // Validate category_id
        ];
    }

    public function resetInput()
    {
        $this->category_id = null;
        $this->name = null;
        $this->slug = null;
        $this->status = null;
        $this->brand_id = null;
        $this->isEditing = false;
    }

    public function storeBrand()
    {
        $validatedData = $this->validate();

        Brand::create([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status ? '1' : '0',
            'category_id' => $this->category_id, // Save category_id to the brand
        ]);

        session()->flash('message', 'Brand Added Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function editBrand(int $brand_id)
    {
        $this->isEditing = true;
        $this->brand_id = $brand_id;
        $brand = Brand::findOrFail($brand_id);
        $this->name = $brand->name;
        $this->slug = $brand->slug;
        $this->status = $brand->status;
        $this->category_id = $brand->category_id;  // Set category_id when editing
    }

    public function updateBrand()
    {
        $validatedData = $this->validate();

        $brand = Brand::findOrFail($this->brand_id);
        $brand->update([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status ? '1' : '0',
            'category_id' => $this->category_id,  // Update category_id
        ]);

        session()->flash('message', 'Brand Updated Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function deleteBrand($brand_id)
    {
        $this->brand_id = $brand_id;
    }

    public function destroyBrand()
    {
        Brand::findOrFail($this->brand_id)->delete();
        session()->flash('message', 'Brand Deleted Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function render()
    {
        $categories = Category::where('status', '0')->get();
        $brands = Brand::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.brand.index', ['brands' => $brands, 'categories' => $categories])
            ->extends('layouts.admin')
            ->section('content');
    }
}
