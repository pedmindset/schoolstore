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
        <div class="grid grid-cols-2 sm:grid-cols-3  lg:grid-cols-4 gap-4 ">
            @foreach ($productCategories as $category)
            <div class="mb-5">
                <div class="collection-block">
                    <div class="rounded-md shadow-2xl hover:shadow-md cursor-pointer ">
                        <img src="{{  $category->getfirstMediaUrl('cover') }}" class="img-fluid blur-up lazyload bg-img" alt="">
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
