@extends('layouts.admin')

@section('title', 'Cart')

@section('content')
 <!-- breadcrumb start -->
 <x-breadcrumb/>
<!-- breadcrumb End -->

    <!--section start-->
    <livewire:cart-page-livewire />
    <!--section end-->


@endsection
