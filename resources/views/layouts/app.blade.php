@include('layouts.head')

<!-- Pre-loader start -->
@include('shared.preloader')
<!-- Pre-loader end -->
<div id="pcoded" class="pcoded">
    <div class="pcoded-container">
        @include('layouts.header')
        <div class="pcoded-main-container">
            @include('layouts.navbar')
            <div class="pcoded-wrapper">
                <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.foot')
