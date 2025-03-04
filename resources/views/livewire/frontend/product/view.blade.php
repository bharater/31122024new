<div>
    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row g-2"> <!-- Add g-2 class to reduce gap between rows -->
                <!-- Product Image Column -->
                <div class="col-md-5 mt-3">
                    <div class="bg-white border rounded shadow-sm">
                        <div class="exzoom" id="exzoom">
                            <div class="exzoom_img_box">
                                <ul class="exzoom_img_ul">
                                    @if($selectedVariationImage)
                                        <li><img src="{{ $selectedVariationImage }}" alt="Variation Image" class="img-fluid"/></li>
                                    @endif
                                    @if(!$selectedVariationImage || !$currentCombination)
                                        @foreach ($product->productImages as $itemImg)
                                            <li><img src="{{ asset($itemImg->image) }}" alt="Product Image" class="img-fluid"/></li>
                                        @endforeach
                                        @php
                                            $displayedImages = [];
                                        @endphp
                                        @foreach ($product->variationCombinations as $combination)
                                            @if($combination->image && !in_array($combination->image, $displayedImages))
                                                <li><img src="{{ asset($combination->image) }}" alt="Variation Image" class="img-fluid"/></li>
                                                @php
                                                    $displayedImages[] = $combination->image;
                                                @endphp
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            <div class="exzoom_nav"></div>
                            <p class="exzoom_btn">
                                <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
                                <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Product Details Column -->
                <div class="col-md-7 mt-3">
                    <div class="product-view bg-white p-4 rounded shadow-sm">
                        <h4 class="product-name fw-bold mb-3">
                            {{ $product->name }}
                        </h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">{{ $product->category->name }}</a></li>
                                <li class="breadcrumb-item active">{{ $product->name }}</li>
                            </ol>
                        </nav>

                        <!-- Price Section -->
                        <div class="mb-3"> <!-- Reduced margin-bottom -->
                            @if($selectedVariationPrice)
                                <span class="selling-price fs-4 fw-bold text-primary">
                                    ${{ $selectedVariationPrice }}
                                </span>
                            @elseif($product->variationCombinations->count() > 0)
                                @php
                                    $minPrice = $product->variationCombinations->min('price');
                                    $maxPrice = $product->variationCombinations->max('price');
                                @endphp
                                <span class="selling-price fs-4 fw-bold text-primary">
                                    ${{ $minPrice }} - ${{ $maxPrice }}
                                </span>
                            @else
                                <span class="selling-price fs-4 fw-bold text-primary">
                                    ${{ $product->selling_price }}
                                </span>
                                @if($product->original_price)
                                    <span class="original-price text-muted text-decoration-line-through ms-2">
                                        ${{ $product->original_price }}
                                    </span>
                                @endif
                            @endif
                        </div>

                        <!-- Quantity Controls -->
                        <div class="mb-3"> <!-- Reduced margin-bottom -->
                            <div class="input-group" style="width: 150px;">
                                <button class="btn btn-outline-secondary" wire:click="decrementQuantity"><i class="fa fa-minus"></i></button>
                                <input type="text" wire:model="quantityCount" readonly class="form-control text-center" />
                                <button class="btn btn-outline-secondary" wire:click="incrementQuantity"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="mb-3"> <!-- Reduced margin-bottom -->
                            <button type="button" wire:click="addToCart({{ $product->id }})" class="btn btn-primary me-2">
                                <i class="fa fa-shopping-cart"></i> Add To Cart
                            </button>
                            <button type="button" wire:click="addToWishList({{ $product->id }})" class="btn btn-outline-danger">
                                <span wire:loading.remove wire:target="addToWishList">
                                    <i class="fa fa-heart"></i> Add To Wishlist
                                </span>
                                <span wire:loading wire:target="addToWishList">
                                    <span class="spinner-border spinner-border-sm" role="status"></span>
                                    Adding...
                                </span>
                            </button>
                        </div>

                        <!-- Variations Section -->
                        <div class="variations-section mb-3"> <!-- Reduced margin-bottom -->
                            <h5 class="mb-2">Available Variations</h5> <!-- Reduced margin-bottom -->
                            @php
                                $combinations = $product->variationCombinations;
                                $attributes = [];

                                // Parse combination strings to get unique attributes and values
                                foreach($combinations as $combination) {
                                    $parts = explode('|', $combination->combination_string);
                                    foreach($parts as $part) {
                                        list($attr, $value) = explode(':', $part);
                                        $attributes[$attr][] = $value;
                                    }
                                }

                                // Remove duplicates from values
                                foreach($attributes as $attr => $values) {
                                    $attributes[$attr] = array_unique($values);
                                }
                            @endphp

                            @foreach($attributes as $attribute => $values)
                                <div class="variation-group mb-2"> <!-- Reduced margin-bottom -->
                                    <label class="fw-bold mb-1">{{ $attribute }}:</label> <!-- Reduced margin-bottom -->
                                    <div class="d-flex flex-wrap gap-2">
                                        @foreach($values as $value)
                                            <button type="button"
                                                wire:click="selectVariation('{{ $attribute }}', '{{ $value }}')"
                                                class="btn {{ isset($selectedVariations[$attribute]) && $selectedVariations[$attribute] == $value ? 'btn-primary' : 'btn-outline-primary' }}">
                                                {{ $value }}
                                            </button>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Description -->
                        <div class="description-section">
                            <h5 class="mb-2">Description</h5> <!-- Reduced margin-bottom -->
                            <p class="text-muted">{!! $product->small_description !!}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Full Description -->
            <div class="row mt-3"> <!-- Reduced margin-top -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4 class="mb-0">Full Description</h4>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">{!! $product->description !!}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Products Section -->
            @if($category && $category->relateProducts->count() > 0)
                <div class="related-products mt-4"> <!-- Reduced margin-top -->
                    <h3 class="mb-3">Related Products</h3> <!-- Reduced margin-bottom -->
                    <div class="row g-2"> <!-- Add g-2 class to reduce gap between rows -->
                        @foreach ($category->relateProducts->take(4) as $relatedProductItem)
                            <div class="col-6 col-md-3 mb-3"> <!-- Reduced margin-bottom -->
                                <div class="card h-100">
                                    <img src="{{ asset($relatedProductItem->productImages->first()->image ?? '') }}"
                                         class="card-img-top"
                                         alt="{{ $relatedProductItem->name }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $relatedProductItem->name }}</h5>
                                        <p class="card-text">
                                            <span class="text-primary">${{ $relatedProductItem->selling_price }}</span>
                                            <small class="text-muted text-decoration-line-through">${{ $relatedProductItem->original_price }}</small>
                                        </p>
                                        <a href="{{ url('/collections/' . $relatedProductItem->category->slug . '/' . $relatedProductItem->slug) }}"
                                           class="btn btn-outline-primary btn-sm">View Details</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

@push('styles')
<style>
    .variation-group .btn {
        min-width: 60px;
    }

    .product-view {
        height: 100%;
    }

    .variations-section .btn {
        text-transform: uppercase;
        font-size: 0.875rem;
    }

    @media (max-width: 768px) {
        .product-view {
            margin-top: 1rem;
        }

        .variations-section .btn {
            margin-bottom: 0.5rem;
        }
    }

    .exzoom_img_box {
        border-radius: 4px;
        overflow: hidden;
    }
</style>
@endpush

@push('scripts')
    <script>
        $(function() {
            initExzoom();

            window.livewire.on('updateExzoom', function () {
                $('.exzoom_nav').remove();
                $('.exzoom_btn').remove();
                initExzoom();
            });
        });

        function initExzoom() {
            $("#exzoom").exzoom({
                "navWidth": 60,
                "navHeight": 60,
                "navItemNum": 5,
                "navItemMargin": 7,
                "navBorder": 1,
                "autoPlay": false,
                "autoPlayTimeout": 2000
            });
        }

        $('.four-carousel').owlCarousel({
            loop: true,
            margin: 10,
            dots: true,
            nav: false,
            autoplay: false,
            autoplayTimeout: 5000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        });
    </script>
@endpush
