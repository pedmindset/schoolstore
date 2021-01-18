@extends('layouts.admin')

@section('title', 'Dashboard')

@push('custom-styles')
    <!-- Dropzone css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/dropzone.css') }}">
@endpush

@section('content')
    <!-- breadcrumb start -->
    <x-breadcrumb/>
    <!-- breadcrumb end -->
    @include('partials.alert')
    <!--  dashboard section start -->
    <section class="dashboard-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="dashboard-sidebar">
                        <div class="profile-top">
                            <div class="flex items-center justify-center">
                                <img class="img-fluid object-contain rounded" src="{{ $profile_picture->getFullUrl() }}">
                            </div>
                            <div class="profile-detail">
                                <h5>{{ auth()->user()->name }}</h5>
                                <h6>{{ auth()->user()->email }}</h6>
                            </div>
                        </div>
                        <div class="faq-tab">
                            <ul class="nav nav-tabs" id="top-tab" role="tablist">
                                <li class="nav-item"><a data-toggle="tab" class="nav-link active"href="#dashboard">dashboard</a></li>
                                <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#orders">orders</a></li>
                                <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#profile">profile</a></li>
                                <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#guarantors">Guarantors</a></li>
                                <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#verification">Verifications</a></li>
                                <li class="nav-item">
                                    <a class="nav-link" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="faq-content tab-content" id="top-tabContent">
                        <div class="tab-pane fade show active" id="dashboard">
                            <div class="counter-section">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="counter-box">
                                            <img src="{{ asset('images/icon/dashboard/order.png') }}" class="img-fluid">
                                            <div>
                                                <h3>GHS {{ number_format($account->balance ?? 0, 2) }}</h3>
                                                <h5>Account Balance</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="counter-box">
                                            <img src="{{ asset('images/icon/dashboard/sale.png') }}" class="img-fluid">
                                            <div>
                                                <h3>GHS {{ number_format($account->credit ?? 0, 2)  }}</h3>
                                                <h5>Loan</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="counter-box">
                                            <img src="{{ asset('images/icon/dashboard/homework.png') }}" class="img-fluid">
                                            <div>
                                                <h3>{{ $pendingOrders->count() }}</h3>
                                                <h5>order pendings</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="col-md-7">
                                    <div class="card">
                                        <div class="card-body">
                                            <div id="chart"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <div id="chart-order"></div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card dashboard-table">
                                        <div class="card-body">
                                            <div class="flex justify-between">
                                                <h3>Loan</h3>
                                                @if($account->credit ?? 0 < 1)
                                                <button onclick="applyLoan()" class="px-4 py-2 bg-green-500 text-white rounded-full shadow">Apply for loan</button>
                                                @else
                                                <button onclick="payLoan({{ number_format($account->credit ?? 0, 2) }})" class="px-4 py-2 bg-red-500 text-white rounded-full shadow">Pay Loan: GHS {{ number_format($account->credit, 2) }} </button>
                                                @endif
                                            </div>
                                            <table class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Amount</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Done By</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($transactions as $t)
                                                    <tr>
                                                        <td>{{ $t->created_at->toDateString() }}</td>
                                                        <td>{{ $t->amount }}</td>
                                                        <td>{{ $t->status }} <br> @if($t->type) Type: {{ $t->type }} @endif</td>
                                                        <td>{{ $t->doneBy }}</td>
                                                    </tr>
                                                    @empty
                                                    <tr><td colspan="3" ><p class="text-center">You have no transactions</p></td></tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-6">
                                    <div class="card dashboard-table">
                                        <div class="card-body">
                                            <h3>recent orders</h3>
                                            <table class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">order id</th>
                                                        <th scope="col">amount</th>
                                                        <th scope="col">status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse (auth()->user()->recentOrders() as $order)
                                                    <tr>
                                                        <th scope="row">#{{ $order->uuid }}</th>
                                                        <td>{{ $order->amount_with_currency }}</td>
                                                        <td>{{ $order->status }}</td>
                                                    </tr>
                                                    @empty
                                                    <tr><td colspan="3" ><p class="text-center">You have no orders</p></td></tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div> --}}

                            </div>
                        </div>
                        {{-- <div class="tab-pane fade" id="products">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card dashboard-table mt-0">
                                        <div class="card-body">
                                            <div class="top-sec">
                                                <h3>all products</h3>
                                                <a href="#" class="btn btn-sm btn-solid">add product</a>
                                            </div>
                                            <table class="table-responsive-md table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">image</th>
                                                        <th scope="col">product name</th>
                                                        <th scope="col">category</th>
                                                        <th scope="col">price</th>
                                                        <th scope="col">stock</th>
                                                        <th scope="col">sales</th>
                                                        <th scope="col">edit/delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row"><img
                                                                src="{{ asset('images/dashboard/product/1.jpg') }}"
                                                                class="blur-up lazyloaded"></th>
                                                        <td>neck velvet dress</td>
                                                        <td>women clothes</td>
                                                        <td>$205</td>
                                                        <td>1000</td>
                                                        <td>2000</td>
                                                        <td><i class="fa fa-pencil-square-o mr-1"
                                                                aria-hidden="true"></i><i class="fa fa-trash-o ml-1"
                                                                aria-hidden="true"></i></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><img
                                                                src="{{ asset('images/dashboard/product/9.jpg') }}"
                                                                class="blur-up lazyloaded"></th>
                                                        <td>belted trench coat</td>
                                                        <td>women clothes</td>
                                                        <td>$350</td>
                                                        <td>800</td>
                                                        <td>350</td>
                                                        <td><i class="fa fa-pencil-square-o mr-1"
                                                                aria-hidden="true"></i><i class="fa fa-trash-o ml-1"
                                                                aria-hidden="true"></i></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><img src="{{ asset('images/pro3/34.jpg') }}"
                                                                class="blur-up lazyloaded"></th>
                                                        <td>men print tee</td>
                                                        <td>men clothes</td>
                                                        <td>$150</td>
                                                        <td>750</td>
                                                        <td>150</td>
                                                        <td><i class="fa fa-pencil-square-o mr-1"
                                                                aria-hidden="true"></i><i class="fa fa-trash-o ml-1"
                                                                aria-hidden="true"></i></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><img src="{{ asset('images/pro3/1.jpg') }}"
                                                                class="blur-up lazyloaded"></th>
                                                        <td>woman print tee</td>
                                                        <td>women clothes</td>
                                                        <td>$150</td>
                                                        <td>750</td>
                                                        <td>150</td>
                                                        <td><i class="fa fa-pencil-square-o mr-1"
                                                                aria-hidden="true"></i><i class="fa fa-trash-o ml-1"
                                                                aria-hidden="true"></i></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><img src="{{ asset('images/pro3/27.jpg') }}"
                                                                class="blur-up lazyloaded"></th>
                                                        <td>men print tee</td>
                                                        <td>men clothes</td>
                                                        <td>$150</td>
                                                        <td>750</td>
                                                        <td>150</td>
                                                        <td><i class="fa fa-pencil-square-o mr-1"
                                                                aria-hidden="true"></i><i class="fa fa-trash-o ml-1"
                                                                aria-hidden="true"></i></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><img src="{{ asset('images/pro3/36.jpg') }}"
                                                                class="blur-up lazyloaded"></th>
                                                        <td>men print tee</td>
                                                        <td>men clothes</td>
                                                        <td>$150</td>
                                                        <td>750</td>
                                                        <td>150</td>
                                                        <td><i class="fa fa-pencil-square-o mr-1"
                                                                aria-hidden="true"></i><i class="fa fa-trash-o ml-1"
                                                                aria-hidden="true"></i></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="tab-pane fade" id="orders">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card dashboard-table mt-0">
                                        <div class="card-body">
                                            <div class="top-sec">
                                                <h3>orders</h3>
                                            </div>
                                            <table class="table table-responsive-sm mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">order id</th>
                                                        <th scope="col">status</th>
                                                        <th scope="col">total amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse (auth()->user()->recentOrders() as $order)
                                                    <tr>
                                                        <th scope="row">#{{ $order->uuid }}</th>
                                                        <td>{{ $order->status }}</td>
                                                        <td>{{ $order->amount_with_currency }}</td>
                                                    </tr>
                                                    @empty
                                                    <tr><td colspan="3" ><p class="text-center">You have no orders</p></td></tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mt-0">
                                        <div class="card-body">
                                            <div class="dashboard-box">
                                                <div class="dashboard-title">
                                                    <h4>profile</h4>
                                                    <span data-toggle="modal" data-target="#edit-profile">edit</span>
                                                </div>
                                                <div class="dashboard-detail">
                                                    <ul>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Name</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>{{ auth()->user()->name }}</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>email address</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>{{ auth()->user()->email }}</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Phone</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6><x-misc.empty-text-view :text="auth()->user()->profile->phone"/></h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Address</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6><x-misc.empty-text-view :text="auth()->user()->profile->address"/></h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Level</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6><x-misc.empty-text-view :text="auth()->user()->profile->school_category->name ?? NULL"/></h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Date of birth</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6><x-misc.empty-text-view :text="auth()->user()->profile->date_of_birth"/></h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="card mt-3">
                                        <div class="card-body">
                                            <div class="dashboard-box">
                                                <div class="dashboard-title">
                                                    <h4>School</h4>
                                                    <span data-toggle="modal" data-target="#edit-school">edit</span>
                                                </div>
                                                <div class="dashboard-detail">
                                                    <ul>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Name</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>{{ auth()->user()->profile->school->name ?? '' }}</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Resident</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>{{ auth()->user()->profile->hostel->name ?? '' }}</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Level</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6><x-misc.empty-text-view :text="auth()->user()->profile->level"/></h6>
                                                                </div>
                                                            </div>
                                                        </li>

                                                    </ul>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="card mt-3">
                                        <div class="card-body">
                                            <div class="dashboard-box">
                                                <div class="dashboard-title">
                                                    <h4>Identification</h4>
                                                    <span data-toggle="modal" data-target="#edit-identity">edit</span>
                                                </div>
                                                <div class="dashboard-detail">
                                                    <table class="table mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Type</th>
                                                                <th scope="col">File</th>
                                                                <th scope="col">Date Added</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if($profile_picture)
                                                            <tr>
                                                                <th>Profile Picture</th>
                                                                <td><img class=" object-contain w-12" src="{{ $profile_picture->getFullUrl() }}"></td>
                                                                <td>{{ $profile_picture->created_at->toDateString() }}</td>
                                                                <td>view</td>
                                                            </tr>
                                                            @endif
                                                            @forelse ($attachments as $t)
                                                            <tr>
                                                                <th>Identification</th>
                                                                <td><a target="new" href="{{ $t->getFullUrl() }}">{{ $t->name }}</a></td>
                                                                <td>{{ $t->created_at->toDateString()  }}</td>
                                                                <td><a target="new" href="{{ $t->getFullUrl() }}">view</a></td>
                                                            </tr>
                                                            @empty
                                                            <tr><td colspan="3" ><p class="text-center">Upload Identification Documents for verifivcation</p></td></tr>
                                                            @endforelse
                                                        </tbody>
                                                    </table>

                                                    <div class="card mt-8">
                                                        <div class="text-center">
                                                            <h5>Profile Picture</h5>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="dropzone-class digits" id="profile_upload">
                                                                <div class="dz-message needsclick"><i class="fa fa-cloud-upload"></i>
                                                                    <h4 class="mb-0 f-w-600">Drop files here or click to upload.</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="card ">
                                                        <div class="text-center">
                                                            <h5>School ID or alternative Identification</h5>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="dropzone-class digits" id="student_identification">
                                                                <div class="dz-message needsclick"><i class="fa fa-cloud-upload"></i>
                                                                    <h4 class="mb-0 f-w-600">Drop files here or click to upload.</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="tab-pane fade" id="settings">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mt-0">
                                        <div class="card-body">
                                            <div class="dashboard-box">
                                                <div class="dashboard-title">
                                                    <h4>settings</h4>
                                                </div>
                                                <div class="dashboard-detail">
                                                    <div class="account-setting">
                                                        <h5>Notifications</h5>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-check">
                                                                    <input class="radio_animated form-check-input"
                                                                        type="radio" name="exampleRadios"
                                                                        id="exampleRadios1" value="option1" checked>
                                                                    <label class="form-check-label"
                                                                        for="exampleRadios1">
                                                                        Allow Desktop Notifications
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="radio_animated form-check-input"
                                                                        type="radio" name="exampleRadios"
                                                                        id="exampleRadios2" value="option2">
                                                                    <label class="form-check-label"
                                                                        for="exampleRadios2">
                                                                        Enable Notifications
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="radio_animated form-check-input"
                                                                        type="radio" name="exampleRadios"
                                                                        id="exampleRadios3" value="option3">
                                                                    <label class="form-check-label"
                                                                        for="exampleRadios3">
                                                                        Get notification for my own activity
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="radio_animated form-check-input"
                                                                        type="radio" name="exampleRadios"
                                                                        id="exampleRadios4" value="option4">
                                                                    <label class="form-check-label"
                                                                        for="exampleRadios4">
                                                                        DND
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="account-setting">
                                                        <h5>deactivate account</h5>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-check">
                                                                    <input class="radio_animated form-check-input"
                                                                        type="radio" name="exampleRadios1"
                                                                        id="exampleRadios4" value="option4" checked>
                                                                    <label class="form-check-label"
                                                                        for="exampleRadios4">
                                                                        I have a privacy concern
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="radio_animated form-check-input"
                                                                        type="radio" name="exampleRadios1"
                                                                        id="exampleRadios5" value="option5">
                                                                    <label class="form-check-label"
                                                                        for="exampleRadios5">
                                                                        This is temporary
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="radio_animated form-check-input"
                                                                        type="radio" name="exampleRadios1"
                                                                        id="exampleRadios6" value="option6">
                                                                    <label class="form-check-label"
                                                                        for="exampleRadios6">
                                                                        other
                                                                    </label>
                                                                </div>
                                                                <button type="button"
                                                                    class="btn btn-solid btn-xs">Deactivate
                                                                    Account</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="account-setting">
                                                        <h5>Delete account</h5>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-check">
                                                                    <input class="radio_animated form-check-input"
                                                                        type="radio" name="exampleRadios3"
                                                                        id="exampleRadios7" value="option7" checked>
                                                                    <label class="form-check-label"
                                                                        for="exampleRadios7">
                                                                        No longer usable
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="radio_animated form-check-input"
                                                                        type="radio" name="exampleRadios3"
                                                                        id="exampleRadios8" value="option8">
                                                                    <label class="form-check-label"
                                                                        for="exampleRadios8">
                                                                        Want to switch on other account
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="radio_animated form-check-input"
                                                                        type="radio" name="exampleRadios3"
                                                                        id="exampleRadios9" value="option9">
                                                                    <label class="form-check-label"
                                                                        for="exampleRadios9">
                                                                        other
                                                                    </label>
                                                                </div>
                                                                <button type="button"
                                                                    class="btn btn-solid btn-xs">Delete Account</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="tab-pane fade" id="guarantors">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card dashboard-table mt-0">
                                        <div class="card-body">
                                            <div class="top-sec">
                                                <h3>Guarantors</h3>
                                                <span data-toggle="modal" data-target="#guarantor-modal" class="ml-2 text-primary hover:text-gray-500 cursor-pointer">Add new</span>
                                            </div>
                                            <table class="table table-responsive-sm mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">name</th>
                                                        <th scope="col">phone</th>
                                                        {{-- <th scope="col">email</th>
                                                        <th scope="col">address</th> --}}
                                                        <th scope="col">Verified</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($gurantors as $gurantor)
                                                    <tr>
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <td>{{ $gurantor->name }}</td>
                                                        <td>{{ $gurantor->phone }}</td>
                                                        {{-- <td>{{ $gurantor->email }}</td> --}}
                                                        {{-- <td>{{ $gurantor->address }}</td> --}}
                                                        <td>@if($gurantor->momo_verified == 1)
                                                            Yes
                                                            @else
                                                            No
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($gurantor->momo_verified == 1)
                                                            <a onclick="return confirm('Delete Guarantor')" href="{{ action('CustomersController@deleteGuarantor', $gurantor->id) }}"> Delete</a>
                                                            @else
                                                            <a href="javascript:void(0)" onclick="updateGaurantor({{ json_encode($gurantor) ?? '' }})"  id="edit-guarantor">Edit</a>
                                                            |
                                                            <a onclick="return confirm('Delete Guarantor')" href="{{ action('CustomersController@deleteGuarantor', $gurantor->id) }}"> Delete</a>
                                                            @endif

                                                        </td>
                                                    </tr>
                                                    @empty
                                                    <tr><td colspan="5" ><p class="text-center">You have no gurantors</p></td></tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="verification">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card dashboard-table mt-0">
                                        <div class="card-body">

                                            <div class="top-sec">
                                                <h3>Verify Guarantors</h3>
                                                <span data-toggle="modal" data-target="#guarantor-modal" class="ml-2 text-primary hover:text-gray-500 cursor-pointer">Add new</span>
                                            </div>
                                            <table class="table table-responsive-sm mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">name</th>
                                                        <th scope="col">phone</th>
                                                        {{-- <th scope="col">email</th>
                                                        <th scope="col">address</th> --}}
                                                        <th scope="col">Verified</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($gurantors as $gurantor)
                                                    <tr>
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <td>{{ $gurantor->name }}</td>
                                                        <td>{{ $gurantor->phone }}</td>
                                                        {{-- <td>{{ $gurantor->email }}</td>
                                                        <td>{{ $gurantor->address }}</td> --}}
                                                        <td>@if($gurantor->momo_verified == 1)
                                                            Yes
                                                            @else
                                                            Verify
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($gurantor->momo_verified == 1)
                                                            <a onclick="return confirm('Delete Guarantor')" href="{{ action('CustomersController@deleteGuarantor', $gurantor->id) }}"> Delete</a>
                                                            @else
                                                            <a href="javascript:void(0)" onclick="updateGaurantor({{ json_encode($gurantor) ?? '' }})"  id="edit-guarantor">Edit</a>
                                                            |
                                                            <a onclick="return confirm('Delete Guarantor')" href="{{ action('CustomersController@deleteGuarantor', $gurantor->id) }}"> Delete</a>
                                                            @endif

                                                        </td>
                                                    </tr>
                                                    @empty
                                                    <tr><td colspan="5" ><p class="text-center">You have no gurantors</p></td></tr>
                                                    @endforelse
                                                </tbody>
                                            </table>

                                            <div class="top-sec mt-8">
                                                <h3>Verify Contact & Mobile Money Numbers</h3>
                                                <span data-toggle="modal" data-target="#verify-momo" class="ml-2 text-primary hover:text-gray-500 cursor-pointer">Edit</span>
                                            </div>
                                            <table class="table table-responsive-sm mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Type</th>
                                                        <th scope="col">phone</th>
                                                        <th scope="col">Verified</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Phone Number</th>
                                                        <td>{{ auth()->user()->profile->phone }}</td>
                                                        <td>@if(auth()->user()->profile->has_verified_phone == 1)
                                                            Yes
                                                            @else
                                                            Verify
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <span data-toggle="modal" data-target="#verify-momo" class="ml-2 text-primary hover:text-gray-500 cursor-pointer">Edit</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Mobile Money Number</th>
                                                        <td>{{ auth()->user()->profile->mobile_money_number }}</td>
                                                        <td>@if(auth()->user()->profile->has_verified_momo == 1)
                                                            Yes
                                                            @else
                                                            Verify
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <span data-toggle="modal" data-target="#verify-momo" class="ml-2 text-primary hover:text-gray-500 cursor-pointer">Edit</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
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
    <!--  dashboard section end -->


    <!--edit profile Modal start -->
    <div class="modal logout-modal fade" id="edit-profile" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('customer.update-profile') }}" id="update-profile-form">
                        @csrf
                        <x-form.input title="Name" name="name" :value="auth()->user()->name" required="true"/>
                        <x-form.input title="Email Address" name="email" type="email" :value="auth()->user()->email" required="true"/>
                        <x-form.input title="Phone Number" name="phone" :value="auth()->user()->profile->phone" required="true"/>
                        <x-form.input title="Address" name="address" :value="auth()->user()->profile->address"/>
                        <x-form.input title="Date of Birth" name="dob" type="date" :value="auth()->user()->profile->date_of_birth" required="true"/>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Level</label>
                            <select id="level" name="level" class="mt-1 block w-full pl-3 pr-10 py-3 text-base border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" required="true">
                                <option value="">Select your Level</option>
                                @foreach ($school_categories as $item)
                                    <option
                                    @if($item->id == auth()->user()->profile->school_category_id)
                                    selected
                                    @endif
                                    value="{{ $item->id }}">{{ $item->name }}
                                    </option>
                                @endforeach
                                </select>
                            <div class="mt-1">
                                @error('level')
                                <span class="text-red-500 italic text-xs">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                            </div>

                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-dark btn-custom" data-dismiss="modal">cancel</a>
                    <button class="btn btn-solid btn-custom">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- modal end -->

        <!--edit profile Modal start -->
        <div class="modal logout-modal fade" id="verify-momo" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Verify Phone & Mobile Money Number</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('customer.update-momo') }}" id="update-momo-form">
                            @csrf
                            <x-form.input title="Phone Number" name="phone" type="tel" pattern="[233]{3}[0-9]{9}" placeholder="233241223344" :value="auth()->user()->profile->phone" required="true"/>
                            <x-form.input title="Mobile Money Number" name="momo" type="tel" pattern="[233]{3}[0-9]{9}" placeholder="233241223344" :value="auth()->user()->profile->mobile_money_number" required="true"/>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-dark btn-custom" data-dismiss="modal">cancel</a>
                        <button class="btn btn-solid btn-custom" type="submit" >Save</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <!-- modal end -->

    <!-- guarantors Modal start -->
    <div class="modal guarantor-modal fade" id="guarantor-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Gurantor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('customer.create-guarantor') }}" id="add-guarantor-form">
                        @csrf
                        <x-form.input title="Name" name="name"/>
                        <x-form.input title="Email Address" name="email"/>
                        <x-form.input title="Phone Number" name="phone" type="tel" pattern="[233]{3}[0-9]{9}" placeholder="233241223344" required="true" />
                        <small class=" text-xs">Format: 233241223344</small>
                        <x-form.input title="Mobile Money Number" name="momo" type="tel" pattern="[233]{3}[0-9]{9}" placeholder="233241223344" required="true" />
                        <small class=" text-xs">Format: 233241223344</small>
                        <x-form.input title="Address" name="address"/>

                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-dark btn-custom" data-dismiss="modal">cancel</a>
                    <button type="submit" class="btn btn-solid btn-custom" >Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- modal end -->


    <!-- edit guarantors Modal start -->
    <div class="modal guarantor-modal fade" id="edit-guarantor-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Gurantor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('customer.update-guarantor') }}" id="edit-guarantor-form">
                    @csrf
                    <div class="modal-body">
                            <x-form.input id="guarantor_name" title="Name" name="guarantor_name"/>
                            <x-form.input id="guarantor_email" title="Email Address" name="guarantor_email"/>
                            <x-form.input id="guarantor_phone" title="Phone Number" type="tel" pattern="[233]{3}[0-9]{9}" placeholder="233241223344" required="true" name="guarantor_phone"/>
                            <small class="text-xs">Format: 233241223344</small>
                            <x-form.input id="guarantor_momo" title="Mobile Money Number" type="tel" pattern="[233]{3}[0-9]{9}" placeholder="233241223344" required="true" name="guarantor_momo"/>
                            <small class="text-xs">Format: 233241223344</small>
                            <x-form.input id="guarantor_address" title="Address" name="guarantor_address"/>
                            <input id="guarantor_id" type="hidden" name="guarantor_id">
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-dark btn-custom" data-dismiss="modal">cancel</a>
                        <button class="btn btn-solid btn-custom"  >Save</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- modal end -->

    <!-- edit school Modal start -->
    <div id="school">
        <div class="modal logout-modal fade" id="edit-school" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">School</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="" id="update-school-form">
                            @csrf
                            <div>
                                <label for="school" class="block text-sm font-medium text-gray-700">School</label>
                                <select v-on:change="getHostels()" v-model="school" id="school" name="school" class="mt-1 border block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    <option v-for="my_school in schools" v-bind:value="my_school.id">
                                        @{{ my_school.name }}
                                    </option>
                                </select>
                              </div>
                              <div>
                                <label for="hostel" class="block text-sm font-medium text-gray-700">Hostel</label>
                                <select  v-model="hostel" id="hostel" name="hostel" class="mt-1 border block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    <option v-for="my_hostel in hostels" v-bind:value="my_hostel.id">
                                        @{{ my_hostel.name }}
                                    </option>
                                </select>
                              </div>
                              <div class='block text-sm mt-2'>
                                <label class="block text-sm font-medium text-gray-700">Level/Class</label>
                                <div class="mt-1">
                                    <input
                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    type="text" name="level" v-model="level"
                                    />

                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-dark btn-custom" data-dismiss="modal">cancel</a>
                        <a class="btn btn-solid btn-custom" v-on:click.prevent="submitSchool()">Save</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal end -->
    <!-- Dropzone js-->


        @push('custom-scripts')
        <script>
            var vue_school = new Vue({
                el: '#school',
                data: function(){
                    return {
                        schools: [],
                        school: '',
                        hostels: [],
                        hostel: '',
                        level: '',
                    }
                },

                methods: {
                    getSchools(){
                        var self = this;
                        axios.get('../user/schools')
                        .then(function(result){
                            console.log(result.data);
                            self.schools = (result.data);
                        })

                    },

                    getHostels(){
                        var self = this;
                        axios.get('../user/hostels/' + this.school)
                        .then(function(result){
                            console.log(result.data);
                            self.hostels = (result.data);
                        })

                    },

                    submitSchool(){

                        axios.post('../user/schools', {
                            school: this.school,
                            hostel: this.hostel,
                            level: this.level
                        }).then(function(result){
                            window.location.href = window.location.pathname + "#profile"
                            window.location.reload();
                        })
                    }
                },

                mounted(){
                    this.getSchools();
                    this.school = {{ auth()->user()->profile->school_id ?? 0 }};
                    this.getHostels();
                    this.hostel = {{ auth()->user()->profile->hostel_id ?? 0 }};
                    this.level = {{ auth()->user()->profile->level ?? 0 }};
                }
            })

            function updateGaurantor(guarantor){
                console.log(guarantor);
                $('#guarantor_name').val(guarantor.name);
                $('input[name="guarantor_name"]').val(guarantor.name);
                $('input[name="guarantor_email"]').val(guarantor.email);
                $('input[name="guarantor_phone"]').val(guarantor.phone);
                $('input[name="guarantor_momo"]').val(guarantor.momo_phone);
                $('input[name="guarantor_address"]').val(guarantor.address);
                $('input[name="guarantor_id"]').val(guarantor.id);


                $('#edit-guarantor-modal').modal()
            }
            function applyLoan()
            {
                Swal.fire(
                    'Apply Loan!',
                    'You clicked the button!',
                    'success'
                )
            }

            function payLoan(loan)
            {
                const { value: formValues } =  Swal.fire({
                    title: 'Pay Loan: GHS ' + loan,
                    html:
                        '<input id="swal-input1" class="swal2-input">' +
                        '<input id="swal-input2" class="swal2-input">',
                    focusConfirm: false,
                    preConfirm: () => {
                        return [
                        document.getElementById('swal-input1').value,
                        document.getElementById('swal-input2').value
                        ]
                    }
                }).then(function(formValues) {
                    Swal.fire(JSON.stringify(formValues.value))
                });
            }

        </script>
        <script src="{{ asset('/js/dropzone/dropzone.js') }}"></script>
        <script>
            $(function() {
                window.addEventListener('hashchange', onHashChange, false);
                onHashChange();



                function onHashChange() {
                    var hash = window.location.hash;

                    if (hash) {
                        // using ES6 template string syntax
                        $(`[data-toggle="tab"][href="${hash}"]`).trigger('click');
                    }
                }
                $("#profile_upload").dropzone({
                    url: "../user/upload/picture",
                    addRemoveLinks : false,
                    paramName: 'profile_picture',
                    acceptedFiles: 'image/jpg, image/jpeg, image/png',
                    maxFilesize: 3,
                    dictDefaultMessage: '<span class="text-center"><span class="font-lg visible-xs-block visible-sm-block visible-lg-block"><span class="font-lg"><i class="fa fa-caret-right text-danger"></i> Drop files <span class="font-xs">to upload</span></span><span>&nbsp&nbsp<h4 class="display-inline"> (Or Click)</h4></span>',
                    dictResponseError: 'Error uploading file!',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    error: function(file) {
                        Swal.fire('Upload failed. Try again');
                    },
                    success: function(){
                        Swal.fire('Upload Successful');
                        window.location.href = window.location.pathname + "#profile"
                        window.location.reload();
                    }
                });

                $("#student_identification").dropzone({
                    url: "../user/upload/identification",
                    addRemoveLinks : false,
                    paramName: 'attachment',
                    acceptedFiles: 'image/jpg, image/jpeg, image/png, application/pdf',
                    maxFilesize: 5,
                    dictDefaultMessage: '<span class="text-center"><span class="font-lg visible-xs-block visible-sm-block visible-lg-block"><span class="font-lg"><i class="fa fa-caret-right text-danger"></i> Drop files <span class="font-xs">to upload</span></span><span>&nbsp&nbsp<h4 class="display-inline"> (Or Click)</h4></span>',
                    dictResponseError: 'Error uploading file!',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    error: function(file) {
                        Swal.fire('Upload failed. Try again');
                    },
                    success: function(){
                        Swal.fire('Upload Successful');
                        window.location.href = window.location.pathname + "#profile"
                        window.location.reload();
                    }
                });

            })
        </script>

        @endpush
@endsection

