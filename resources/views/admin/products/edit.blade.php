@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <h5 class="alert alert-success mb-2">{{ session('message') }}</h5>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Edit Products
                    <a href="{{ url('admin/products') }}" class="btn btn-danger btn-sm text-white float-end">BACK</a>
                </h3>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-warning">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form action="{{ url('admin/products/' .$product->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                                Home
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">
                                SEO Tags
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">
                                Details
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">
                                Product Image
                            </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="variation-tab" data-bs-toggle="tab" data-bs-target="#variation-tab-pane" type="button" role="tab" aria-controls="variation-tab-pane" aria-selected="false">
                                Product Variation
                            </button>
                        </li>

                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <!-- Home Tab -->
                        <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="mb-3">
                                <label>Select Category</label>
                                <select name="category_id" class="form-control" id="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Product Name</label>
                                <input type="text" value="{{ $product->name }}" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Product Slug</label>
                                <input type="text" name="slug" value="{{ $product->slug }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Select Brand</label>
                                <select name="brand" class="form-control" id="brand">
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->name }}" {{ $brand->name == $product->brand ? 'selected' : '' }}>
                                            {{ $brand->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Small Description (500 Words)</label>
                                <textarea name="small_description" class="form-control" rows="4">{{ $product->small_description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="4">{{ $product->description }}</textarea>
                            </div>
                        </div>

                        <!-- SEO Tags Tab -->
                        <div class="tab-pane fade border p-3" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                            <div class="mb-3">
                                <label>Meta Title</label>
                                <input type="text" name="meta_title" value="{{ $product->meta_title }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="4">{{ $product->meta_description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label>Meta Keyword</label>
                                <textarea name="meta_keyword" class="form-control" rows="4">{{ $product->meta_keyword }}</textarea>
                            </div>
                        </div>

                        <!-- Details Tab -->
                        <div class="tab-pane fade border p-3" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Original Price</label>
                                        <input type="text" name="original_price" value="{{ $product->original_price }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Selling Price</label>
                                        <input type="text" name="selling_price" value="{{ $product->selling_price }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Quantity</label>
                                        <input type="number" name="quantity" value="{{ $product->quantity }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Trending</label>
                                        <input type="checkbox" name="trending" {{ $product->trending == '1' ? 'checked':'' }} style="width: 50px; height: 50px;">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Featured</label>
                                        <input type="checkbox" name="featured" {{ $product->featured == '1' ? 'checked':'' }} style="width: 50px; height: 50px;">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Status</label>
                                        <input type="checkbox" name="status" {{ $product->status == '1' ? 'checked':'' }} style="width: 50px; height: 50px;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Product Image Tab -->
                        <div class="tab-pane fade border p-3" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                            <div class="mb-3">
                                <label>Upload Product Images</label>
                                <input type="file" name="image[]" multiple class="form-control">
                            </div>
                            <div>
                                @if ($product->productImages)
                                    <div class="row">
                                        @foreach ($product->productImages as $image)
                                            <div class="col-md-2">
                                                <img src="{{ asset($image->image) }}" style="width: 80px; height: 80px;" class="me-4 border" alt="Img">
                                                <a href="{{ url('admin/product-image/'.$image->id.'/delete') }}" class="d-block">Remove</a>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <h5>No Image Added</h5>
                                @endif
                            </div>
                        </div>

                        <!-- Product Variation Tab -->
                        <div class="tab-pane fade border p-3" id="variation-tab-pane" role="tabpanel" aria-labelledby="variation-tab" tabindex="0">
                            <div class="mb-3">
                                <label>Product Variations</label>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Combinations</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Image</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($product->variationCombinations as $combination)
                                            <tr>
                                                <td>
                                                    @php
                                                        $parts = explode('|', $combination->combination_string);
                                                        foreach($parts as $part) {
                                                            list($attr, $val) = explode(':', $part);
                                                            echo "<div><strong>$attr:</strong> $val</div>";
                                                        }
                                                    @endphp
                                                </td>
                                                <td>
                                                    <input type="number"
                                                           name="variations[{{ $combination->id }}][price]"
                                                           value="{{ $combination->price }}"
                                                           class="form-control variation-input"
                                                           data-variation-id="{{ $combination->id }}"
                                                           data-field="price">
                                                </td>
                                                <td>
                                                    <input type="number"
                                                           name="variations[{{ $combination->id }}][quantity]"
                                                           value="{{ $combination->quantity }}"
                                                           class="form-control variation-input"
                                                           data-variation-id="{{ $combination->id }}"
                                                           data-field="quantity">
                                                </td>
                                                <td>
                                                    @if($combination->image)
                                                        <img src="{{ asset($combination->image) }}"
                                                             width="50px" height="50px"
                                                             class="mb-2 d-block"
                                                             alt="Variation Image">
                                                    @endif
                                                    <input type="file"
                                                           name="variations[{{ $combination->id }}][image]"
                                                           class="form-control variation-image"
                                                           data-variation-id="{{ $combination->id }}">
                                                </td>
                                                <td>
                                                    <button type="button"
                                                            class="btn btn-danger btn-sm delete-variation"
                                                            data-variation-id="{{ $combination->id }}">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .radio-controls {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 5px;
    }

    .radio-controls label {
        font-weight: 500;
        color: #6c757d;
    }

    .btn-check:checked + .btn-outline-primary {
        background-color: #0d6efd;
        color: white;
    }

    .btn-outline-primary {
        min-width: 60px;
    }

    .variation_values_container {
        margin-top: 15px;
        padding: 10px;
        border: 1px solid #dee2e6;
        border-radius: 5px;
    }

    .variation_values_container li {
        list-style: none;
        margin-bottom: 8px;
    }

    .variation_values_container input[type="checkbox"] {
        margin-right: 8px;
    }

    .delete-variation {
        transition: all 0.3s;
    }

    .delete-variation:hover {
        transform: scale(1.05);
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        // Auto-save variation changes
        let saveTimeout;
        $('.variation-input').on('change', function() {
            clearTimeout(saveTimeout);
            const input = $(this);
            const variationId = input.data('variation-id');
            const field = input.data('field');
            const value = input.val();

            saveTimeout = setTimeout(function() {
                $.ajax({
                    url: `/admin/products/variations/${variationId}`,
                    type: 'PUT',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        [field]: value
                    },
                    success: function(response) {
                        toastr.success('Updated successfully');
                    },
                    error: function(xhr) {
                        toastr.error('Error updating variation');
                        console.error(xhr);
                    }
                });
            }, 500);
        });

        // Handle image upload
        $('.variation-image').on('change', function() {
            const input = $(this);
            const variationId = input.data('variation-id');
            const formData = new FormData();
            formData.append('image', input.prop('files')[0]);
            formData.append('_method', 'PUT');

            $.ajax({
                url: `/admin/products/variations/${variationId}/image`,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    toastr.success('Image updated successfully');
                    // Refresh the image preview
                    if (response.image_url) {
                        input.prev('img').attr('src', response.image_url);
                    }
                },
                error: function(xhr) {
                    toastr.error('Error updating image');
                    console.error(xhr);
                }
            });
        });

        // Delete variation
        $('.delete-variation').click(function() {
            const button = $(this);
            const variationId = button.data('variation-id');

            if (confirm('Are you sure you want to delete this variation?')) {
                $.ajax({
                    url: `/admin/products/variations/${variationId}`,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        button.closest('tr').fadeOut(300, function() {
                            $(this).remove();
                        });
                        toastr.success('Variation deleted successfully');
                    },
                    error: function(xhr) {
                        toastr.error('Error deleting variation');
                        console.error(xhr);
                    }
                });
            }
        });
    });

    function updateVariationValues(selectElement) {
        var selectedVariation = selectElement.options[selectElement.selectedIndex].value;
        var variationValues = @json($variations->pluck('values', 'id'));

        // Find the values container within the variation-controls div
        var valuesContainer = selectElement.nextElementSibling.querySelector('.variation_values_container');
        valuesContainer.innerHTML = '';

        if (selectedVariation && variationValues[selectedVariation]) {
            var values = variationValues[selectedVariation];
            values.forEach(function(value) {
                var listItem = document.createElement('li');
                var checkbox = document.createElement('input');
                checkbox.type = 'checkbox';
                checkbox.name = 'variation_values[' + selectedVariation + '][]';
                checkbox.value = value.id;
                listItem.appendChild(checkbox);
                listItem.appendChild(document.createTextNode(value.name));
                valuesContainer.appendChild(listItem);
            });
        }
    }
</script>
@endpush
