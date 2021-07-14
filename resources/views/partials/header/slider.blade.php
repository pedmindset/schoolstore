@push('custom-styles')
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

@endpush
<section class="p-0 mb-5 js-flickity" data-flickity-options='{ "wrapAround": true, "autoPlay": 40000 }'>
    <div class="slide-1 home-slider">
        <div>
            <div class="home text-center">
                <img src="{{ asset('assets/images/bannerNew.jpg') }}" alt="" class="bg-img blur-up fixed lazyload">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="slider-contain ">
                                <div class="text-left bg-gray-50 bg-opacity-75 flex rounded-r-lg shadow-xl">
                                    <div class="w-4 bg-red-400"></div>
                                    <div class="p-6 text-left ">
                                    <h4 class="px-2 font-black text-gray-500 ">Welcome To</h4>
                                    <h1 class="pl-2 mb-2 text-red-600 ">Student Shop</h1>
                                    <p class="px-2 font-black text-gray-500 text-lg">Free Delivery to your Hotel or Dormitory</p>
                                    <a href="{{ route('shop.products') }}" class="px-6 py-2 bg-red-500 text-white m-2 text-lg rounded-full">shop now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="slide-1 home-slider">
        <div>
            <div class="home text-center">
                <img src="{{ asset('assets/images/bannerNew2.jpg') }}" alt="" class="bg-img blur-up fixed lazyload">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="slider-contain ">
                                <div class="text-left bg-gray-50 bg-opacity-75 flex rounded-r-lg shadow-xl">
                                    <div class="w-4 bg-red-400"></div>
                                    <div class="p-6 text-left ">
                                    <h4 class="px-2 font-black text-gray-500 ">Third Party</h4>
                                    <h1 class="pl-2 mb-2 text-red-600 ">Access Grant</h1>
                                    <p class="px-2 font-black text-gray-500 text-lg">Allow Family & Friends to buy and we delivery to you</p>
                                    <a href="{{ route('shop.products') }}" class="px-6 py-2 bg-red-500 text-white m-2 text-lg rounded-full">shop now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@push('custom-scripts')
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
{{-- <script src="https://unpkg.com/vue@next"></script> --}}
{{-- <script src="https://unpkg.com/vue-star-rating@next/dist/VueStarRating.umd.min.js"></script> --}}
@endpush
