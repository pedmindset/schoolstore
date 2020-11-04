@extends('layouts.admin')

@section('title', 'Checkout')

@section('content')
 <!-- breadcrumb start -->
 <x-breadcrumb/>
<!-- breadcrumb End -->

    <!-- section start -->
    <section class="section-b-space">
        <div class="container">
            <div class="checkout-page">
                <div class="checkout-form">
                    <form>
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <div class="checkout-title">
                                    <h3>Billing Details</h3>
                                </div>
                                <div class="row check-out">
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">Name</div>
                                        <input type="text" name="field-name" value="{{ $user->name }}" disabled>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">Phone</div>
                                        <input type="text" name="field-name" value="{{ $user->profile->phone }}" disabled>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">Email Address</div>
                                        <input type="text" name="field-name" value="{{ $user->email }}" disabled>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">Address</div>
                                        <input type="text" name="field-name" value="{{ $user->profile->address }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <livewire:checkout-page-livewire />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->

@endsection
