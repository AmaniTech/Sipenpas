<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="{{route('home')}}" class="brand-link">
        <img src="/dist/assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image opacity-75 shadow"/>
        <span class="brand-text fw-light">AdminLTE 4</span>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard<i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="../index.html" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Dashboard v1</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../index2.html" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Dashboard v2</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../index3.html" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Dashboard v3</p>
                        </a>
                    </li>
                    </ul>
                </li>
                <li class="nav-header">MASTER</li>
                <li class="nav-item">
                    <a href="/juri" class="nav-link {{Route::currentRouteName() == 'juri.index' ? 'active' : ''}}">
                        <i class="bi bi-people"></i>
                        <p>Juri</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('kategori.index')}}" class="nav-link {{Route::currentRouteName() == 'kategori.index' ? 'active' : ''}}">
                        <i class="bi bi-database"></i>
                        <p>Kategori</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('subkategori.index')}}" class="nav-link {{Route::currentRouteName() == 'subkategori.index' ? 'active' : ''}}">
                        <i class="bi bi-database"></i>
                        <p>Sub Kategori</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
