<aside class="main-sidebar {{ config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4') }}">

    {{-- Sidebar brand logo --}}
    @if(config('adminlte.logo_img_xl'))
    @include('adminlte::partials.common.brand-logo-xl')
    @else
    @include('adminlte::partials.common.brand-logo-xs')
    @endif

    {{-- Sidebar menu --}}
    <div class="sidebar">
        <nav class="pt-2">
            <ul class="nav nav-pills nav-sidebar flex-column {{ config('adminlte.classes_sidebar_nav', '') }}" data-widget="treeview" role="menu" @if(config('adminlte.sidebar_nav_animation_speed') !=300) data-animation-speed="{{ config('adminlte.sidebar_nav_animation_speed') }}" @endif @if(!config('adminlte.sidebar_nav_accordion')) data-accordion="false" @endif>
                {{-- Configured sidebar links --}}
                @if(Auth::user()->type == 'patient')
                <li class="nav-item">
                    <a class="{{ request()->is('dashboard') ? 'nav-link active' : 'nav-link' }}" href="{{ route('dashboard') }}">
                        <i class="fas fa-fw fa-tachometer-alt" style="color: #c2c7d0;"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="{{ request()->is('antrian') ? 'nav-link active' : 'nav-link' }}" href="{{ route('patient.index') }}">
                        <i class="fas fa-fw fa-user-injured" style="color: #c2c7d0;"></i>
                        Antrian
                    </a>
                </li>
                <li class="nav-item">
                    <a class="{{ request()->is('antrian/cetak') ? 'nav-link active' : 'nav-link' }}" href="{{ route('patient.print_queue') }}">
                        <i class="fas fa-fw fa-print" style="color: #c2c7d0;"></i>
                        Cetak Antrian
                    </a>
                </li>
                @else
                @each('adminlte::partials.sidebar.menu-item', $adminlte->menu('sidebar'), 'item')
                @endif
            </ul>
        </nav>
    </div>

</aside>