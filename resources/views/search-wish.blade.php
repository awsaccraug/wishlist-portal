@extends('layouts.app')
@section('content')
<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">
                <div class="row m-t-40">
                    <div class="col-sm-12">
                        <!-- Search result card start -->
                        <div class="card">
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-lg-6 offset-lg-3">
                                        <h4 class="m-b-20 text-center"><b>{{ sizeof($wishes) }}</b> Search Results Found
                                        </h4>
                                        {{-- <p class="txt-highlight text-center m-t-20">lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                                    nisi ut aliquip ex ea commodo consequat.
                                                </p> --}}
                                    </div>
                                </div>
                                <div class="row seacrh-header">
                                    <div class="col-lg-4 offset-lg-4 offset-sm-3 col-sm-6 offset-sm-1 col-xs-12">
                                        <form class="form-material" action="{{ route('searchWish') }}">
                                            <div class="md-group-add-on form-group form-primary">
                                                <span class="md-add-on-file">
                                                    <button class="btn btn-primary waves-effect waves-light"
                                                        type="submit">Search</button>
                                                </span>
                                                <div class="md-input-file">
                                                    <input type="text" name="title"
                                                        class="md-form-control md-form-file form-control"
                                                        placeholder="Search here...">
                                                    <span class="form-bar"></span>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Search result card end -->

                        <!-- Search result found start -->
                        <div class="row search-result">
                            @foreach ($wishes as $wish)
                            <div class="col-lg-3 col-md-4 col-sm-6 ">
                                <div class="card">
                                    <div class="card-block">
                                        {{-- <h5 class="card-title">{{ $wisher->email }}</h5> --}}
                                        <p class="card-text" style="font-size: medium; min-height: 50px;">
                                            <strong>{{ Str::limit($wish->title, 45, '...') }}</strong></p>
                                        <small class="text-muted d-block">Created
                                            {{ \Carbon\Carbon::createFromDate($wish->created_at)->diffForHumans() }}</small>
                                        <small
                                            class="text-muted d-block">@if(\Carbon\Carbon::now()->greaterThan($wish->due_date))
                                            Ended
                                            @else Ends @endif
                                            {{ \Carbon\Carbon::createFromDate($wish->due_date)->diffForHumans() }}</small>
                                    </div>
                                    <div class="card-footer p-1 text-center" style="min-height: 50px;">
                                        @if ((session('wisher') && $wish->wisher) && (session('wisher')->id ===
                                        $wish->wisher->id))
                                        <button type="button" class="btn btn-sm btn-success"
                                            onclick="onEditWish({{ json_encode($wish, true) }})"><i
                                                class="fa fa-lg fa-pencil"></i></button>
                                        <button type="button" class="btn btn-sm btn-danger"
                                            onclick="onDeleteWish({{ json_encode($wish, true) }}, {{ json_encode(route('deleteWish', $wish->id), true) }})"><i
                                                class="fa fa-lg fa-trash"></i></button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!-- Search result found end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
