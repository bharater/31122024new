// ...existing code...

@push('scripts')
<script>
    function updateVariationValues(selectElement) {
        var selectedVariation = selectElement.options[selectElement.selectedIndex].value;
        var variationValues = @json($variations->map(function($variation) {
            return [
                'id' => $variation->id,
                'name' => $variation->name,
                'values' => $variation->values // This will be automatically transformed from JSON
            ];
        })->keyBy('id'));

        // Find the values container within the variation-controls div
        var valuesContainer = selectElement.nextElementSibling.querySelector('.variation_values_container');
        valuesContainer.innerHTML = '';

        if (selectedVariation && variationValues[selectedVariation]) {
            var variation = variationValues[selectedVariation];
            var values = variation.values;

            if (Array.isArray(values)) {
                values.forEach(function(value) {
                    var listItem = document.createElement('li');

                    var checkbox = document.createElement('input');
                    checkbox.type = 'checkbox';
                    checkbox.name = 'variation_values[' + selectedVariation + '][]';
                    checkbox.value = value;
                    checkbox.id = 'var_' + selectedVariation + '_' + value.replace(/\s+/g, '_');

                    var label = document.createElement('label');
                    label.htmlFor = checkbox.id;
                    label.appendChild(document.createTextNode(' ' + value));

                    listItem.appendChild(checkbox);
                    listItem.appendChild(label);
                    valuesContainer.appendChild(listItem);
                });
            }
        }

        // Refresh any select2 instances if you're using it
        if ($.fn.select2) {
            $('.select_variation').select2();
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

        // Initialize the new select's values
        updateVariationValues(newAttributeContainer.querySelector('.select_variation'));
    }

    // Initialize on page load
    $(document).ready(function() {
        // Initialize existing variations
        $('.select_variation').each(function() {
            updateVariationValues(this);
        });

        // ... rest of your ready function code ...
    });

    // ... rest of your existing functions ...
</script>
@endpush
