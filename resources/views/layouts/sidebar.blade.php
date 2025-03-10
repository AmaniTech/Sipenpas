<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="{{ route('home') }}" class="brand-link">
            <img src="/storage/logo/{{DB::table('setting')->where('id', 1)->value('logo')}}" alt="AdminLTE Logo" class="brand-image opacity-75 shadow" />
            <span class="brand-text fw-light">SIPENPAS {{date('Y')}}</span>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="/home" class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-header">MASTER</li>
                <li class="nav-item">
                    <a href="/juri" class="nav-link {{ Route::currentRouteName() == 'juri.index' ? 'active' : '' }}">
                        <i class="bi bi-people"></i>
                        <p>Juri</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('administrasi.index') }}"
                        class="nav-link {{ Route::currentRouteName() == 'administrasi.index' ? 'active' : '' }}">
                        <i class="bi bi-database"></i>
                        <p>Administrasi & Juri Arena</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('kategori.index') }}"
                        class="nav-link {{ Route::currentRouteName() == 'kategori.index' ? 'active' : '' }}">
                        <i class="bi bi-database"></i>
                        <p>Kategori</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('subkategori.index') }}"
                        class="nav-link {{ Route::currentRouteName() == 'subkategori.index' ? 'active' : '' }}">
                        <i class="bi bi-database"></i>
                        <p>Sub Kategori</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('peserta.index') }}"
                        class="nav-link {{ Route::currentRouteName() == 'peserta.index' ? 'active' : '' }}">
                        <i class="bi bi-person-vcard-fill"></i>
                        <p>Peserta</p>
                    </a>
                </li>
                <li class="nav-header">PENILAIAN</li>
                <li class="nav-item">
                    <a href="{{ route('penilaian.index') }}" class="nav-link {{ Route::currentRouteName() == 'penilaian.index' ? 'active' : '' }}">
                        <i class="bi bi-person-vcard-fill"></i>
                        <p>Penilaian</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('rekap.index') }}" class="nav-link {{ Route::currentRouteName() == 'rekap.index' ? 'active' : '' }}">
                        <i class="bi bi-person-vcard-fill"></i>
                        <p>Rekap</p>
                    </a>
                </li>
                <li class="nav-header">SETTING</li>
                <li class="nav-item">
                    <a href="{{ route('setting') }}"
                        class="nav-link {{ Route::currentRouteName() == 'setting' ? 'active' : '' }}">
                        <i class="bi bi-gear
                        "></i>
                        <p>Setting</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
