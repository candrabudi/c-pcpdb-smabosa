@include('layouts.user.components.head')
@include('layouts.user.components.header')
  <div class="layout-page">
    <div class="content-wrapper">
      @include('layouts.user.components.menu')
      <div class="container-xxl flex-grow-1 container-p-y">
          @yield('content')
      </div>
      @include('layouts.user.components.footer')
    </div>
  </div>
@include('layouts.user.components.foot')