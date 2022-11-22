<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JlistController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\QueryticController;
use App\Http\Controllers\QreplyController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\DashbController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [HomeController::class, 'index']);
Route::view('/tr/biz-kimiz', 'pages.biz-kimiz');
Route::view('/tr/İletişim', 'pages.iletisim');
Route::view('/tr/toplanti-randevu', 'pages.toplanti-randevu');
Route::view('/tr/destek', 'pages.destek');
Route::view('/tr/yardim', 'pages.yardim');
Route::view('/tr/yasal-bilgiler', 'pages.yasal-bilgiler');
Route::view('/tr/sik-sorulan-sorular', 'pages.sik-sorulan-sorular');
Route::view('/advertising', 'pages.advertising');
Route::view('/advertising-management', 'pages.adland');
Route::get('/advertising/{rek}/{rekcat}', [HomeController::class, 'adpage']);

//--------------------------------message---------------------------------
Route::post('/message-contactus', [ContactusController::class,'store']);
Route::post('/dashboard/send-ticket', [TicketController::class, 'store'])->middleware('verified');
Route::post('/job-message', [QueryticController::class, 'store']);
Route::post('/subscribe/email', [ContactusController::class,'save_email']);

//------------------------------search------------------------------------
Route::get('/search', [SearchController::class, 'search']);

//---------------------news----content---event------------------------------
Route::get('/contents',  [ContentController::class, 'cats']);
Route::get('/contents/{content:link}', [ContentController::class, 'index']);
Route::get('/content/{content:link}', [ContentController::class, 'show']);

//---------------------------lists---------------------------------
Route::get('/cities', [CatController::class, 'cities']);
Route::get('/categories', [CatController::class, 'index']);
Route::get('/category/{item}', [CatController::class, 'subcat']);
Route::get('/buisiness/{jlist:code}', [JlistController::class, 'show']);


//---------------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------dashboard--------------------------------------------------------------------
Route::middleware(['verified'])->group(function () {
    Route::get('/dashboard', [DashbController::class, 'index'])->name('dashboard');
    Route::PUT('/dashboard/user/edit', [DashbController::class, 'updateuser']);
    Route::post('/dashboard/job/add', [DashbController::class, 'storejob']);
    Route::get('/dashboard/job/step1-sucess', [DashbController::class, 'step1'])->name('step1');
    Route::get('/dashboard/job/step2-sucess', [DashbController::class, 'step2'])->name('step2');
    Route::get('/job/{job:code}/preview', [DashbController::class, 'showjob']);
    Route::get('/jobs/{jlist:code}/preview', [DashbController::class, 'showjlist']);
    Route::get('/dashboard/job/{job:code}/edit', [DashbController::class, 'editjob']);
    Route::PUT('/dashboard/job/{jlist:code}/edit', [JlistController::class, 'update']);
    Route::Get('/dashboard/job/{job:code}/delete', [DashbController::class, 'destroyjob']);
});


//----------------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------Admin  Panel---------------------------------------------------------
Route::middleware(['verified'])->group(function () {
    Route::get('/admin-dashboard', [AdminController::class, 'index'])->name('admin-dash');
    Route::get('/admin-dash/old-job/cats', [AdminController::class, 'oldcats']);
    Route::get('/admin-dash/old-jobs/all', [AdminController::class, 'oldjobs']);
    Route::get('/admin-dash/old-jobs/subcategory-list/view', [AdminController::class, 'oldjobscatlist']);
    Route::get('/admin-dash/old-job/find', [AdminController::class, 'findoldjobs']);
    Route::get('/admin-dash/old-job/find-job', [AdminController::class, 'searcholdjobs']);
    Route::get('/admin-dash/old-list/{job:code}/edit', [JobController::class, 'edit']);
    Route::post('/admin-dash/old-list/{job:code}/delete', [JobController::class, 'destroy']);
    Route::post('/admin-dash/list/transfer', [JlistController::class, 'transfer']);
    Route::post('/admin-dash/list/add-new', [JlistController::class, 'add_new']);
    Route::get('/admin-dash/business/admin-push', [AdminController::class, 'addjob']);
    Route::get('/admin-dash/business/pending', [AdminController::class, 'pending_lists'])->name('adminp-pending');
    Route::get('/admin-dash/business/lists', [AdminController::class, 'all_lists'])->name('adminp-all-list');
    Route::get('/admin-dash/business/categories', [AdminController::class, 'cats']);
    Route::get('/admin-dash/business/advertising', [AdminController::class, 'advertising_lists']);
    Route::get('/admin-dash/list/{jlist:code}/edit', [JlistController::class, 'edit']);
    Route::PUT('/admin-dash/list/{jlist:code}/edit', [JlistController::class, 'update']);
    Route::post('/admin-dash/list/{jlist:code}/delete', [JlistController::class, 'destroy']);
    Route::get('/admin-dash/report-up', [AdminController::class, 'update_report']);
    Route::post('/admin-dash/promotion/{promotion}/delete', [JobController::class, 'promotiondestroy']);

    Route::get('/admin-dash/users', [AdminController::class, 'users'])->name('admin-dash-user');
    Route::get('/admin-dash/user/{id}', [AdminController::class, 'edituser']);
    Route::PUT('/admin-dash/user/{id}', [AdminController::class, 'updateuser']);
    Route::post('/admin-dash/user/{id}/delete', [AdminController::class, 'destroy']);
    Route::get('/admin-dash/support/panel-ticket', [TicketController::class, 'index'])->name('admin-new-tickets');
    Route::get('/admin-dash/ticket/{id}', [TicketController::class, 'show']);
    Route::get('/admin-dash/reply/{id}', [ReplyController::class, 'create']);
    Route::post('/admin-dash/reply/{id}', [ReplyController::class, 'store']);

    Route::get('/admin-dash/support/job-ticket', [QueryticController::class, 'index'])->name('admin-new-querytics');
    Route::get('/admin-dash/query/{id}', [QueryticController::class, 'show']);
    Route::get('/admin-dash/qreply/{id}', [QreplyController::class, 'create']);
    Route::post('/admin-dash/qreply/{id}', [QreplyController::class, 'store']);

    Route::get('/admin-dash/contents', [ContentController::class, 'indexAdmin'])->name('admin-new-contents');
    Route::get('/admin-dash/content/add-new', [ContentController::class, 'create']);
    Route::post('/admin-dash/content/add', [ContentController::class, 'store']);
    Route::get('/admin-dash/content/{content:link}/edit', [ContentController::class, 'edit']);
    Route::PUT('/admin-dash/content/{content:link}/edit', [ContentController::class, 'update']);
    Route::post('/admin-dash/content/{content:link}/delete', [ContentController::class, 'destroy']);

});

require __DIR__.'/auth.php';