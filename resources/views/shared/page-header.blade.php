<div class="card">
    <div class="card-block">
        <div class="d-flex justify-content-end">
            <div class="w-100">
                <form class="form-material" action="{{ route('searchWish') }}">
                    <div class="form-group form-primary">
                        <input type="text" name="title" class="form-control" required="">
                        <span class="form-bar"></span>
                        <label class="float-label text-muted" style="font-size: large"><i
                                class="fa fa-search m-r-10"></i>Search {{ sizeof($wishes) }}
                            wishes</label>
                    </div>
                </form>
            </div>
            @if ($wisher)
            <div class="ml-1">
                <button class="btn btn-primary" data-toggle="modal" data-target="#addWishModal"><i
                        class="fa fa-plus"></i> Add Wish</button>
            </div>
            @endif
        </div>
    </div>
</div>
