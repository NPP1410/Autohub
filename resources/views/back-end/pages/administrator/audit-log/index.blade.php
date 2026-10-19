<!doctype html>
<html lang="en">

<head>
    @include("$prefix.layout.header")
    <style>
        .log-preview {
            max-width: 460px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .log-url {
            max-width: 320px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .log-detail-box {
            background: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 12px;
            padding: 12px;
            max-height: 320px;
            overflow: auto;
            white-space: pre-wrap;
            word-break: break-word;
        }
    </style>
</head>

<body data-sidebar="dark">
    <div id="layout-wrapper">
        @include("$prefix.layout.header-menu")
        @include("$prefix.layout.sidebar")

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @include("$prefix.layout.breadcrumb")

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <p class="text-muted mb-1">Total Error Logs</p>
                                            <h4 class="mb-0 fw-bold">{{ number_format($totalLogs) }}</h4>
                                        </div>
                                        <div class="avatar-sm rounded-circle bg-danger-subtle text-danger">
                                            <span class="avatar-title rounded-circle bg-danger-subtle">
                                                <i class="bx bx-bug font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <p class="text-muted mb-1">Backend</p>
                                            <h4 class="mb-0 fw-bold text-primary">{{ number_format($backendLogs) }}</h4>
                                        </div>
                                        <div class="avatar-sm rounded-circle bg-primary-subtle text-primary">
                                            <span class="avatar-title rounded-circle bg-primary-subtle">
                                                <i class="bx bx-server font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <p class="text-muted mb-1">Frontend</p>
                                            <h4 class="mb-0 fw-bold text-warning">{{ number_format($frontendLogs) }}</h4>
                                        </div>
                                        <div class="avatar-sm rounded-circle bg-warning-subtle text-warning">
                                            <span class="avatar-title rounded-circle bg-warning-subtle">
                                                <i class="bx bx-window-alt font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm mb-3">
                        <div class="card-body py-3">
                            <form method="GET" action="">
                                <div class="row g-3 align-items-end">
                                    <div class="col-lg-3 col-md-6">
                                        <label class="form-label fw-medium">
                                            <i class="bx bx-calendar text-primary me-1"></i> วันที่เริ่มต้น
                                        </label>
                                        <input type="date" name="date_start" class="form-control" value="{{ request()->get('date_start') }}">
                                    </div>

                                    <div class="col-lg-3 col-md-6">
                                        <label class="form-label fw-medium">วันที่สิ้นสุด</label>
                                        <input type="date" name="date_end" class="form-control" value="{{ request()->get('date_end') }}">
                                    </div>

                                    <div class="col-lg-2 col-md-6">
                                        <label class="form-label fw-medium">
                                            <i class="bx bx-category text-primary me-1"></i> ประเภท
                                        </label>
                                        <select name="type" class="form-select">
                                            <option value="">ทั้งหมด</option>
                                            @foreach($types as $typeValue => $typeLabel)
                                                <option value="{{ $typeValue }}" {{ request()->get('type') === $typeValue ? 'selected' : '' }}>
                                                    {{ $typeLabel }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-2 col-md-6">
                                        <label class="form-label fw-medium">
                                            <i class="bx bx-layer text-primary me-1"></i> ระดับ
                                        </label>
                                        <select name="level" class="form-select">
                                            @foreach($levels as $levelValue => $levelLabel)
                                                <option value="{{ $levelValue }}" {{ request()->get('level', 'Error') === $levelValue ? 'selected' : '' }}>
                                                    {{ $levelLabel }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-2 col-md-12">
                                        <label class="form-label fw-medium">
                                            <i class="bx bx-search-alt text-primary me-1"></i> ค้นหา
                                        </label>
                                        <input type="text" name="keyword" class="form-control" value="{{ request()->get('keyword') }}" placeholder="ข้อความ, URL, line">
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="d-flex justify-content-end gap-2 mt-2">
                                            <a href="{{ url()->current() }}" class="btn btn-light">
                                                <i class="bx bx-refresh"></i> รีเซ็ต
                                            </a>
                                            <button type="submit" class="btn btn-primary px-4">
                                                <i class="bx bx-search"></i> ค้นหา
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="card-title mb-0">Error Log List</h4>
                                        <div class="text-muted">
                                            Showing {{ $items->count() }} of {{ $items->total() }} entries
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table align-middle table-nowrap">
                                            <thead class="table-light">
                                                <tr>
                                                    <th style="width:5%;" class="text-center">#</th>
                                                    <th style="width:12%;">Date</th>
                                                    <th style="width:8%;">Type</th>
                                                    <th style="width:8%;">Level</th>
                                                    <th style="width:8%;">Env</th>
                                                    <th style="width:7%;">Line</th>
                                                    <th style="width:18%;">URL</th>
                                                    <th>Description</th>
                                                    <th style="width:8%;" class="text-center">Detail</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($items as $index => $item)
                                                    <tr>
                                                        <td class="text-center">{{ $items->pages->start + $index + 1 }}</td>
                                                        <td>{{ $item->date ? date('d/m/Y H:i:s', strtotime($item->date)) : '-' }}</td>
                                                        <td>
                                                            <span class="badge bg-{{ $item->type === 'frontend' ? 'warning' : 'primary' }}">
                                                                {{ ucfirst($item->type ?: '-') }}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span class="badge bg-{{ $item->level === 'Error' ? 'danger' : ($item->level === 'Warning' ? 'warning' : 'secondary') }}">
                                                                {{ $item->level ?: '-' }}
                                                            </span>
                                                        </td>
                                                        <td>{{ $item->env ?: '-' }}</td>
                                                        <td>{{ $item->line ?: '-' }}</td>
                                                        <td>
                                                            <div class="log-url" title="{{ $item->url }}">
                                                                {{ $item->url ?: '-' }}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="log-preview" title="{{ $item->desc }}">
                                                                {{ $item->desc ?: '-' }}
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <button
                                                                type="button"
                                                                class="btn btn-sm btn-outline-primary"
                                                                data-date="{{ $item->date }}"
                                                                data-type="{{ $item->type }}"
                                                                data-level="{{ $item->level }}"
                                                                data-env="{{ $item->env }}"
                                                                data-line="{{ $item->line }}"
                                                                data-url="{{ $item->url }}"
                                                                data-desc="{{ $item->desc }}"
                                                                data-detail="{{ $item->detail }}"
                                                                onclick="openLogDetail(this)">
                                                                <i class="bx bx-search"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="9" class="text-center">- No error logs found -</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>

                                    @if($items->hasPages())
                                        <div class="mt-3">
                                            {{ $items->appends(request()->query())->links() }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="logDetailModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Error Log Detail</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row g-3 mb-3">
                                        <div class="col-md-3">
                                            <label class="form-label text-muted mb-1">Date</label>
                                            <div id="log-detail-date" class="fw-semibold">-</div>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label text-muted mb-1">Type</label>
                                            <div id="log-detail-type" class="fw-semibold">-</div>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label text-muted mb-1">Level</label>
                                            <div id="log-detail-level" class="fw-semibold">-</div>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label text-muted mb-1">Env</label>
                                            <div id="log-detail-env" class="fw-semibold">-</div>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label text-muted mb-1">Line</label>
                                            <div id="log-detail-line" class="fw-semibold">-</div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label text-muted mb-1">URL</label>
                                        <div id="log-detail-url" class="log-detail-box">-</div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label text-muted mb-1">Description</label>
                                        <div id="log-detail-desc" class="log-detail-box">-</div>
                                    </div>

                                    <div>
                                        <label class="form-label text-muted mb-1">Detail</label>
                                        <div id="log-detail-full" class="log-detail-box">-</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include("$prefix.layout.footer")
        </div>
    </div>

    @include("$prefix.layout.script")
    <script>
        function openLogDetail(button) {
            document.getElementById('log-detail-date').textContent = button.getAttribute('data-date') || '-';
            document.getElementById('log-detail-type').textContent = button.getAttribute('data-type') || '-';
            document.getElementById('log-detail-level').textContent = button.getAttribute('data-level') || '-';
            document.getElementById('log-detail-env').textContent = button.getAttribute('data-env') || '-';
            document.getElementById('log-detail-line').textContent = button.getAttribute('data-line') || '-';
            document.getElementById('log-detail-url').textContent = button.getAttribute('data-url') || '-';
            document.getElementById('log-detail-desc').textContent = button.getAttribute('data-desc') || '-';
            document.getElementById('log-detail-full').textContent = button.getAttribute('data-detail') || '-';

            $('#logDetailModal').modal('show');
        }
    </script>
</body>

</html>
