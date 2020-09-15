<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">
        <div class="navbar-logo">
            <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                <i class="ti-menu"></i>
            </a>
            <div class="mobile-search waves-effect waves-light">
                <div class="header-search">
                    <div class="main-search morphsearch-search">
                        <div class="input-group">
                            <span class="input-group-prepend search-close"><i
                                    class="ti-close input-group-text"></i></span>
                            <input type="text" class="form-control" placeholder="Enter Keyword">
                            <span class="input-group-append search-btn"><i
                                    class="ti-search input-group-text"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <a href="index.html">
                <img class="img-fluid" src="../files/assets/images/logo.png" alt="Theme-Logo" />
            </a>
            <a class="mobile-options waves-effect waves-light">
                <i class="ti-more"></i>
            </a>
        </div>

        <div class="navbar-container container-fluid">
            <ul class="nav-left">
                <li>
                    <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a>
                    </div>
                </li>
                <li class="header-search">
                    <div class="main-search morphsearch-search">
                        <div class="input-group">
                            <span class="input-group-prepend search-close"><i
                                    class="ti-close input-group-text"></i></span>
                            <input type="text" class="form-control" placeholder="Enter Keyword">
                            <span class="input-group-append search-btn"><i
                                    class="ti-search input-group-text"></i></span>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                        <i class="ti-fullscreen"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav-right">
                <li class="header-notification">
                    <a href="#!" class="waves-effect waves-light">
                        <i class="ti-bell"></i>
                        <span class="badge bg-c-red"></span>
                    </a>
                    <ul class="show-notification">
                        <li>
                            <h6>Notifications</h6>
                            <label class="label label-danger">New</label>
                        </li>
                        <li class="waves-effect waves-light">
                            <div class="media">
                                <img class="d-flex align-self-center img-radius"
                                    src="../files/assets/images/avatar-2.jpg" alt="Generic placeholder image">
                                <div class="media-body">
                                    <h5 class="notification-user">John Doe</h5>
                                    <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer
                                        elit.</p>
                                    <span class="notification-time">30 minutes ago</span>
                                </div>
                            </div>
                        </li>
                        <li class="waves-effect waves-light">
                            <div class="media">
                                <img class="d-flex align-self-center img-radius"
                                    src="../files/assets/images/avatar-4.jpg" alt="Generic placeholder image">
                                <div class="media-body">
                                    <h5 class="notification-user">Joseph William</h5>
                                    <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer
                                        elit.</p>
                                    <span class="notification-time">30 minutes ago</span>
                                </div>
                            </div>
                        </li>
                        <li class="waves-effect waves-light">
                            <div class="media">
                                <img class="d-flex align-self-center img-radius"
                                    src="../files/assets/images/avatar-3.jpg" alt="Generic placeholder image">
                                <div class="media-body">
                                    <h5 class="notification-user">Sara Soudein</h5>
                                    <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer
                                        elit.</p>
                                    <span class="notification-time">30 minutes ago</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="#!" class="displayChatbox waves-effect waves-light">
                        <i class="ti-comments"></i>
                        <span class="badge bg-c-green"></span>
                    </a>
                </li>
                <li class="user-profile header-notification">
                    <a href="#!" class="waves-effect waves-light">
                        <img src="../files/assets/images/avatar-4.jpg" class="img-radius" alt="User-Profile-Image">
                        <span>John Doe</span>
                        <i class="ti-angle-down"></i>
                    </a>
                    <ul class="show-notification profile-notification">
                        <li class="waves-effect waves-light">
                            <a href="#!">
                                <i class="ti-settings"></i> Settings
                            </a>
                        </li>
                        <li class="waves-effect waves-light">
                            <a href="user-profile.html">
                                <i class="ti-user"></i> Profile
                            </a>
                        </li>
                        <li class="waves-effect waves-light">
                            <a href="email-inbox.html">
                                <i class="ti-email"></i> My Messages
                            </a>
                        </li>
                        <li class="waves-effect waves-light">
                            <a href="auth-lock-screen.html">
                                <i class="ti-lock"></i> Lock Screen
                            </a>
                        </li>
                        <li class="waves-effect waves-light">
                            <a href="auth-normal-sign-in.html">
                                <i class="ti-layout-sidebar-left"></i> Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>























@extends('layouts.app')
@section('page-css')
<link rel="stylesheet" href="{{ asset('css/wish-cards.css') }}">
<style>
    body {
        background-color: #D3D3D3 !important;
    }

</style>
@endsection
<!------ Include the above in your HEAD tag ---------->
@include('layouts.navbar')
@section('content')
<!-- Team -->
<section id="team" class="pb-5">
    <div class="container-fluid">
        <h3 class="text-center my-5">Wishes</h3>
        <div class="d-flex justify-content-end">
            @if (\Session::has('searchResults'))
            <div class="mr-2">
                <a class="btn btn-primary btn-success" href="{{ route('welcome') }}"><i
                        class="fa fa-long-arrow-left"></i> back to wishes</a>
            </div>
            @endif
            <form action="{{ route('searchWish') }}" class="w-50">
                <div class="form-group">
                    <div class="input-group">
                        <input type="search" class="form-control" name="title" placeholder="type to search wish">
                        <div class="input-group-append">
                            <button class="btn btn-primary btn-secondary" type="submit"><i
                                    class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </form>
            @if ($wisher)
            <div class="ml-2">
                <button class="btn btn-primary btn-success" data-toggle="modal" data-target="#addWishModal"><i
                        class="fa fa-plus"></i> Add Wish</button>
            </div>
            @endif
        </div>
        @if (\Session::has('searchResults'))
        <h3 class="text-center my-5">{{ session::get('searchResults') }}</h3>
        @endif
        <div class="row">
            @foreach ($wishes as $wish)
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    @if ((session('wisher') && $wish->wisher) && (session('wisher')->id ===
                                    $wish->wisher->id)) <p class="text-right"><small>For you</small></p>@endif
                                    <h5 class="my-1 card-text"></h5>
                                    <p class="my-2 card-text">{{ Str::limit($wish->title, 100, '...') }}</p>
                                    <hr>
                                    <p><small><strong>Created By: </strong></small>@if($wish->wisher)
                                        {{ $wish->wisher->username }} @endif</p>
                                    <p>About {{ \Carbon\Carbon::createFromDate($wish->created_at)->diffForHumans() }}
                                    </p>
                                    <p><small><strong> @if(\Carbon\Carbon::now()->greaterThan($wish->due_date)) Ended
                                                @else Ends @endif:
                                            </strong></small>{{ \Carbon\Carbon::createFromDate($wish->due_date)->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Sunlimetech</h4>
                                    <p class="my-2 card-text wish-title">{{ $wish->title }}</p>

                                    @if ((session('wisher') && $wish->wisher) && (session('wisher')->id ===
                                    $wish->wisher->id))
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-success mr-1"
                                            onclick="onEditWish({{ json_encode($wish, true) }})"><i
                                                class="fa fa-pencil"></i></button>
                                        <button type="button" class="btn btn-danger"
                                            onclick="onDeleteWish({{ json_encode($wish, true) }}, {{ json_encode(route('deleteWish', $wish->id), true) }})"><i
                                                class="fa fa-trash"></i></button>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
            @endforeach
        </div>
        {{-- <div class="d-flex justify-content-center">{{ $wishes->links() }}
    </div> --}}
    </div>
</section>
<form id="deleteWish-form" action="" method="POST" style="display: none;">
    @method('DELETE')
    @csrf
</form>
<!-- Team -->
<!-- Modal -->
<div class="modal fade" id="addWishModal" tabindex="-1" role="dialog" aria-labelledby="addWishModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addWishModal">Add Wish</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('addWish') }}" method="post" class="p-2" id="addWishForm">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Title</label>
                        <input type="text" class="form-control" name="title" id="formGroupExampleInput"
                            placeholder="title" required>
                    </div>
                    <div class="form-group">
                        <label for="">Due Date</label>
                        <input type="date" class="form-control" name="due_date">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="addTodoSubmitBtn">Save <i
                            class="fa fa-spinner fa-md fa-spin" style="display: none;"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="editWishModal" tabindex="-1" role="dialog" aria-labelledby="editWishModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editWishModalLabel">Edit Wish</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('updateWish', ['id' => 'wishId']) }}" method="POST" class="p-2 editWishForm">
                @method('PUT')
                @csrf
                <div class="modal-body editWishModalBody">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Title</label>
                        <input type="text" class="form-control" name="title" id="editTitle" placeholder="title"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="">Due Date</label>
                        <input type="date" class="form-control" name="due_date" id="editDue_date">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="editWishSubmitBtn">Save <i
                            class="fa fa-spinner fa-md fa-spin" style="display: none;"></button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('page-js')
<script>
    const onEditWish = (wish) => {
        $('.editWishForm').attr('action', $('.editWishForm').attr('action').replace('wishId', wish.id));
        const modalBody = $('.editWishModalBody');
        modalBody.find('#editTitle').val(wish.title);
        modalBody.find('#editDue_date').val(wish.due_date);
        $('#editWishModal').modal('show');
    }
    const onDeleteWish = (wish, url) => {
        Swal.fire({
            title: "",
            html: `Are you sure you want to remove <strong>${wish.title}</strong>`,
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonColor: "#d33",
        }).then((res) => {
            if (res.value) {
                $('#deleteWish-form').attr('action', url).submit();
            }
        });
    }
    $(function () {
        $('#addWishForm').on('submit', (event) => {
            $('#addWishSubmitBtn').find('.fa-spinner').show();
        });
        $('.editWishForm').on('submit', (event) => {
            $('#editWishSubmitBtn').find('.fa-spinner').show();
        })
    })
    $('#addWishModal').on('hidden.bs.modal', () => {
        $('#addWishSubmitBtn').find('.fa-spinner').hide();
    })
    $('#editWishModal').on('hidden.bs.modal', () => {
        $('#editWishSubmitBtn').find('.fa-spinner').hide();
    })
    $('.searchbox-input').on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $(".card").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

</script>
@endsection
