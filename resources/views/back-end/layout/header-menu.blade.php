@php
    $prefix = 'webpanel';
    $member = App\Models\Backend\AdminModel::find(Auth::guard('admin')->id());
    $headerNavs = collect($navs ?? [])->values();
    $headerPageTitle = data_get($headerNavs->last(), 'name', 'ภาพรวมระบบ');
    $thaiDayNames = ['อา.', 'จ.', 'อ.', 'พ.', 'พฤ.', 'ศ.', 'ส.'];
    $thaiMonthNames = [1 => 'ม.ค.', 2 => 'ก.พ.', 3 => 'มี.ค.', 4 => 'เม.ย.', 5 => 'พ.ค.', 6 => 'มิ.ย.', 7 => 'ก.ค.', 8 => 'ส.ค.', 9 => 'ก.ย.', 10 => 'ต.ค.', 11 => 'พ.ย.', 12 => 'ธ.ค.'];
    $today = now();
    $headerDate = $thaiDayNames[$today->dayOfWeek] . ' ' . $today->day . ' ' . $thaiMonthNames[$today->month] . ' ' . ($today->year + 543);
    $memberName = trim((string) optional($member)->fullname()) ?: 'ผู้ดูแลระบบ';
    $memberRole = (int) optional($member)->role === 1 ? 'Super Admin' : 'Administrator';
    $memberInitials = mb_strtoupper(
        mb_substr((string) optional($member)->firstname, 0, 1)
        . mb_substr((string) optional($member)->lastname, 0, 1)
    ) ?: 'PD';
    $imageMember = optional($member)->image;
@endphp

<header id="page-topbar">
    <div class="navbar-header">
        <div class="header-left-zone">
            <div class="navbar-brand-box">
                <a href="{{ url('webpanel') }}" class="logo sidebar-brand" aria-label="PipatDev Management">
                    <span class="sidebar-brand-mark" aria-hidden="true">P</span>
                    <span class="sidebar-brand-copy">
                        <strong>ALPHA</strong>
                        <small>Management Center</small>
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm font-size-16 header-item waves-effect" id="vertical-menu-btn" aria-label="ย่อหรือขยายเมนู">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <div class="header-page-context">
                <ol class="header-breadcrumb" aria-label="เส้นทางหน้าปัจจุบัน">
                    @forelse($headerNavs as $index => $nav)
                        <li class="{{ $index === $headerNavs->count() - 1 ? 'active' : '' }}">
                            @if(!empty($nav['url']) && $nav['url'] !== 'javascript:void(0)' && $index !== $headerNavs->count() - 1)
                                <a href="{{ url($nav['url']) }}">{{ $nav['name'] }}</a>
                            @else
                                <span>{{ $nav['name'] }}</span>
                            @endif
                        </li>
                    @empty
                        <li class="active"><span>ภาพรวมระบบ</span></li>
                    @endforelse
                </ol>
                <h1 class="header-page-title">{{ $headerPageTitle }}</h1>
            </div>
        </div>

        <div class="header-actions">
            <div class="header-date">
                <i class="bx bx-calendar"></i>
                <span>{{ $headerDate }}</span>
            </div>

            <button type="button" class="header-notification" aria-label="การแจ้งเตือน">
                <i class="bx bx-bell"></i>
                <span class="header-notification-dot" aria-hidden="true"></span>
            </button>

            <div class="dropdown d-inline-block">
                <button
                    type="button"
                    class="btn header-profile-trigger waves-effect"
                    id="page-header-user-dropdown"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                >
                    @if($imageMember)
                        <img class="header-profile-avatar" src="{{ asset($imageMember) }}" alt="{{ $memberName }}">
                    @else
                        <span class="header-profile-avatar header-profile-initials" aria-hidden="true">{{ $memberInitials }}</span>
                    @endif

                    <span class="header-profile-copy">
                        <strong>{{ $memberName }}</strong>
                        <small>{{ $memberRole }}</small>
                    </span>
                    <i class="mdi mdi-chevron-down header-profile-chevron"></i>
                </button>

                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="{{ url('webpanel/profile') }}">
                        <i class="bx bx-user font-size-16 align-middle me-1"></i>
                        <span key="t-profile">Profile</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{ url('webpanel/logout') }}">
                        <i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i>
                        <span key="t-logout">Logout</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
