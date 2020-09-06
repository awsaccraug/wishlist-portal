@extends('layouts.app')
@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/wish-cards.css') }}">
@endsection
@include('layouts.navbar')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-end">
            <div class="mr-2">
                <a class="btn btn-primary btn-success" href="{{ URL::previous() }}"><i class="fa fa-long-arrow-left"></i> back to wishes</a>
            </div>
            <form action="{{ route('searchWish') }}" class="w-50">
                <div class="form-group">
                    <div class="input-group">
                        <input type="search" class="form-control" name="title" placeholder="type to search wish">
                        <div class="input-group-append">
                            <button class="btn btn-primary btn-secondary" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </form>
            @if ($wisher)
                <div class="ml-2">
                    <button class="btn btn-primary btn-success" data-toggle="modal" data-target="#addWishModal"><i class="fa fa-plus"></i> Add Wish</button>
                </div>
            @endif
        </div>
    </div>
@endsection
