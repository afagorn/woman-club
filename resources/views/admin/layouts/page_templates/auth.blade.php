<div class="wrapper ">
    @include('admin.layouts.navbars.sidebar')
    <div class="main-panel">
        @include('admin.layouts.navbars.navs.auth')

        <div class="content">
            <div class="container">
                @section('breadcrumbs', Breadcrumbs::render())
                @yield('breadcrumbs')

                @include('flash::message')
            </div>
            <div class="{{ isset($containerFluid) ? 'container-fluid' : 'container' }}">
                @yield('content')
            </div>
        </div>

        @include('admin.layouts.footers.auth')
    </div>
</div>
