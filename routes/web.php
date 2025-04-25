<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AmwalController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\carInfoController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\FitriController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\QurbanController;




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


Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/login', [LoginController::class, 'index'])->name('login');


Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/car/car', [CarController::class, 'index'])->name('/car/car');
Route::get('/car/adminCar', [CarController::class, 'show'])->name('/car/adminCar');
Route::get('/car/tambahCar', [CarController::class, 'tambahCar'])->name('tambahCar');
Route::get('/car/peminjaman', [CarController::class, 'peminjaman'])->name('peminjaman');
Route::post('/car/inputData', [CarController::class, 'inputData'])->name('inputData');
Route::post('/car/insertData', [CarController::class, 'insertData'])->name('insertData');
Route::get('/car/tampilData/{id}', [CarController::class, 'tampilData'])->name('tampilData');
Route::post('/car/updateData/{id}', [CarController::class, 'updateData'])->name('updateData');
Route::get('/car/deleteData/{id}', [CarController::class, 'deleteData'])->name('deleteData');
Route::get('/car/exportPdf', [CarController::class, 'exportPdf'])->name('exportPdf');
Route::get('/car/searchDate', [CarController::class, 'searchDate'])->name('car.searchDate');
Route::get('/car/searchDateAdmin', [CarController::class, 'searchDateAdmin'])->name('car.searchDateAdmin');

Route::get('/finance/finance', [FinanceController::class, 'index'])->name('finance.index');
Route::get('/finance/adminKeuangan', [FinanceController::class, 'show'])->name('/finance/adminKeuangan');
Route::get('/finance/tambahKeuangan', [FinanceController::class, 'tambahKeuangan'])->name('tambahKeuangan');
Route::post('/finance/insertData', [FinanceController::class, 'insertData'])->name('insertData');
Route::get('/finance/tampilData/{id}', [FinanceController::class, 'tampilData'])->name('tampilData');
Route::post('/finance/updateData/{id}', [FinanceController::class, 'updateData'])->name('updateData');
Route::get('/finance/deleteData/{id}', [FinanceController::class, 'deleteData'])->name('deleteData');
Route::get('/finance/exportPdf', [FinanceController::class, 'exportPdf'])->name('exportPdf');
Route::get('/finance/searchDate', [FinanceController::class, 'searchDate'])->name('finance.searchDate');
Route::get('/finance/searchDateAdmin', [FinanceController::class, 'searchDateAdmin'])->name('finance.searchDateAdmin');

Route::get('/finance/finance/{month}', [FinanceController::class, 'getMonthlyTotals']);
// Route::get('/finance/finance/', [FinanceController::class, 'showMonthlyTotalsView'])->name('finance.index');;
Route::post('/finance/finance/', [FinanceController::class, 'showMonthlyTotalsView'])->name('showMonthlyTotalsView');
// Route::get('/finance/finance/', [FinanceController::class, 'showCurrentDate'])->name('showCurrentDate');
Route::get('/finances/export-pdf/{tahun}', [FinanceController::class, 'exportPdfByYear'])->name('finances.exportPdfByYear');
Route::get('/export-pdf/{tahun?}', [FinanceController::class, 'exportPdf'])->name('export.pdf');
Route::get('/finances/{tahun}', [FinanceController::class, 'getFinancesByYear'])->name('finances.byYear');
Route::get('/finances/export-pdf/{tahun?}', [FinanceController::class, 'exportPdf'])->name('finances.exportPdf');



Route::get('/fitri/fitri', [FitriController::class, 'index'])->name('fitri.index');
Route::get('/fitri/adminFitri', [FitriController::class, 'show'])->name('/fitri/adminFitri');
Route::get('/fitri/tambahFitri', [FitriController::class, 'tambahFitri'])->name('tambahFitri');
Route::post('/fitri/insertData', [FitriController::class, 'insertData'])->name('insertData');
Route::get('/fitri/tampilData/{id}', [FitriController::class, 'tampilData'])->name('tampilData');
Route::post('/fitri/updateData/{id}', [FitriController::class, 'updateData'])->name('updateData');
Route::get('/fitri/deleteData/{id}', [FitriController::class, 'deleteData'])->name('deleteData');
Route::get('/fitri/exportPdf', [FitriController::class, 'exportPdf'])->name('exportPdf');
Route::get('/fitri/searchDate', [FitriController::class, 'searchDate'])->name('fitri.searchDate');
Route::get('/fitri/searchDateAdmin', [FitriController::class, 'searchDateAdmin'])->name('fitri.searchDateAdmin');

Route::get('/amwal/amwal', [AmwalController::class, 'index'])->name('amwal.index');
Route::get('/amwal/adminAmwal', [AmwalController::class, 'show'])->name('/amwal/adminAmwal');
Route::get('/amwal/tambahAmwal', [AmwalController::class, 'tambahAmwal'])->name('tambahAmwal');
Route::post('/amwal/insertData', [AmwalController::class, 'insertData'])->name('insertData');
Route::get('/amwal/tampilData/{id}', [AmwalController::class, 'tampilData'])->name('tampilData');
Route::post('/amwal/updateData/{id}', [AmwalController::class, 'updateData'])->name('updateData');
Route::get('/amwal/deleteData/{id}', [AmwalController::class, 'deleteData'])->name('deleteData');
Route::get('/amwal/exportPdf', [AmwalController::class, 'exportPdf'])->name('exportPdf');
Route::get('/amwal/searchDate', [AmwalController::class, 'searchDate'])->name('amwal.searchDate');
Route::get('/amwal/searchDateAdmin', [AmwalController::class, 'searchDateAdmin'])->name('amwal.searchDateAdmin');

Route::get('/qurban/qurban', [QurbanController::class, 'index'])->name('qurban');
Route::get('qurban/adminQurban', [QurbanController::class, 'show'])->name('/qurban/adminQurban');
Route::get('/qurban/tambahQurban', [QurbanController::class, 'tambahQurban'])->name('tambahQurban');
Route::post('/qurban/insertData', [QurbanController::class, 'insertData'])->name('insertData');
Route::get('/qurban/tampilData/{id}', [QurbanController::class, 'tampilData'])->name('tampilData');
Route::post('/qurban/updateData/{id}', [QurbanController::class, 'updateData'])->name('updateData');
Route::get('/qurban/deleteData/{id}', [QurbanController::class, 'deleteData'])->name('deleteData');
Route::get('/qurban/exportPdf', [QurbanController::class, 'exportPdf'])->name('exportPdf');

//Route::get('/', [CommitteeController::class, 'index'])->name('committee');
Route::get('/dashboard', [CommitteeController::class, 'show'])->name('dashboard.committee')->middleware('auth');;
Route::get('/committee/tambahCommittee', [CommitteeController::class, 'tambahCommittee'])->name('tambahCommittee');
Route::post('/committee/insertData', [CommitteeController::class, 'insertData'])->name('insertData');
Route::get('/committee/tampilData/{id}', [CommitteeController::class, 'tampilData'])->name('tampilData');
Route::post('/committee/updateData/{id}', [CommitteeController::class, 'updateData'])->name('updateData');
Route::get('/committee/deleteData/{id}', [CommitteeController::class, 'deleteData'])->name('deleteData');

// Route::get('/', [ActivityController::class, 'index'])->name('activity');
Route::get('/activity/activityAll', [ActivityController::class, 'showAll'])->name('/activity/activityAll');
Route::get('/activity/adminActivity', [ActivityController::class, 'show'])->name('/activity/adminActivity');
Route::get('/activity/tambahActivity', [ActivityController::class, 'tambahActivity'])->name('tambahActivity');
Route::post('/activity/insertData', [ActivityController::class, 'insertData'])->name('insertData');
Route::get('/activity/tampilData/{id}', [ActivityController::class, 'tampilData'])->name('tampilData');
Route::post('/activity/updateData/{id}', [ActivityController::class, 'updateData'])->name('updateData');
Route::get('/activity/deleteData/{id}', [ActivityController::class, 'deleteData'])->name('deleteData');


Route::put('activity/updateData/{id}', [ActivityController::class, 'updateData'])->name('activity.updateData');


//Route::get('/', [GalleryController::class, 'index'])->name('gallery');
Route::get('/gallery/galleryAll', [GalleryController::class, 'showAll'])->name('/gallery/galleryAll');
Route::get('/gallery/adminGallery', [GalleryController::class, 'show'])->name('/gallery/adminGallery');
Route::get('/gallery/tambahGallery', [GalleryController::class, 'tambahGallery'])->name('tambahGallery');
Route::post('/gallery/insertData', [GalleryController::class, 'insertData'])->name('insertData');
Route::get('/gallery/tampilData/{id}', [GalleryController::class, 'tampilData'])->name('tampilData');
Route::post('/gallery/updateData/{id}', [GalleryController::class, 'updateData'])->name('updateData');
Route::get('/gallery/deleteData/{id}', [GalleryController::class, 'deleteData'])->name('deleteData');

//Route::get('/', [OrganizationController::class, 'index'])->name('organization');
Route::get('/organization/adminOrganization', [OrganizationController::class, 'show'])->name('/organization/adminOrganization');
Route::get('/organization/tambahOrganization', [OrganizationController::class, 'tambahOrganization'])->name('tambahOrganization');
Route::post('/organization/insertData', [OrganizationController::class, 'insertData'])->name('insertData');
Route::get('/organization/tampilData/{id}', [OrganizationController::class, 'tampilData'])->name('tampilData');
Route::post('/organization/updateData/{id}', [OrganizationController::class, 'updateData'])->name('updateData');
Route::get('/organization/deleteData/{id}', [OrganizationController::class, 'deleteData'])->name('deleteData');

Route::get('/announcement/adminAnnouncement', [AnnouncementController::class, 'show'])->name('/announcement/adminAnnouncement');
Route::get('/announcement/tambahAnnouncement', [AnnouncementController::class, 'tambahAnnouncement'])->name('tambahAnnouncement');
Route::post('/announcement/insertData', [AnnouncementController::class, 'insertData'])->name('insertData');
Route::get('/announcement/tampilData/{id}', [AnnouncementController::class, 'tampilData'])->name('tampilData');
Route::post('/announcement/updateData/{id}', [AnnouncementController::class, 'updateData'])->name('updateData');
Route::get('/announcement/deleteData/{id}', [AnnouncementController::class, 'deleteData'])->name('deleteData');

//Route::get('/', [ArticleController::class, 'index'])->name('article');
Route::get('/article/articleAll', [ArticleController::class, 'showAll'])->name('/article/articleAll');
Route::get('/article/articleSingle/{id}', [ArticleController::class, 'showSingle'])->name('articleSingle');
Route::get('/article/adminArticle', [ArticleController::class, 'show'])->name('/article/adminArticle');
Route::get('/article/tambahArticle', [ArticleController::class, 'tambahArticle'])->name('tambahArticle');
Route::post('/article/insertData', [ArticleController::class, 'insertData'])->name('insertData');
Route::get('/article/tampilData/{id}', [ArticleController::class, 'tampilData'])->name('tampilData');
Route::post('/article/updateData/{id}', [ArticleController::class, 'updateData'])->name('updateData');
Route::get('/article/deleteData/{id}', [ArticleController::class, 'deleteData'])->name('deleteData');


// Route::get('/CarInfo/adminCarInfo', [carInfoController::class, 'show'])->name('/CarInfo/adminCarInfo');
// Route::get('/CarInfo/tambahCarInfo', [carInfoController::class, 'tambahCarInfo'])->name('tambahCarInfor');
// Route::post('/CarInfo/insertData', [carInfoController::class, 'insertData'])->name('insertData');
// Route::get('/CarInfo/tampilData/{id}', [carInfoController::class, 'tampilData'])->name('tampilData');
// Route::post('/CarInfo/updateData/{id}', [carInfoController::class, 'updateData'])->name('updateData');
// Route::get('/CarInfo/deleteData/{id}', [carInfoController::class, 'deleteData'])->name('deleteData');