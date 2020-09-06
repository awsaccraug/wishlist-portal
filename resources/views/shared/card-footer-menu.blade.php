<div class="d-flex justify-content-end">
    <div>
        <div class="btn-group btn-group-sm mr-2" style="display: none;" id="card-footer-btn-group-{{ $wish->id }}"
            role="group" aria-label="...">
            <button type="button" class="btn btn-secondary btn-primary"
                onclick="onViewWish({{ json_encode($wish, true) }})"><i class="fa fa-eye"></i></button>
            <button type="button" class="btn btn-secondary btn-success"
                onclick="onEditWish({{ json_encode($wish, true) }})"><i class="fa fa-pencil"></i></button>
            <button type="button" class="btn btn-secondary btn-danger"
                onclick="onDeleteWish({{ json_encode($wish, true) }}, {{ json_encode(route('deleteWish', $wish->id), true) }})"><i
                    class="fa fa-trash"></i></button>
        </div>
    </div>
    <div><button class="btn card-footer-menu-button btn-sm"
            onclick="$('#card-footer-btn-group-{{ $wish->id }}').toggle('slow')"><i
                class="fa fa-ellipsis-v fa-lg"></i></button></div>
</div>
