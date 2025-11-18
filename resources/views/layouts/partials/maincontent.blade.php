<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid page-container main-body-container">
        <!-- Start::page-header -->
        <div class="page-header-breadcrumb mb-3">
            <div class="d-flex align-center justify-content-between flex-wrap">
                <h1 class="page-title fw-medium fs-18 mb-0">@yield('page-title', 'Empty')</h1>
                <ol class="breadcrumb mb-0">
                    @hasSection('breadcrumb')
                        @yield('breadcrumb')
                    @else
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@yield('page-title', 'Empty')</li>
                    @endif
                </ol>
            </div>
        </div>
        <!-- End::page-header -->

        @yield('content')

    </div>
</div>
<!-- End::app-content -->
