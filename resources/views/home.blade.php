@extends('layouts.app')
@section('content')
<div class="pcoded-inner-content">
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-body start -->
            <div class="page-body">
                <div class="row d-flex justify-content-end m-t-20">
                    <div></div>
                    <div class="page-header-title mx-auto">
                        <h5>My Wishes</h5>
                    </div>
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('welcome') }}"> <i class="fa fa-home"></i> </a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">My Wishes</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div>
                    @include('shared.page-header')
                    <div class="row">
                        <!-- task, page, download counter  start -->
                        @foreach ($wishes as $wish)
                        <div class="col-xl-3 col-md-6">
                            <div class="card elevate-1 wish-card">
                                @include('shared.wishes-card-body')
                                <div class="card-footer p-1 text-center" style="min-height: 50px;">
                                    @include('shared.card-footer-menu')
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- task, page, download counter  end -->
                    </div>
                </div>
            </div>
            <!-- Page-body end -->
        </div>
        {{-- <div id="styleSelector"> </div> --}}
    </div>
</div>
@include('shared.wishes-actions')
@endsection
@section('page-js')
<script src="{{ asset('js/wishes.js') }}"></script>
@endsection
