@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <!-- breadcrumb start -->
    <x-breadcrumb/>
    <!-- breadcrumb end -->

    <!--  dashboard section start -->
    <section class="dashboard-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="dashboard-sidebar">
                        <div class="profile-top">
                            <div class="profile-image">
                                <img src="{{ asset('images/logos/17.png') }}" alt="" class="img-fluid">
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
                                                <h3>GHS 225</h3>
                                                <h5>Account Balance</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="counter-box">
                                            <img src="{{ asset('images/icon/dashboard/sale.png') }}" class="img-fluid">
                                            <div>
                                                <h3>GHS 120</h3>
                                                <h5>Loan</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="counter-box">
                                            <img src="{{ asset('images/icon/dashboard/homework.png') }}" class="img-fluid">
                                            <div>
                                                <h3>50</h3>
                                                <h5>order pending</h5>
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
                                <div class="col-lg-6">
                                    <div class="card dashboard-table">
                                        <div class="card-body">
                                            <h3>Loan</h3>
                                            <table class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Transaction ID</th>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">price</th>
                                                        <th scope="col">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>132355353332</th>
                                                        <td>20th Dec, 2020</td>
                                                        <td>GHS205</td>
                                                        <td>Approved</td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
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
                                                    @endforelse                                   </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

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
                                            </div>
                                            <table class="table table-responsive-sm mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">name</th>
                                                        <th scope="col">phone</th>
                                                        <th scope="col">email</th>
                                                        <th scope="col">address</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse (auth()->user()->guarantors() as $gurantors)
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
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  dashboard section end -->


    <!-- Modal start -->
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
                        <x-form.input title="Name" name="name" :value="auth()->user()->name"/>
                        <x-form.input title="Email Address" name="email" type="email" :value="auth()->user()->email"/>
                        <x-form.input title="Phone Number" name="phone" :value="auth()->user()->profile->phone"/>
                        <x-form.input title="Address" name="address" :value="auth()->user()->profile->address"/>
                        <x-form.input title="Date of Birth" name="dob" type="date" :value="auth()->user()->profile->date_of_birth"/>
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-dark btn-custom" data-dismiss="modal">cancel</a>
                    <a class="btn btn-solid btn-custom" onclick="event.preventDefault(); document.getElementById('update-profile-form').submit();" >Save</a>
                </div>
            </div>
        </div>
    </div>
    <!-- modal end -->

@endsection
