<?php

namespace App\Http\Controllers\Webpanel\Administrator;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Backend\Logs_listModel;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class AuditLogController extends Controller
{
    protected $prefix = 'back-end';
    protected $segment = 'webpanel';
    protected $controller = 'log';
    protected $folder_controller = 'administrator.audit-log';
    protected $folder = 'administrator/log';
    protected $menu_key = 'administrator.log';
    protected $name_page = 'Error Log';

    public function items($parameters)
    {
        $paginate = (int) Arr::get($parameters, 'total', 50);
        $type = trim((string) Arr::get($parameters, 'type', ''));
        $level = trim((string) Arr::get($parameters, 'level', 'Error'));
        $dateStart = Arr::get($parameters, 'date_start');
        $dateEnd = Arr::get($parameters, 'date_end');
        $keyword = trim((string) Arr::get($parameters, 'keyword', ''));

        $query = Logs_listModel::query();

        if ($level !== '') {
            $query->where('level', $level);
        }

        if ($type !== '') {
            $query->where('type', $type);
        }

        if ($dateStart) {
            $query->whereDate('date', '>=', $dateStart);
        }

        if ($dateEnd) {
            $query->whereDate('date', '<=', $dateEnd);
        }

        if ($keyword !== '') {
            $query->where(function ($subQuery) use ($keyword) {
                $subQuery->where('desc', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('detail', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('url', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('env', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('line', 'LIKE', '%' . $keyword . '%');
            });
        }

        return $query->orderBy('date', 'desc')
            ->orderBy('id', 'desc')
            ->paginate($paginate);
    }

    public function index(Request $request)
    {
        if (!Helper::canView($this->menu_key)) {
            return Helper::auth_menu();
        }

        $items = $this->items($request->all());
        $items->pages = new \stdClass();
        $items->pages->start = ($items->perPage() * $items->currentPage()) - $items->perPage();

        $baseQuery = Logs_listModel::query();

        if ($request->filled('date_start')) {
            $baseQuery->whereDate('date', '>=', $request->date_start);
        }

        if ($request->filled('date_end')) {
            $baseQuery->whereDate('date', '<=', $request->date_end);
        }

        if ($request->filled('level')) {
            $baseQuery->where('level', $request->level);
        } else {
            $baseQuery->where('level', 'Error');
        }

        if ($request->filled('type')) {
            $baseQuery->where('type', $request->type);
        }

        if ($request->filled('keyword')) {
            $keyword = trim((string) $request->keyword);
            $baseQuery->where(function ($subQuery) use ($keyword) {
                $subQuery->where('desc', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('detail', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('url', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('env', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('line', 'LIKE', '%' . $keyword . '%');
            });
        }

        $summaryQuery = clone $baseQuery;
        $totalLogs = (clone $summaryQuery)->count();
        $backendLogs = (clone $summaryQuery)->where('type', 'backend')->count();
        $frontendLogs = (clone $summaryQuery)->where('type', 'frontend')->count();

        $navs = [
            '0' => ['url' => 'javascript:void(0)', 'name' => 'Administrator', 'last' => 0],
            '1' => ['url' => "$this->segment/$this->folder", 'name' => $this->name_page, 'last' => 1],
        ];

        return view("$this->prefix.pages.$this->folder_controller.index", [
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'name_page' => $this->name_page,
            'navs' => $navs,
            'items' => $items,
            'types' => [
                'backend' => 'Backend',
                'frontend' => 'Frontend',
            ],
            'levels' => [
                'Debug' => 'Debug',
                'Info' => 'Info',
                'Warning' => 'Warning',
                'Error' => 'Error',
            ],
            'totalLogs' => $totalLogs,
            'backendLogs' => $backendLogs,
            'frontendLogs' => $frontendLogs,
        ]);
    }
}
