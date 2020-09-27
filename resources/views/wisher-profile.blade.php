@extends('layouts.app')
@section('page-css')
<!-- Date-time picker css -->
<link rel="stylesheet" type="text/css" href="../files/assets/pages/advance-elements/css/bootstrap-datetimepicker.css">
<!-- Date-range picker css  -->
<link rel="stylesheet" type="text/css"
    href="../files/bower_components/bootstrap-daterangepicker/css/daterangepicker.css" />
<!-- Date-Dropper css -->
<link rel="stylesheet" type="text/css" href="../files/bower_components/datedropper/css/datedropper.min.css" />
<!-- Data Table Css -->
<link rel="stylesheet" type="text/css"
    href="../files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
<!-- Main-body start -->
<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-body start -->
                <div class="page-body">
                    <div class="row d-flex justify-content-end">
                        <div></div>
                        <div class="page-header-title mx-auto">
                            <h5>My Profile</h5>
                        </div>
                        <div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('welcome') }}"> <i class="fa fa-home"></i> </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('showWisherProfile') }}">My Profile</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--profile cover start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cover-profile">
                                <div class="profile-bg-img">
                                    <img class="profile-bg-img img-fluid"
                                        src="{{ asset('files/assets/images/user-profile/bg-img1.jpg') }}" alt="bg-img">
                                    <div class="card-block user-info">
                                        <div class="col-md-12">
                                            <div class="media-left">
                                                <a class="profile-image" data-target="#viewProfileImageModal"
                                                    role="button" href="#" data-toggle="modal">
                                                    <img class="user-img img-radius bg-secondary" src="@if($wisher->profile_photo &&
                                                        \Storage::disk('s3')->exists($wisher->profile_photo))
                                                        {{ \Storage::disk('s3')->url($wisher->profile_photo) }} @else
                                                        {{ \Storage::disk('s3')->url(config('defaultImageLinks.profilePhoto')) }}
                                                        @endif" alt="user-img" style="width: 8rem; height: 8rem;">
                                                </a>
                                            </div>
                                            <div class="media-body row">
                                                <div class="col-lg-12">
                                                    <div class="user-title">
                                                        <h2>{{ $wisher->username }}</h2>
                                                        <span
                                                            class="text-white">{{ $wisher->email ? $wisher->email : "" }}</span>
                                                    </div>
                                                </div>
                                                {{-- <div>
                                                    <div class="pull-right cover-btn">
                                                        <button type="button" class="btn btn-primary m-r-10 m-b-10"><i
                                                                class="icofont icofont-plus"></i>
                                                            Follow</button>
                                                        <button type="button" class="btn btn-primary m-b-10"><i
                                                                class="icofont icofont-ui-messaging"></i>
                                                            Message</button>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--profile cover end-->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- tab header start -->
                            <div class="tab-header card">
                                <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist" id="mytab">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#personal"
                                            role="tab">Personal Info</a>
                                        <div class="slide"></div>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#wishes" role="tab">
                                            Wishes</a>
                                        <div class="slide"></div>
                                    </li> --}}
                                    {{--
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#contacts" role="tab">User's
                                            Contacts</a>
                                        <div class="slide"></div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#review" role="tab">Reviews</a>
                                        <div class="slide"></div>
                                    </li> --}}
                                </ul>
                            </div>
                            <!-- tab header end -->
                            <!-- tab content start -->
                            <div class="tab-content">
                                <!-- tab panel personal start -->
                                <div class="tab-pane active" id="personal" role="tabpanel">
                                    <!-- personal card start -->
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-header-text">About Me</h5>
                                            <button id="edit-btn" type="button"
                                                class="btn btn-sm btn-primary waves-effect waves-light f-right">
                                                <i class="icofont icofont-edit"></i>
                                            </button>
                                        </div>
                                        <div class="card-block">
                                            <div class="view-info">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="general-info">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="table-responsive">
                                                                        <table class="table m-0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th scope="row">
                                                                                        Username
                                                                                    </th>
                                                                                    <td>{{$wisher->username}}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">
                                                                                        Email</th>
                                                                                    <td>{{ $wisher->email ? $wisher->email : 'N/A' }}
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <!-- end of table col-lg-6 -->
                                                                {{-- <div class="col-lg-12 col-xl-6">
                                                                    <div class="table-responsive">
                                                                        <table class="table">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th scope="row">
                                                                                        Email</th>
                                                                                    <td><a
                                                                                            href="#!">{{ $wisher->email ? $wisher->email : 'N/A' }}</a>
                                                                </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">
                                                                        Mobile
                                                                        Number</th>
                                                                    <td>(0123) -
                                                                        4567891</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">
                                                                        Twitter</th>
                                                                    <td>@xyz</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">
                                                                        Skype</th>
                                                                    <td>demo.skype
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">
                                                                        Website</th>
                                                                    <td><a href="#!">www.demo.com</a>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                                </table>
                                                            </div>
                                                        </div> --}}
                                                        <!-- end of table col-lg-6 -->
                                                    </div>
                                                    <!-- end of row -->
                                                </div>
                                                <!-- end of general info -->
                                            </div>
                                            <!-- end of col-lg-12 -->
                                        </div>
                                        <!-- end of row -->
                                    </div>
                                    <!-- end of view-info -->
                                    <div class="edit-info">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <form method="POST" action="{{ route('updateWisherProfile') }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="general-info form-material">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="material-group m-b-20">
                                                                    <div class="material-addone">
                                                                        <i class="icofont icofont-camera"></i>
                                                                    </div>
                                                                    <input type="hidden" name="path"
                                                                        value="{{ $wisher->profile_photo }}">
                                                                    <div class="form-group form-primary">
                                                                        <input type="file" name="profile_photo"
                                                                            accept="image/*" class="form-control">
                                                                        <span class="form-bar"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="material-group">
                                                                    <div class="material-addone">
                                                                        <i class="icofont icofont-user"></i>
                                                                    </div>
                                                                    <div class="form-group form-primary">
                                                                        <input type="text" name="username"
                                                                            class="form-control"
                                                                            value="{{ $wisher->username }}" required>
                                                                        <span class="form-bar"></span>
                                                                        <label class="float-label">Username</label>
                                                                    </div>
                                                                </div>
                                                                <div class="material-group">
                                                                    <div class="material-addone">
                                                                        <i class="fa fa-envelope"></i>
                                                                    </div>
                                                                    <div class="form-group form-primary">
                                                                        <input type="text" name="email"
                                                                            value="{{ $wisher->email }}"
                                                                            class="form-control">
                                                                        <span class="form-bar"></span>
                                                                        <label class="float-label">Email</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end of row -->
                                                        <div class="text-center">
                                                            <button type="submit"
                                                                class="btn btn-primary waves-effect waves-light m-r-10">Save</button>
                                                            <button type="button" id="edit-cancel"
                                                                class="btn btn-danger waves-effect">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!-- end of edit info -->
                                            </div>
                                            <!-- end of col-lg-12 -->
                                        </div>
                                        <!-- end of row -->
                                    </div>
                                    <!-- end of edit-info -->
                                </div>
                                <!-- end of card-block -->
                            </div>
                            <!-- personal card end-->
                        </div>
                        <!-- tab pane personal end -->
                        <!-- tab pane info start -->
                        <div class="tab-pane" id="wishes" role="tabpanel">
                            <!-- wishes card start -->
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-header-text">Wishes</h5>
                                </div>
                                <div class="card-block">
                                    @if (sizeof($wishes) <= 0) @include('shared.no-wishes-msg') @endif <div class="row">
                                        @foreach ($wishes as $wish)
                                        <div class="col-md-6">
                                            <div class="card b-l-success business-info services m-b-20">
                                                <div class="card-header">
                                                    <div class="service-header">
                                                        <p class="card-text text-muted">
                                                            <span class="d-block mb-2"><i
                                                                    class="fa fa-clock-o fa-lg mr-2"></i>
                                                                {{ \Carbon\Carbon::createFromDate($wish->created_at)->diffForHumans() }}</span>
                                                            <span class="d-block mb-2"><i
                                                                    class="fa fa-calendar-check-o fa-lg mr-2"
                                                                    aria-hidden="true"></i>
                                                                {{ \Carbon\Carbon::createFromDate($wish->due_date)->diffForHumans() }}</span>
                                                        </p>
                                                    </div>
                                                    <span class="fa fa-cog text-muted f-right service-btn"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"
                                                        role="tooltip">
                                                    </span>
                                                    <div class="dropdown-menu dropdown-menu-right b-none services-list">
                                                        <a class="dropdown-item" href="#!"><i
                                                                class="icofont icofont-edit"></i>
                                                            Edit</a>
                                                        <a class="dropdown-item" href="#!"><i
                                                                class="icofont icofont-ui-delete"></i>
                                                            Delete</a>
                                                        <a class="dropdown-item" href="#!"><i
                                                                class="icofont icofont-eye-alt"></i>
                                                            View</a>
                                                    </div>
                                                </div>
                                                <div class="card-block">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <p class="lead">
                                                                {{ $wish->title }}
                                                            </p>
                                                        </div>
                                                        <!-- end of col-sm-8 -->
                                                    </div>
                                                    <!-- end of row -->
                                                </div>
                                                <!-- end of card-block -->
                                            </div>
                                        </div>
                                        @endforeach
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-header-text">Profit</h5>
                                        </div>
                                        <div class="card-block">
                                            <div id="main" style="height:300px;width: 100%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        <!-- info card end -->
                    </div>
                    <!-- tab pane info end -->
                    <!-- tab pane contact start -->
                    <div class="tab-pane" id="contacts" role="tabpanel">
                        <div class="row">
                            <div class="col-xl-3">
                                <!-- user contact card left side start -->
                                <div class="card">
                                    <div class="card-header contact-user">
                                        <img class="img-radius img-40" src="../files/assets/images/avatar-4.jpg"
                                            alt="contact-user">
                                        <h5 class="m-l-10">John Doe</h5>
                                    </div>
                                    <div class="card-block">
                                        <ul class="list-group list-contacts">
                                            <li class="list-group-item active"><a href="#">All Contacts</a>
                                            </li>
                                            <li class="list-group-item"><a href="#">Recent Contacts</a></li>
                                            <li class="list-group-item"><a href="#">Favourite Contacts</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-block groups-contact">
                                        <h4>Groups</h4>
                                        <ul class="list-group">
                                            <li class="list-group-item justify-content-between">
                                                Project
                                                <span class="badge badge-primary badge-pill">30</span>
                                            </li>
                                            <li class="list-group-item justify-content-between">
                                                Notes
                                                <span class="badge badge-success badge-pill">20</span>
                                            </li>
                                            <li class="list-group-item justify-content-between">
                                                Activity
                                                <span class="badge badge-info badge-pill">100</span>
                                            </li>
                                            <li class="list-group-item justify-content-between">
                                                Schedule
                                                <span class="badge badge-danger badge-pill">50</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Contacts<span class="f-15"> (100)</span></h4>
                                    </div>
                                    <div class="card-block">
                                        <div class="connection-list">
                                            <a href="#"><img class="img-fluid img-radius"
                                                    src="../files/assets/images/user-profile/follower/f-1.jpg" alt="f-1"
                                                    data-toggle="tooltip" data-placement="top"
                                                    data-original-title="Airi Satou">
                                            </a>
                                            <a href="#"><img class="img-fluid img-radius"
                                                    src="../files/assets/images/user-profile/follower/f-2.jpg" alt="f-2"
                                                    data-toggle="tooltip" data-placement="top"
                                                    data-original-title="Angelica Ramos">
                                            </a>
                                            <a href="#"><img class="img-fluid img-radius"
                                                    src="../files/assets/images/user-profile/follower/f-3.jpg" alt="f-3"
                                                    data-toggle="tooltip" data-placement="top"
                                                    data-original-title="Ashton Cox">
                                            </a>
                                            <a href="#"><img class="img-fluid img-radius"
                                                    src="../files/assets/images/user-profile/follower/f-4.jpg" alt="f-4"
                                                    data-toggle="tooltip" data-placement="top"
                                                    data-original-title="Cara Stevens">
                                            </a>
                                            <a href="#"><img class="img-fluid img-radius"
                                                    src="../files/assets/images/user-profile/follower/f-5.jpg" alt="f-5"
                                                    data-toggle="tooltip" data-placement="top"
                                                    data-original-title="Garrett Winters">
                                            </a>
                                            <a href="#"><img class="img-fluid img-radius"
                                                    src="../files/assets/images/user-profile/follower/f-1.jpg" alt="f-6"
                                                    data-toggle="tooltip" data-placement="top"
                                                    data-original-title="Cedric Kelly">
                                            </a>
                                            <a href="#"><img class="img-fluid img-radius"
                                                    src="../files/assets/images/user-profile/follower/f-3.jpg" alt="f-7"
                                                    data-toggle="tooltip" data-placement="top"
                                                    data-original-title="Brielle Williamson">
                                            </a>
                                            <a href="#"><img class="img-fluid img-radius"
                                                    src="../files/assets/images/user-profile/follower/f-5.jpg" alt="f-8"
                                                    data-toggle="tooltip" data-placement="top"
                                                    data-original-title="Jena Gaines">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- user contact card left side end -->
                            </div>
                            <div class="col-xl-9">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- contact data table card start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-header-text">Contacts
                                                </h5>
                                            </div>
                                            <div class="card-block contact-details">
                                                <div class="data_table_main table-responsive dt-responsive">
                                                    <table id="simpletable"
                                                        class="table  table-striped table-bordered nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Email</th>
                                                                <th>Mobileno.</th>
                                                                <th>Favourite</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star-o" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star-o" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star-o" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star-o" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star-o" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star-o" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star-o" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>abc123@gmail.com
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Email</th>
                                                                <th>Mobileno.</th>
                                                                <th>Favourite</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- contact data table card end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- tab pane contact end -->
                    <div class="tab-pane" id="review" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-header-text">Review</h5>
                            </div>
                            <div class="card-block">
                                <ul class="media-list">
                                    <li class="media">
                                        <div class="media-left">
                                            <a href="#">
                                                <img class="media-object img-radius comment-img"
                                                    src="../files/assets/images/avatar-1.jpg"
                                                    alt="Generic placeholder image">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="media-heading">Sortino media<span
                                                    class="f-12 text-muted m-l-5">Just
                                                    now</span></h6>
                                            <div class="stars-example-css review-star">
                                                <i class="icofont icofont-star"></i>
                                                <i class="icofont icofont-star"></i>
                                                <i class="icofont icofont-star"></i>
                                                <i class="icofont icofont-star"></i>
                                                <i class="icofont icofont-star"></i>
                                            </div>
                                            <p class="m-b-0">Cras sit amet nibh libero,
                                                in gravida nulla. Nulla vel metus
                                                scelerisque ante sollicitudin commodo.
                                                Cras purus odio, vestibulum in vulputate
                                                at, tempus viverra turpis.</p>
                                            <div class="m-b-25">
                                                <span><a href="#!" class="m-r-10 f-12">Reply</a></span><span><a
                                                        href="#!" class="f-12">Edit</a>
                                                </span>
                                            </div>
                                            <hr>
                                            <!-- Nested media object -->
                                            <div class="media mt-2">
                                                <a class="media-left" href="#">
                                                    <img class="media-object img-radius comment-img"
                                                        src="../files/assets/images/avatar-2.jpg"
                                                        alt="Generic placeholder image">
                                                </a>
                                                <div class="media-body">
                                                    <h6 class="media-heading">Larry
                                                        heading <span class="f-12 text-muted m-l-5">Just
                                                            now</span></h6>
                                                    <div class="stars-example-css review-star">
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                    </div>
                                                    <p class="m-b-0"> Cras sit amet nibh
                                                        libero, in gravida nulla. Nulla
                                                        vel metus scelerisque ante
                                                        sollicitudin commodo. Cras purus
                                                        odio, vestibulum in vulputate
                                                        at, tempus viverra turpis.</p>
                                                    <div class="m-b-25">
                                                        <span><a href="#!" class="m-r-10 f-12">Reply</a></span><span><a
                                                                href="#!" class="f-12">Edit</a>
                                                        </span>
                                                    </div>
                                                    <hr>
                                                    <!-- Nested media object -->
                                                    <div class="media mt-2">
                                                        <div class="media-left">
                                                            <a href="#">
                                                                <img class="media-object img-radius comment-img"
                                                                    src="../files/assets/images/avatar-3.jpg"
                                                                    alt="Generic placeholder image">
                                                            </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <h6 class="media-heading">
                                                                Colleen Hurst <span class="f-12 text-muted m-l-5">Just
                                                                    now</span></h6>
                                                            <div class="stars-example-css review-star">
                                                                <i class="icofont icofont-star"></i>
                                                                <i class="icofont icofont-star"></i>
                                                                <i class="icofont icofont-star"></i>
                                                                <i class="icofont icofont-star"></i>
                                                                <i class="icofont icofont-star"></i>
                                                            </div>
                                                            <p class="m-b-0">Cras sit
                                                                amet nibh libero, in
                                                                gravida nulla. Nulla vel
                                                                metus scelerisque ante
                                                                sollicitudin commodo.
                                                                Cras purus odio,
                                                                vestibulum in vulputate
                                                                at, tempus viverra
                                                                turpis.</p>
                                                            <div class="m-b-25">
                                                                <span><a href="#!"
                                                                        class="m-r-10 f-12">Reply</a></span><span><a
                                                                        href="#!" class="f-12">Edit</a>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Nested media object -->
                                            <div class="media mt-2">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object img-radius comment-img"
                                                            src="../files/assets/images/avatar-1.jpg"
                                                            alt="Generic placeholder image">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="media-heading">Cedric
                                                        Kelly<span class="f-12 text-muted m-l-5">Just
                                                            now</span></h6>
                                                    <div class="stars-example-css review-star">
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                    </div>
                                                    <p class="m-b-0">Cras sit amet nibh
                                                        libero, in gravida nulla. Nulla
                                                        vel metus scelerisque ante
                                                        sollicitudin commodo. Cras purus
                                                        odio, vestibulum in vulputate
                                                        at, tempus viverra turpis.</p>
                                                    <div class="m-b-25">
                                                        <span><a href="#!" class="m-r-10 f-12">Reply</a></span><span><a
                                                                href="#!" class="f-12">Edit</a>
                                                        </span>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="media mt-2">
                                                <a class="media-left" href="#">
                                                    <img class="media-object img-radius comment-img"
                                                        src="../files/assets/images/avatar-4.jpg"
                                                        alt="Generic placeholder image">
                                                </a>
                                                <div class="media-body">
                                                    <h6 class="media-heading">Larry
                                                        heading <span class="f-12 text-muted m-l-5">Just
                                                            now</span></h6>
                                                    <div class="stars-example-css review-star">
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                    </div>
                                                    <p class="m-b-0"> Cras sit amet nibh
                                                        libero, in gravida nulla. Nulla
                                                        vel metus scelerisque ante
                                                        sollicitudin commodo. Cras purus
                                                        odio, vestibulum in vulputate
                                                        at, tempus viverra turpis.</p>
                                                    <div class="m-b-25">
                                                        <span><a href="#!" class="m-r-10 f-12">Reply</a></span><span><a
                                                                href="#!" class="f-12">Edit</a>
                                                        </span>
                                                    </div>
                                                    <hr>
                                                    <!-- Nested media object -->
                                                    <div class="media mt-2">
                                                        <div class="media-left">
                                                            <a href="#">
                                                                <img class="media-object img-radius comment-img"
                                                                    src="../files/assets/images/avatar-3.jpg"
                                                                    alt="Generic placeholder image">
                                                            </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <h6 class="media-heading">
                                                                Colleen Hurst <span class="f-12 text-muted m-l-5">Just
                                                                    now</span></h6>
                                                            <div class="stars-example-css review-star">
                                                                <i class="icofont icofont-star"></i>
                                                                <i class="icofont icofont-star"></i>
                                                                <i class="icofont icofont-star"></i>
                                                                <i class="icofont icofont-star"></i>
                                                                <i class="icofont icofont-star"></i>
                                                            </div>
                                                            <p class="m-b-0">Cras sit
                                                                amet nibh libero, in
                                                                gravida nulla. Nulla vel
                                                                metus scelerisque ante
                                                                sollicitudin commodo.
                                                                Cras purus odio,
                                                                vestibulum in vulputate
                                                                at, tempus viverra
                                                                turpis.</p>
                                                            <div class="m-b-25">
                                                                <span><a href="#!"
                                                                        class="m-r-10 f-12">Reply</a></span><span><a
                                                                        href="#!" class="f-12">Edit</a>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media mt-2">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object img-radius comment-img"
                                                            src="../files/assets/images/avatar-2.jpg"
                                                            alt="Generic placeholder image">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="media-heading">Mark
                                                        Doe<span class="f-12 text-muted m-l-5">Just
                                                            now</span></h6>
                                                    <div class="stars-example-css review-star">
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                    </div>
                                                    <p class="m-b-0">Cras sit amet nibh
                                                        libero, in gravida nulla. Nulla
                                                        vel metus scelerisque ante
                                                        sollicitudin commodo. Cras purus
                                                        odio, vestibulum in vulputate
                                                        at, tempus viverra turpis.</p>
                                                    <div class="m-b-25">
                                                        <span><a href="#!" class="m-r-10 f-12">Reply</a></span><span><a
                                                                href="#!" class="f-12">Edit</a>
                                                        </span>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <form class="form-material right-icon-control">
                                    <div class="form-group form-primary">
                                        <input type="text" class="form-control" required="">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Write
                                            something.....</label>
                                    </div>
                                    <div class="form-icon ">
                                        <button class="btn btn-success btn-icon  waves-effect waves-light">
                                            <i class="icofont icofont-send-mail"></i>
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- tab content end -->
            </div>
        </div>
    </div>
    <!-- Page-body end -->
</div>
</div>
<!-- Page-body end -->
</div>
<div id="styleSelector"> </div>
</div>
<!-- View Profile Image Modal -->
<div class="modal fade" id="viewProfileImageModal" tabindex="-1" role="dialog"
    aria-labelledby="viewProfileImageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body viewProfileImageModalBody p-0">
                <img class="img-fluid" src="@if($wisher->profile_photo &&
                                                        \Storage::disk('s3')->exists($wisher->profile_photo))
                                                        {{ \Storage::disk('s3')->url($wisher->profile_photo) }} @else
                                                        {{ \Storage::disk('s3')->url(config('defaultImageLinks.profilePhoto')) }}
                                                        @endif" alt="Profile Photo">
            </div>
            <div class="modal-footer text-center">
                @if ($wisher->profile_photo)
                <button class="btn btn-danger btn-sm" onclick="removeProfilePhoto()"><i class="fa fa-minus-circle"></i>
                    Remove</button>
                @endif
                <form id="removeProfilePhoto-form" action="{{ route('removeProfilePhoto') }}" method="POST"
                    style="display: none;">
                    @method('DELETE')
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-js')
<!-- data-table js -->
<script src="../files/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<!-- ck editor -->
<script src="../files/assets/pages/ckeditor/ckeditor.js"></script>
<!-- echart js -->
<script src="../files/assets/pages/chart/echarts/js/echarts-all.js" type="text/javascript"></script>
<script src="../files/assets/pages/user-profile.js"></script>

@endsection
