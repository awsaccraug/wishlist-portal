@extends('layouts.app')
@section('content')
<div class="pcoded-inner-content">
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-body start -->
            <div class="page-body">
                <div class="m-t-40">
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
