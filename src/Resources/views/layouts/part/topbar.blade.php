<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <div class="navbar-brand-box horizontal-logo">
                  <x-ui-logo.bundle/>
                </div>
                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                        id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>
                <div class="d-flex align-items-center ms-3">
                    @stack('topbar-left')
                </div>
            </div>

            <div class="d-flex align-items-center">
                <div class="me-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                            data-toggle="fullscreen"
                            title="{{ __('Full screen') }}" data-bs-toggle="tooltip">
                        <i class='bx bx-fullscreen fs-22'></i>
                    </button>
                </div>

                <div class="me-1 header-item d-none d-sm-flex">
                    <button type="button"
                            class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode"
                            title="{{ __('Dark mode') }}" data-bs-toggle="tooltip">
                        <i class='bx bx-moon fs-22'></i>
                    </button>
                </div>
                @stack('topbar-right')
            </div>
        </div>
    </div>
</header>
