@extends('layouts.admin')

@section('title', 'Categories')

@section('loader')
    @include('partials.header.category_loader')
@endsection

@section('content')
<x-breadcrumb/>
<!--section start-->
<section class="collection section-b-space ratio_square ">
    <div class="container">
        <div class="row partition-collection">
            @foreach ($productCategories as $category)
            <div class="col-lg-3 col-md-6  mb-5">
                <div class="collection-block">
                    <div>
                        <img src="{{ $category->getFirstMediaUrl('cover') ?? asset('images/collection/1.jpg') }}" class="img-fluid rounded shadow blur-up lazyload bg-img"alt="">
                    </div>
                    <div class="collection-content">
                        <h4>({{ $category->products_count }} products)</h4>
                        <h3>{{ $category->name }}</h3>
                        {{-- <p>Description</p> --}}
                        <a href="{{ route('shop.products', ['category' => $category->slug]) }}" class="btn btn-outline">shop now !</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--Section ends-->
@endsection
