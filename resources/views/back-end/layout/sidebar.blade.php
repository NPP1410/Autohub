@php
    $menus = Helper::sidebarMenuTree();
    $isActive = function ($url) {
        $url = trim($url ?? '', '/');

        if ($url === '') {
            return request()->is('webpanel') || request()->is('webpanel/');
        }

        return request()->is('webpanel/' . $url)
            || request()->is('webpanel/' . $url . '/*');
    };
@endphp

<aside class="vertical-menu" aria-label="เมนูหลัก">
    <div class="sidebar-mobile-head">
        <a href="{{ url('webpanel') }}" class="sidebar-mobile-brand" aria-label="PipatDev Management">
            <span class="sidebar-brand-mark" aria-hidden="true">P</span>
            <span class="sidebar-brand-copy">
                <strong>ALPHA</strong>
                <small>Management Center</small>
            </span>
        </a>
        <button type="button" class="sidebar-close-btn" id="sidebar-close-btn" aria-label="ปิดเมนู">
            <i class="bx bx-x"></i>
        </button>
    </div>

    <div data-simplebar class="sidebar-scroll">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                @foreach($menus as $menu)
                    @if($menu->position === 'topic')
                        <li class="menu-title" key="t-menu">
                            <span>{{ $menu->name }}</span>
                        </li>

                        @foreach($menu->getRelation('sidebarChildren') as $topicMenu)
                            @include('back-end.layout.sidebar-menu-item', [
                                'menu' => $topicMenu,
                                'isActive' => $isActive,
                            ])
                        @endforeach
                    @else
                        @include('back-end.layout.sidebar-menu-item', [
                            'menu' => $menu,
                            'isActive' => $isActive,
                        ])
                    @endif
                @endforeach
            </ul>
        </div>
    </div>

    <div class="sidebar-panel-footer">
        <a href="{{ url('webpanel/logout') }}" class="sidebar-logout">
            <span class="sidebar-footer-icon"><i class="bx bx-log-out"></i></span>
            <span class="sidebar-footer-copy">ออกจากระบบ</span>
        </a>

        <div class="sidebar-version">PipatDev Management</div>
    </div>
</aside>

<button type="button" class="sidebar-mobile-backdrop" id="sidebar-mobile-backdrop" aria-label="ปิดเมนู"></button>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var closeButton = document.getElementById('sidebar-close-btn');
        var backdrop = document.getElementById('sidebar-mobile-backdrop');

        function closeSidebar() {
            document.body.classList.remove('sidebar-enable');
        }

        if (closeButton) closeButton.addEventListener('click', closeSidebar);
        if (backdrop) backdrop.addEventListener('click', closeSidebar);

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') closeSidebar();
        });
    });
</script>
