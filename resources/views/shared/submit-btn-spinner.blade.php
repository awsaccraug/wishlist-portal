<i class="fa fa-spinner fa-spin ml-1" onclick="showOrHideElement($(this), 'show')" style="display: none"></i>
@section('page-js')
<script>
    const showOrHideElement = (element, action) => {
        if (action === 'show') {
            element.show();
        } else if (action === 'hide') {
            element.hide();
        }
    }

</script>
@endsection
