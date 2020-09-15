<img class="card-img-top img-fluid" style="height: 15rem; border-radius: 25px;" src="@if($wish->cover_photo)
                                {{ $wish->cover_photo  }}
                                @else {{ asset('storage/wishes/cover_photos/default.jpg') }} @endif" alt="Cover photo">
<div class="card-block">
    <p class="lead" style="min-height: 4rem;"><strong>{{ Str::limit($wish->title, 45, '...') }}</strong></p>
    <p class="card-text text-muted">
        <span class="d-block mb-2"><i class="fa fa-clock-o fa-lg mr-2"></i>
            {{ \Carbon\Carbon::createFromDate($wish->created_at)->diffForHumans() }}</span>
        <span class="d-block mb-2"><i class="fa fa-calendar-check-o fa-lg mr-2" aria-hidden="true"></i>
            {{ \Carbon\Carbon::createFromDate($wish->due_date)->diffForHumans() }}</span>
        @if (Request::is('/'))
        <span class="d-block"><i class="icofont icofont-ui-user text-muted mr-2 "></i>
            {{ $wish->wisher->username }}</span>
        @endif
    </p>
</div>
