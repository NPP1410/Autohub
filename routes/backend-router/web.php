<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Webpanel as Webpanel;

Route::get('webpanel/login', [Webpanel\AuthController::class, 'getLogin']);
Route::post('webpanel/login', [Webpanel\AuthController::class, 'postLogin']);
Route::get('webpanel/logout', [Webpanel\AuthController::class, 'logOut']);

Route::group(['middleware' => ['Webpanel']], function () {
    Route::prefix('webpanel')->group(function () {
        Route::get('/dashboard', [Webpanel\DashboardController::class, 'index']);
        Route::get('/', [Webpanel\DashboardController::class, 'index']);
        Route::get('/profile', [Webpanel\DashboardController::class, 'profile']);
        Route::post('/profile', [Webpanel\DashboardController::class, 'profileSubmit']);

        // 
        //   Route::prefix('dashboard')->group(function () {

          //home
          //sale
          //sale manager
          //Manage Director
        //   });





        // Revenue
        Route::prefix('revenue')->group(function () {

        });

        // Expenditure
        Route::prefix('expenditure')->group(function () {

        });

        // Finance
        Route::prefix('finance')->group(function () {

        });


        // CRM
        Route::prefix('crm')->group(function () {

        
        });

        // Inventory
        Route::prefix('inventory')->group(function () {

        Route::get('/', [Webpanel\InventoryController::class, 'index']);
        // master รายชื่อ
        // 
        // setting ค่า ต่อ บาท ยึดหลัก บาทไทย (- THB/USD) 
        // 

        });


        // Category
        Route::prefix('category')->group(function () {

        // กลุ้มสินค้าและ อื่นๆ 

        });

        // Promotion และ Reward Point Rule
        Route::prefix('promotion')->group(function () {

        });



        //  Claim/Return Policy
        Route::prefix('claim')->group(function () {

        });

        // Delivery
        Route::prefix('delivery')->group(function () {

        });


        // Ticket
        Route::prefix('ticket')->group(function () {
            
            
        });


        // Report
        Route::prefix('report')->group(function () {
            
            
        });



        // Contact
        Route::prefix('contact')->group(function () {
            

        });



        Route::prefix('customer')->group(function () {
            Route::get('/', [Webpanel\CustomerController::class, 'index']);
            Route::get('/add', [Webpanel\CustomerController::class, 'add']);
            Route::post('/add', [Webpanel\CustomerController::class, 'insert']);
            Route::get('/edit/{id}', [Webpanel\CustomerController::class, 'edit'])->where(['id' => '[0-9]+']);
            Route::post('/edit/{id}', [Webpanel\CustomerController::class, 'update'])->where(['id' => '[0-9]+']);
            Route::post('/destroy/{id}', [Webpanel\CustomerController::class, 'destroy'])->where(['id' => '[0-9]+']);
            Route::post('/status/{id}', [Webpanel\CustomerController::class, 'status'])->where(['id' => '[0-9]+']);
        });

        // promotion
        Route::prefix('product')->group(function () {
            Route::get('/', [Webpanel\CustomerController::class, 'index']);
            Route::get('/add', [Webpanel\CustomerController::class, 'add']);
            Route::post('/add', [Webpanel\CustomerController::class, 'insert']);
            Route::get('/edit/{id}', [Webpanel\CustomerController::class, 'edit'])->where(['id' => '[0-9]+']);
            Route::post('/edit/{id}', [Webpanel\CustomerController::class, 'update'])->where(['id' => '[0-9]+']);
            Route::post('/destroy/{id}', [Webpanel\CustomerController::class, 'destroy'])->where(['id' => '[0-9]+']);
            Route::post('/status/{id}', [Webpanel\CustomerController::class, 'status'])->where(['id' => '[0-9]+']);

            Route::prefix('promotion')->group(function () {

            });
        });

        Route::prefix('log')->group(function () {
            Route::get('/', [Webpanel\Log\LogController::class, 'index']);
            Route::get('/show-log', [Webpanel\Log\LogController::class, 'show_log']);
        });

        // ==== Category : Administrator Menu
        Route::prefix('administrator')->group(function () {
            Route::prefix('user')->group(function () {
                Route::get('/', [Webpanel\Administrator\UserController::class, 'index']);
                Route::get('/add', [Webpanel\Administrator\UserController::class, 'add']);
                Route::post('/add', [Webpanel\Administrator\UserController::class, 'insert']);
                Route::get('/edit/{id}', [Webpanel\Administrator\UserController::class, 'edit'])->where(['id' => '[0-9]+']);
                Route::post('/edit/{id}', [Webpanel\Administrator\UserController::class, 'update'])->where(['id' => '[0-9]+']);
                Route::post('/destroy/{id}', [Webpanel\Administrator\UserController::class, 'destroy'])->where(['id' => '[0-9]+']);
                Route::get('/status/{id}', [Webpanel\Administrator\UserController::class, 'status'])->where(['id' => '[0-9]+']);
            });

            Route::prefix('permission')->group(function () {
                Route::get('/', [Webpanel\Administrator\PermissionController::class, 'index']);
                Route::get('/add', [Webpanel\Administrator\PermissionController::class, 'add']);
                Route::post('/add', [Webpanel\Administrator\PermissionController::class, 'insert']);
                Route::get('/edit/{id}', [Webpanel\Administrator\PermissionController::class, 'edit'])->where(['id' => '[0-9]+']);
                Route::post('/edit/{id}', [Webpanel\Administrator\PermissionController::class, 'update'])->where(['id' => '[0-9]+']);
                Route::post('/destroy/{id}', [Webpanel\Administrator\PermissionController::class, 'destroy'])->where(['id' => '[0-9]+']);
                Route::get('/status/{id}', [Webpanel\Administrator\PermissionController::class, 'status'])->where(['id' => '[0-9]+']);
            });

            Route::prefix('log')->group(function () {
                Route::get('/', [Webpanel\Administrator\AuditLogController::class, 'index']);
            });
        });

    });
});
