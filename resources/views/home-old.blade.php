@extends('layouts.app')

@section('content')
@include('layouts.navbar')
<div class="container-fluid">
    <h3 class="text-center my-5">My Wishes</h3>
    <div class="col-md-12">
        <div class="d-flex justify-content-end">
            @if (\Session::has('searchResults'))
            <div class="mr-2">
                <a class="btn btn-primary btn-success" href="{{ route('home') }}"><i class="fa fa-long-arrow-left"></i>
                    back to wishes</a>
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
        @if (sizeof($wishes) <= 0) <h4 class="text-center">There are currently no wishes</h4>
            @else
            <div class="card-columns">
                @foreach ($wishes as $wish)
                <div class="card">
                    <div class="card-body text-center">
                        <p class="my-2 card-text">{{ $wish->title }}</p>
                        <p><strong>Created :
                            </strong>{{ \Carbon\Carbon::createFromDate($wish->created_at)->diffForHumans() }}</p>
                        <p><strong> @if(\Carbon\Carbon::now()->greaterThan($wish->due_date)) Ended @else Ends @endif:
                            </strong>{{ \Carbon\Carbon::createFromDate($wish->due_date)->diffForHumans() }}</p>
                        <div class="col-md-12 text-center mt-3">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-success mr-1 btn-sm"
                                    onclick="onEditWish({{ json_encode($wish, true) }})"><i
                                        class="fa fa-pencil"></i></button>
                                <button type="button" class="btn btn-danger btn-sm"
                                    onclick="onDeleteWish({{ json_encode($wish, true) }}, {{ json_encode(route('deleteWish', $wish->id), true) }})"><i
                                        class="fa fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
    </div>
</div>
<form id="deleteWish-form" action="" method="POST" style="display: none;">
    @method('DELETE')
    @csrf
</form>

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
                    <button type="submit" class="btn btn-success" id="addHomeWishSubmitBtn">Save <i
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
                <h5 class="modal-title" id="editWishModalLabel">Edit Todo</h5>
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
        const modal = $('#editWishModal');
        const modalBody = $('.editWishModalBody');
        modalBody.find('#editTitle').val(wish.title);
        modalBody.find('#editDue_date').val(wish.due_date);
        modal.modal('show')
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
            $('#addHomeWishSubmitBtn').find('.fa-spinner').show();
        });
        $('.editWishForm').on('submit', (event) => {
            $('#editWishSubmitBtn').find('.fa-spinner').show();
        })
    })
    $('#addWishModal').on('hidden.bs.modal', () => {
        $('#addHomeWishSubmitBtn').find('.fa-spinner').hide();
    })
    $('#editWishModal').on('hidden.bs.modal', () => {
        $('#editWishSubmitBtn').find('.fa-spinner').hide();
    })

</script>
@endsection
