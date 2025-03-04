@extends('layouts.admin')

@section('content')

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Add Products
                        <a href="{{ url('admin/products') }}" class="btn btn-danger btn-sm text-white float-end">BACK</a>
                    </h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                                <div>
                                    {{ $error }}
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ url('admin/products') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home-tab-pane" type="button" role="tab"
                                    aria-controls="home-tab-pane" aria-selected="true">
                                    Home
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="seotag-tab" data-bs-toggle="tab"
                                    data-bs-target="#seotag-tab-pane" type="button" role="tab"
                                    aria-controls="seotag-tab-pane" aria-selected="false">
                                    SEO Tags
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="details-tab" data-bs-toggle="tab"
                                    data-bs-target="#details-tab-pane" type="button" role="tab"
                                    aria-controls="details-tab-pane" aria-selected="false">
                                    Details
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="image-tab" data-bs-toggle="tab"
                                    data-bs-target="#image-tab-pane" type="button" role="tab"
                                    aria-controls="image-tab-pane" aria-selected="false">
                                    Product Image
                                </button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="variation-tab" data-bs-toggle="tab"
                                    data-bs-target="#variation-tab-pane" type="button" role="tab"
                                    aria-controls="variation-tab-pane" aria-selected="false">
                                    Product Variation
                                </button>
                            </li>

                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel"
                                aria-labelledby="home-tab" tabindex="0">
                                <div class="mb-3">
                                    <label>Category</label>
                                    <select name="category_id" class="form-control" id="category_id">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Product Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Product Slug</label>
                                    <input type="text" name="slug" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Select Brand</label>
                                    <select name="brand" class="form-control" id="brand">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Small Description (500 Words)</label>
                                    <textarea name="small_description" class="form-control" rows="4"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="tab-pane fade border p-3" id="seotag-tab-pane" role="tabpanel"
                                aria-labelledby="seotag-tab" tabindex="0">
                                <div class="mb-3">
                                    <label>Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Meta Description</label>
                                    <textarea name="meta_description" class="form-control" rows="4"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label>Meta Keyword</label>
                                    <textarea name="meta_keyword" class="form-control" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="tab-pane fade border p-3" id="details-tab-pane" role="tabpanel"
                                aria-labelledby="details-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Original Price</label>
                                            <input type="text" name="original_price" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Selling Price</label>
                                            <input type="text" name="selling_price" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Quantity</label>
                                            <input type="number" name="quantity" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Trending</label>
                                            <input type="checkbox" name="trending" style="width:20px; height:20px;">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Featured</label>
                                            <input type="checkbox" name="featured" style="width:20px; height:20px;">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Status</label>
                                            <input type="checkbox" name="status" style="width:20px; height:20px;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade border p-3" id="image-tab-pane" role="tabpanel"
                                aria-labelledby="image-tab" tabindex="0">
                                <div class="mb-3">
                                    <label>Upload Product Images</label>
                                    <input type="file" name="image[]" multiple class="form-control">
                                </div>
                            </div>

                            <div class="tab-pane fade border p-3" id="variation-tab-pane" role="tabpanel"
                                aria-labelledby="variation-tab" tabindex="0">
                                <div class="mb-3">
                                    <label>Select Attribute</label>
                                    <div class="row" id="attribute_containers">
                                        <div class="attribute-container mb-3">
                                            <select name="select_variation[]" class="select_variation form-control" style="width: 200px;"
                                                onchange="updateVariationValues(this)">
                                                <option value="">Select Variation</option>
                                                @foreach ($variations as $variation)
                                                    <option value="{{ $variation->id }}">{{ $variation->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="variation-controls mt-2">
                                                <div class="radio-controls d-flex gap-4 mb-2">
                                                    <div class="use-price-control">
                                                        <label class="d-block mb-2">Use for Price:</label>
                                                        <div class="btn-group" role="group">
                                                            <input type="radio" name="use_for_price[0]" value="1" class="btn-check" id="price-yes-0">
                                                            <label class="btn btn-outline-primary" for="price-yes-0">Yes</label>

                                                            <input type="radio" name="use_for_price[0]" value="0" class="btn-check" id="price-no-0" checked>
                                                            <label class="btn btn-outline-primary" for="price-no-0">No</label>
                                                        </div>
                                                    </div>
                                                    <div class="use-image-control">
                                                        <label class="d-block mb-2">Use for Image:</label>
                                                        <div class="btn-group" role="group">
                                                            <input type="radio" name="use_for_image[0]" value="1" class="btn-check" id="image-yes-0">
                                                            <label class="btn btn-outline-primary" for="image-yes-0">Yes</label>

                                                            <input type="radio" name="use_for_image[0]" value="0" class="btn-check" id="image-no-0" checked>
                                                            <label class="btn btn-outline-primary" for="image-no-0">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="variation_values_container">
                                                    <!-- Values will be added here -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary" onclick="addAttributeSelection()">Add
                                        Attribute</button>
                                    <button type="button" class="btn btn-primary" onclick="createVariations()">Create
                                        Variations</button>
                                </div>
                                <div id="created_variations">
                                    <!-- Created variations will be displayed here -->
                                </div>
                            </div>
                        </div>


                        <div>
                            <button type="submit" class="btn btn-success">Save Product</button>
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
</style>
@endpush

@section('scripts')
    <script>
        function updateVariationValues(selectElement) {
            var selectedVariation = selectElement.options[selectElement.selectedIndex].value;
            var variationValues = @json($variations->pluck('values', 'id'));

            // Find the values container within the variation-controls div
            var valuesContainer = selectElement.nextElementSibling.querySelector('.variation_values_container');
            valuesContainer.innerHTML = '';

            if (selectedVariation && variationValues[selectedVariation]) {
                var values = variationValues[selectedVariation];

                values.forEach(function(value) {
                    var checkbox = document.createElement('input');
                    checkbox.type = 'checkbox';
                    checkbox.name = 'variation_values[' + selectedVariation + '][]';
                    checkbox.value = value;

                    var label = document.createElement('label');
                    label.appendChild(checkbox);
                    label.appendChild(document.createTextNode(' ' + value));

                    var listItem = document.createElement('li');
                    listItem.appendChild(label);

                    valuesContainer.appendChild(listItem);
                });
            }
        }

        function addAttributeSelection() {
            var attributeContainers = document.getElementById('attribute_containers');
            var variationCount = document.querySelectorAll('.attribute-container').length;
            var newAttributeContainer = document.createElement('div');
            newAttributeContainer.classList.add('attribute-container', 'mb-3');

            newAttributeContainer.innerHTML = `
            <select name="select_variation[]" class="select_variation form-control" style="width: 200px;" onchange="updateVariationValues(this)">
                <option value="">Select Variation</option>
                @foreach ($variations as $variation)
                    <option value="{{ $variation->id }}">{{ $variation->name }}</option>
                @endforeach
            </select>
            <div class="variation-controls mt-2">
                <div class="radio-controls d-flex gap-4 mb-2">
                    <div class="use-price-control">
                        <label class="d-block mb-2">Use for Price:</label>
                        <div class="btn-group" role="group">
                            <input type="radio" name="use_for_price[${variationCount}]" value="1" class="btn-check" id="price-yes-${variationCount}">
                            <label class="btn btn-outline-primary" for="price-yes-${variationCount}">Yes</label>

                            <input type="radio" name="use_for_price[${variationCount}]" value="0" class="btn-check" id="price-no-${variationCount}" checked>
                            <label class="btn btn-outline-primary" for="price-no-${variationCount}">No</label>
                        </div>
                    </div>
                    <div class="use-image-control">
                        <label class="d-block mb-2">Use for Image:</label>
                        <div class="btn-group" role="group">
                            <input type="radio" name="use_for_image[${variationCount}]" value="1" class="btn-check" id="image-yes-${variationCount}">
                            <label class="btn btn-outline-primary" for="image-yes-${variationCount}">Yes</label>

                            <input type="radio" name="use_for_image[${variationCount}]" value="0" class="btn-check" id="image-no-${variationCount}" checked>
                            <label class="btn btn-outline-primary" for="image-no-${variationCount}">No</label>
                        </div>
                    </div>
                </div>
                <div class="variation_values_container">
                    <!-- Values will be added here -->
                </div>
            </div>
        `;

            attributeContainers.appendChild(newAttributeContainer);
        }

        function createVariations() {
            var attributeContainers = document.querySelectorAll('.attribute-container');
            var selectedAttributes = [];

            attributeContainers.forEach(function(container, index) {
                var select = container.querySelector('.select_variation');
                var selectedVariation = select.options[select.selectedIndex].text;

                if (selectedVariation) {
                    // Only get checkboxes from variation_values_container
                    var checkboxes = container.querySelector('.variation_values_container').querySelectorAll('input[type="checkbox"]:checked');
                    var selectedValues = Array.from(checkboxes).map(function(checkbox) {
                        return checkbox.value;
                    });

                    if (selectedValues.length > 0) {
                        // Get radio button values
                        var useForPrice = container.querySelector(`input[name="use_for_price[${index}]"]:checked`).value === "1";
                        var useForImage = container.querySelector(`input[name="use_for_image[${index}]"]:checked`).value === "1";

                        selectedAttributes.push({
                            attribute: selectedVariation,
                            values: selectedValues,
                            useForPrice: useForPrice,
                            useForImage: useForImage
                        });
                    }
                }
            });

            var variations = generateCombinations(selectedAttributes);
            displayVariations(selectedAttributes, variations);
        }

        function generateCombinations(attributes) {
            if (attributes.length === 0) {
                return [];
            }

            var combinations = attributes[0].values.map(function(value) {
                return [value];
            });

            for (var i = 1; i < attributes.length; i++) {
                var currentAttributeValues = attributes[i].values;
                var newCombinations = [];

                combinations.forEach(function(combination) {
                    currentAttributeValues.forEach(function(value) {
                        newCombinations.push(combination.concat([value]));
                    });
                });

                combinations = newCombinations;
            }

            return combinations;
        }

        function displayVariations(attributes, variations) {
            var createdVariationsContainer = document.getElementById('created_variations');
            createdVariationsContainer.innerHTML = '';

            var table = document.createElement('table');
            table.classList.add('table', 'table-bordered', 'table-responsive');

            // Create table headers
            var thead = document.createElement('thead');
            var headerRow = document.createElement('tr');
            attributes.forEach(function(attribute) {
                var th = document.createElement('th');
                th.textContent = attribute.attribute;
                headerRow.appendChild(th);
            });

            var priceTh = document.createElement('th');
            priceTh.textContent = 'Price';
            headerRow.appendChild(priceTh);

            var quantityTh = document.createElement('th');
            quantityTh.textContent = 'Quantity';
            headerRow.appendChild(quantityTh);

            var imageTh = document.createElement('th');
            imageTh.textContent = 'Image';
            headerRow.appendChild(imageTh);

            var removeTh = document.createElement('th');
            removeTh.textContent = 'Remove';
            headerRow.appendChild(removeTh);

            thead.appendChild(headerRow);
            table.appendChild(thead);

            // Create table body
            var tbody = document.createElement('tbody');
            variations.forEach(function(variation, index) {
                var row = document.createElement('tr');

                // Create combination string for hidden input
                var combinationParts = [];
                variation.forEach(function(value, vIndex) {
                    var td = document.createElement('td');
                    td.textContent = value;
                    row.appendChild(td);

                    combinationParts.push(`${attributes[vIndex].attribute}:${value}`);
                });

                var combinationString = combinationParts.join('|');

                // Add hidden input for combination string
                var hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'combinations[]';
                hiddenInput.value = combinationString;
                row.appendChild(hiddenInput);

                // Add inputs for price, quantity, and image
                var priceTd = document.createElement('td');
                priceTd.innerHTML = `<input type="number" name="price[]" class="form-control" required>`;
                row.appendChild(priceTd);

                var quantityTd = document.createElement('td');
                quantityTd.innerHTML = `<input type="number" name="quantity[]" class="form-control" min="0" step="1" required>`;
                row.appendChild(quantityTd);

                var imageTd = document.createElement('td');
                imageTd.innerHTML = `<input type="file" name="variation_image[]" class="form-control">`;
                row.appendChild(imageTd);

                // Remove button
                var removeTd = document.createElement('td');
                removeTd.innerHTML = '<button type="button" class="btn btn-danger" onclick="removeVariationRow(this)">Remove</button>';
                row.appendChild(removeTd);

                tbody.appendChild(row);
            });
            table.appendChild(tbody);

            createdVariationsContainer.appendChild(table);
        }

        function removeVariationRow(button) {
            var row = button.closest('tr');
            row.remove();
        }
    </script>
@endsection
