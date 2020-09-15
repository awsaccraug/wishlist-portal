const onViewWish = (wish, element) => {
    const modalBody = $('.viewWishModalBody');
    modalBody.find('img').attr("src", element.attr("data-photo-url"));
    modalBody.find('.viewTitle').text(wish.title);
    modalBody.find('.viewCreatedAt').text(moment(wish.created_at).fromNow());
    modalBody.find('.viewDueDate').text(moment(wish.due_date).fromNow());


    $('#viewWishModal').modal('show');
}
const onEditWish = (wish) => {
    $('.editWishForm').attr('action', $('.editWishForm').attr('action').replace('wishId', wish.id));
    const modalBody = $('.editWishModalBody');
    modalBody.find('#editTitle').val(wish.title);
    modalBody.find('#editDue_date').val(wish.due_date);
    modalBody.find('#cover_photo_path').val(wish.cover_photo)
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
    $('#addWishForm').on('submit', () => {
        $('#addWishSubmitBtn').attr('disabled', true);
        $('#addWishSubmitBtn').find('.fa-spinner').show();
    });
    $('.editWishForm').on('submit', (event) => {
        $('#editWishSubmitBtn').attr('disabled', true);
        $('#editWishSubmitBtn').find('.fa-spinner').show();
    })
})
$('#addWishModal').on('hidden.bs.modal', () => {
    $('#addWishSubmitBtn').attr('disabled', false);
    $('#addWishSubmitBtn').find('.fa-spinner').hide();
})
$('#editWishModal').on('hidden.bs.modal', () => {
    $('#editWishSubmitBtn').attr('disabled', false);
    $('#editWishSubmitBtn').find('.fa-spinner').hide();
})
