<div class="sidebar" data-color="orange" data-background-color="white"
     data-image="/img/material-dashboard/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="https://creative-tim.com/" class="simple-text logo-normal">English club</a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('admin.home') }}">
          <i class="material-icons">dashboard</i>
          <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      {{--<li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:25px" src="/img/material-dashboard/laravel.svg"></i>
          <p>{{ __('Laravel Examples') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse {{ $activePage == 'profile' ? ' show' : '' }}" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('User profile') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('User Management') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>--}}

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#sidebarProducts">
          <i class="material-icons">list</i>
          <p>Продукты <b class="caret"></b></p>
        </a>
        <div class="collapse {{$activePage == 'productsList' ? 'show' : ''}}" id="sidebarProducts">
          <ul class="nav">
            <li class="nav-item {{$activePage == 'productsList' ? 'active' : ''}}">
              <a class="nav-link" href="{{route('admin.products.index')}}">
                <i class="material-icons">visibility</i>
                <span class="sidebar-normal">Посмотреть все</span>
              </a>
            </li>
            <li class="nav-item {{$activePage == 'productsCreate' ? 'active' : ''}}">
              <a class="nav-link" href="{{route('admin.products.create')}}">
                <i class="material-icons">add_circle</i>
                <span class="sidebar-normal">Создать новый</span>
              </a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#sidebarOrders">
          <i class="material-icons">list</i>
          <p>Заказы <b class="caret"></b></p>
        </a>
        <div class="collapse {{$activePage == 'orderList' ? 'show' : ''}}" id="sidebarOrders">
          <ul class="nav">
            <li class="nav-item {{$activePage == 'orderList' ? 'active' : ''}}">
              <a class="nav-link" href="{{route('admin.order.index')}}">
                <i class="material-icons">visibility</i>
                <span class="sidebar-normal">Посмотреть все</span>
              </a>
            </li>
            <li class="nav-item {{$activePage == 'orderCreate' ? 'active' : ''}}">
              <a class="nav-link" href="{{route('admin.order.create')}}">
                <i class="material-icons">add_circle</i>
                <span class="sidebar-normal">Создать новый</span>
              </a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#sidebarCustomers">
          <i class="material-icons">list</i>
          <p>Покупатели <b class="caret"></b></p>
        </a>
        <div class="collapse show" id="sidebarCustomers">
          <ul class="nav">
            <li class="nav-item {{$activePage == 'customerList' ? 'active' : ''}}">
              <a class="nav-link" href="{{route('admin.customer.index')}}">
                <i class="material-icons">visibility</i>
                <span class="sidebar-normal">Посмотреть все</span>
              </a>
            </li>
            <li class="nav-item {{$activePage == 'customerCreate' ? 'active' : ''}}">
              <a class="nav-link" href="{{route('admin.customer.create')}}">
                <i class="material-icons">add_circle</i>
                <span class="sidebar-normal">Создать новый</span>
              </a>
            </li>
          </ul>
        </div>
      </li>

      {{--<li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('table') }}">
          <i class="material-icons">content_paste</i>
          <p>{{ __('Table List') }}</p>
        </a>
      </li>--}}

    </ul>
  </div>
</div>
