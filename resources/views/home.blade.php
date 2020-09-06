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
                        <textarea name="title" class="form-control" cols="5" rows="3" required></textarea>
                        {{-- <input type="text" class="form-control" name="title" id="formGroupExampleInput"
                            placeholder="title" required> --}}
                    </div>
                    <div class="form-group">
                        <label for="">Due Date</label>
                        <input type="date" class="form-control" name="due_date" required>
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
<form id="deleteWish-form" action="" method="POST" style="display: none;">
    @method('DELETE')
    @csrf
</form>
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
                        <textarea name="title" class="form-control" id="editTitle" cols="5" rows="3"
                            required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Due Date</label>
                        <input type="date" class="form-control" name="due_date" id="editDue_date" required>
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
