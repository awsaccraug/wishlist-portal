<!-- View Modal -->
<div class="modal fade" id="viewWishModal" tabindex="-1" role="dialog" aria-labelledby="viewWishModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body viewWishModalBody p-0">
                <img class="img-fluid" src="" alt="Cover photo">
                <div class="p-5">
                    <p class="lead viewTitle"></p>
                    <span class="card-text text-muted">Created <span class="viewCreatedAt"></span></span>
                    <span class="card-text text-muted float-right">Ends <span class="viewDueDate"></span></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Add Modal -->
<div class="modal fade" id="addWishModal" tabindex="-1" role="dialog" aria-labelledby="addWishModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="addWishModal">Add Wish</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('addWish') }}" method="post" class="p-2" id="addWishForm"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <p class="text-inverse text-center"><b>All fields with * are
                            required</b></p>

                    <div class="form-group">
                        <label for="formGroupExampleInput">Title*</label>
                        <textarea name="title" class="form-control" cols="5" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Due Date*</label>
                        <input type="date" class="form-control" name="due_date" required>
                    </div>
                    <div class="form-group">
                        <label for="">Cover Photo</label>
                        <input type="file" class="form-control" name="cover_photo" accept="image/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="addWishSubmitBtn">Save <i
                            class="fa fa-spinner fa-md fa-spin" style="display: none;"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Modal -->
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
            <form action="{{ route('updateWish', ['id' => 'wishId']) }}" method="POST" class="p-2 editWishForm"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-body editWishModalBody">
                    <p class="text-inverse text-center"><b>All fields with * are
                            required</b></p>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Title*</label>
                        <textarea name="title" class="form-control" id="editTitle" cols="5" rows="3"
                            required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Due Date*</label>
                        <input type="date" class="form-control" name="due_date" id="editDue_date" required>
                    </div>
                    <input type="hidden" name="path" id="cover_photo_path">
                    <div class="form-group">
                        <label for="">Cover Photo</label>
                        <input type="file" class="form-control" name="cover_photo" accept="image/*">
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
<form id="deleteWish-form" action="" method="POST" style="display: none;">
    @method('DELETE')
    @csrf
</form>
