<div class="wrapper ">
    @include('layouts.navbars.sidebar')
    <div class="main-panel">
        @include('layouts.navbars.navs.auth')

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

        @include('layouts.footers.auth')
    </div>
</div>
