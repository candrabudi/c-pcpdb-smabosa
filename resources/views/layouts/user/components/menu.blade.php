<aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu bg-menu-theme flex-grow-0">
  <div class="container-xxl d-flex h-100">
    <ul class="menu-inner">

      @if(auth()->user())
        <li class="menu-item">
          <a href="/" class="menu-link">
            <i class="menu-icon tf-icons ti ti-smart-home"></i>
            <div data-i18n="Dashboard">Dashboard</div>
          </a>
        </li> <li class="menu-item">
          <a href="{{ route('user.student_form') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-book-2"></i>
            <div data-i18n="Formulir">Formulir</div>
          </a>
        </li>
      @else
        <li class="menu-item">
          <a href="/" class="menu-link">
            <i class="menu-icon tf-icons ti ti-smart-home"></i>
            <div data-i18n="Menu Utama">Menu Utama</div>
          </a>
        </li>
      @endif
    </ul>
  </div>
</aside>