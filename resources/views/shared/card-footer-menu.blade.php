<div class="d-flex justify-content-end">
    <div>
        <div class="btn-group btn-group-sm mr-2" style="display: none;" id="card-footer-btn-group-{{ $wish->id }}"
            role="group" aria-label="...">
            <button type="button" class="btn btn-secondary btn-primary"
                onclick="onViewWish({{ json_encode($wish, true) }}, $(this))" data-photo-url="@if($wish->cover_photo &&
                \Storage::disk('s3')->exists($wish->cover_photo))
                {{ \Storage::disk('s3')->url($wish->cover_photo)  }}
                @else {{ \Storage::disk('s3')->url(config('defaultImageLinks.wishes')) }} @endif"><i
                    class="fa fa-eye"></i></button>
            @if ($wisher)
            @if ((property_exists($wish, 'wisher') && $wish->wisher && $wisher->id === $wish->wisher->id) ||
            Request::is('home'))
            <button type="button" class="btn btn-secondary btn-success waves-effect md-trigger" data-modal="modal-1"
                onclick="onEditWish({{ json_encode($wish, true) }})"><i class="fa fa-pencil"></i></button>
            <button type="button" class="btn btn-secondary btn-danger"
                onclick="onDeleteWish({{ json_encode($wish, true) }}, {{ json_encode(route('deleteWish', $wish->id), true) }})"><i
                    class="fa fa-trash"></i></button>
            @endif
            @endif
        </div>
    </div>
    <div><button class="btn no-box-shadow btn-sm bg-white"
            onclick="$('#card-footer-btn-group-{{ $wish->id }}').toggle('slow')"><i
                class="fa fa-ellipsis-v fa-lg"></i></button></div>
</div>
