@extends('layouts.app')
@section('content')
<!-- Main-body start -->
<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-body start -->
        <div class="page-body">
            <h5 class="text-center my-4 display-5">All Wishes</h5>
            <div>
                @include('shared.page-header')
                <div class="row">
                    @foreach ($wishes as $wish)
                    <div class="col-lg-3 col-md-4 col-sm-6 ">
                        <div class="card elevate-1 wish-card">
                            @include('shared.wishes-card-body')
                            <div class="card-footer pt-0">
                                @include('shared.card-footer-menu')
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Page-body end -->
    </div>
    <div id="styleSelector"> </div>
</div>
@include('shared.wishes-actions')
@endsection
@section('page-js')
<script src="{{ asset('js/wishes.js') }}"></script>
@endsection
