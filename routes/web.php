<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\RescueController;
use App\Http\Controllers\AdopterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdoptionController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\DataRescueController;
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\PasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// --------------------------------------------------- LANDING PAGE -----------------------------------------------------------//
Route::get('/', [LandingController::class, 'LandingPage'])->name('landing.page');
Route::get('/about/us', [LandingController::class, 'AboutUs'])->name('landing.about');
Route::get('/landing/adoption/list', [LandingController::class, 'AnimalList'])->name('landing.adoption.list');
Route::get('/landing/adoption/dogs', [LandingController::class, 'dogsList'])->name('landing.adoption.dogs');
Route::get('/landing/adoption/cats', [LandingController::class, 'catsList'])->name('landing.adoption.cats');
Route::get('/landing/rescue/list', [LandingController::class, 'listRescue'])->name('landing.rescue.list');
Route::get('/landing/rescue/dogs', [LandingController::class, 'listDogsRescue'])->name('landing.rescue.dogs');
Route::get('/landing/rescue/cats', [LandingController::class, 'listCatsRescue'])->name('landing.rescue.cats');

// ------------------------------------------------------- LOGIN --------------------------------------------------------------//
Route::get('/login', [LoginController::class, 'Login'])->name('login');
Route::post('/postlogin', [LoginController::class, 'actionLogin'])->name('post.login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');



// ------------------------------------------------------- REGISTER -----------------------------------------------------------//
    Route::get('/register', [RegisterController::class, 'register'])->name('register.user');
    Route::post('/register/action', [RegisterController::class, 'createAdopterRegister'])->name('action.register');
    Route::get('register/verify/{id}', [RegisterController::class, 'verify'])->name('verify');

// --------------------------------------------------- MASTER ADMIN -----------------------------------------------------------//
Route::group(['middleware' => ['auth:admin', 'checkRole:Master Admin']], function () {
    Route::get('/data/admin', [RegisterController::class, 'viewAdmin'])->name('admin.account');
    Route::get('/create/admin', [RegisterController::class, 'createAdmin'])->name('create.admin.account');
    Route::post('/store/admin', [RegisterController::class, 'storeAdmin'])->name('store.admin.account');
    Route::get('/edit/admin/{id}', [RegisterController::class, 'editAdmin'])->name('edit.admin.account');
    Route::put('/update/{id}/admin', [RegisterController::class, 'updateAdmin'])->name('update.admin.account');
    Route::delete('/{id}/delete/admin', [RegisterController::class, 'deleteAdmin'])->name('admin.delete');
    Route::get('trash/admin', [RegisterController::class, 'trashAdmin'])->name('admin.trash');
    Route::post('admin/{id}/restore', [RegisterController::class, 'restoreAdmin'])->name('admin.restore');
    Route::get('PDF/admin', [RegisterController::class, 'PDFAdmin'])->name('admin.pdf');
});


// ------------------------------------------------ MASTER ADMIN & ADMIN -----------------------------------------------------//
Route::group(['middleware' => ['auth:admin', 'checkRole:Admin,Master Admin']], function () {

    //PROFIL ADMIN
    Route::get('/profile/admin', [ProfileController::class, 'profileAdmin'])->name('admin.data.profile');
    Route::post('/admin/update-foto-profile/{id}', [ProfileController::class, 'updateFotoProfileAdmin'])->name('update.foto.profile');
    Route::get('/edit/data/admin/{id}', [ProfileController::class, 'editProfileAdmin'])->name('edit.profile.admin');
    Route::put('/update/data/{id}/admin', [ProfileController::class, 'updateProfileAdmin'])->name('update.profile.admin');


    //PASSWORD
    Route::get('/password/admin/edit', [PasswordController::class, 'editPasswordAdmin'])->name('password.admin.edit');
    Route::put('/password/admin/update', [PasswordController::class, 'updatePasswordAdmin'])->name('password.admin.update');


    // DASHBOARD
    Route::get('/dashboard/admin', [DashboardController::class, 'homeAdmin'])->name('dashboard.admins');
    Route::get('/chart-registration', [DashboardController::class, 'homeAdmin']);

    // ACCOUNT ADOPTER
    Route::get('/account/adopter', [RegisterController::class, 'viewAdopter'])->name('account.adopter');


   // DATA CRUD HEWAN ADOPSI
    Route::get('/animals', [AnimalController::class, 'AnimalList'])->name('animals.list');
    Route::get('/animal/dogs', [AnimalController::class, 'dogsList'])->name('list.dogs.animal');
    Route::get('/animal/cats', [AnimalController::class, 'catsList'])->name('list.cats.animal');
    Route::get('/animal/pdf', [AnimalController::class, 'animalPDF'])->name('list.pdf.animal');
    Route::get('/animal/excel', [AnimalController::class, 'animalExcel'])->name('list.excel.animal');
    Route::get('/animals/{id}/details', [AnimalController::class, 'detailAnimal'])->name('animals.detail');

   //CREATE
    Route::post('/store/animals', [AnimalController::class, 'storeAnimals'])->name('animals.store');
    Route::get('/create/animals', [AnimalController::class, 'createAnimal'])->name('animals.create');

   //EDIT
    Route::get('/edit/{id}/animals', [AnimalController::class, 'editAnimal'])->name('animals.edit');
    Route::put('/update/{id}/animals', [AnimalController::class, 'updateAnimal'])->name('animals.update');

   //DELETE
    Route::delete('/{id}/delete/animals', [AnimalController::class, 'deleteAnimal'])->name('animals.delete');
    Route::get('trash/animals', [AnimalController::class, 'trashAnimal'])->name('animals.trash');
    Route::post('animals/{id}/restore', [AnimalController::class, 'restoreAnimal'])->name('animals.restore');


    //DATA PENGADOPSI
    Route::get('/data/adopter', [DataController::class, 'adopterData'])->name('adoption.data');
    Route::get('/excel/data/adopter', [DataController::class, 'adopterExcel'])->name('adoption.data.excel');
    Route::get('/admin/documents/{id}/download',  [DataController::class, 'downloadDocument'])->name('admin.documents.download');
    Route::get('/adopter/print/{id}', [DataController::class, 'downloadData'])->name('adopter.print');
    Route::get('/cetak-data-pengadopsi', [DataController::class, 'cetakDataPengadopsi'])->name('cetak.pdf.data');
    Route::get('/get-data-pengadopsi', [DataController::class, 'getDataPengadopsi'])->name('ajax.pdf.data');

    //HISTORY ADOPSI
    Route::get('/history/adoption', [ValidationController::class, 'historyAdoption'])->name('admin.history.adoption');
    Route::get('/history-pdf', [ValidationController::class, 'historyPDF'])->name('admin.history.pdf.adoption');
    // Route::get('/get-data-adoption', [DataController::class, 'gethistoryPDF'])->name('ajax.pdf.adoption');
    Route::get('/excel/history/adoption', [ValidationController::class, 'historyExcel'])->name('admin.history.excel.adoption');

    //VALIDATION DATA
    Route::get('/validation/adopter', [ValidationController::class, 'ValidationAdoption'])->name('validation.adoption');
    Route::post('/adoptions/{id}/update-status', [ValidationController::class, 'validationFailed'])->name('validation.failed');
    Route::post('/validation/success/{id}', [ValidationController::class, 'ValidationSuccess'])->name('validation.success');
    Route::post('/validation/error/{id}', [ValidationController::class, 'ValidationError'])->name('validation.error');

    //RESCUE HEWAN
    Route::get('/rescue', [RescueController::class, 'listRescue'])->name('rescue.list');
    Route::get('/rescue/dogs', [RescueController::class, 'listDogRescue'])->name('list.dogs.rescue');
    Route::get('/rescue/cats', [RescueController::class, 'listCatRescue'])->name('list.cats.rescue');
    Route::get('/rescue/pdf', [RescueController::class, 'rescuePDF'])->name('list.pdf.rescue');
    Route::get('/rescue/excel', [RescueController::class, 'rescueExcel'])->name('list.excel.rescue');

    //CREATE
    Route::get('/create/rescue', [RescueController::class, 'createRescue'])->name('rescue.create');
    Route::post('/store/rescue', [RescueController::class, 'storeRescue'])->name('rescue.store');

    //EDIT
    Route::get('/edit/{id}/rescue', [RescueController::class, 'editRescue'])->name('rescue.edit');
    Route::put('/rescue/{id}', [RescueController::class, 'updateRescue'])->name('rescue.update');

    //DELETE
    Route::delete('/{id}/delete/rescues', [RescueController::class, 'deleteRescue'])->name('rescue.delete');
    Route::get('/trash/rescues', [RescueController::class, 'trashRescue'])->name('rescue.trash');
    Route::post('rescues/{id}/restore', [RescueController::class, 'restoreRescue'])->name('rescue.restore');
});


// ------------------------------------------------------ ADOPTER -------------------------------------------------------------//
Route::group(['middleware' => ['auth:adopter', 'checkRole:Adopter']], function () {

    // DASHBOARD ADOPTER
    Route::get('/dashboard/adopter', [DashboardController::class, 'homeadopter'])->name('dashboard.adopter');
    Route::get('/export/formulir', [FormController::class, 'cetak_pdf'])->name('exportlaporan');
    Route::post('/forms', [FormController::class, 'uploadSyarat'])->name('forms.store');

    //PROFILE
    Route::post('/edit/{id}/profile', [ProfileController::class, 'updateProfilePicture'])->name('update.profile.picture');
    Route::get('/profile', [ProfileController::class, 'profile'])->name('adopter.data.profile');
    Route::get('/edit/profile', [ProfileController::class, 'profileEdit'])->name('adopter.edit.profile');
    Route::get('/edit/data/adopter', [ProfileController::class, 'AdopterEdit'])->name('adopter.edit.data');
    Route::post('/edit-regency', [ProfileController::class, 'editSubDistrict'])->name('editRegency');
    Route::get('/profile/{id}/edit', [ProfileController::class, 'editAdopter'])->name('adopter.profile.edit');
    Route::put('/update/{id}/profile', [ProfileController::class, 'updateAdopter'])->name('adopter.profile.update');

    //EDIT PASSWORD
    Route::get('/password/edit', [PasswordController::class, 'editPassword'])->name('password.edit');
    Route::put('/password/update', [PasswordController::class, 'updatePassword'])->name('password.update');

    // DATA ADOPTER
    Route::get('/add/data/adopter', [AdopterController::class, 'addAdopter'])->name('add.data.adopter');
    Route::post('/store/data/adopter', [AdopterController::class, 'storeAdopter'])->name('store.data.adopter');
    Route::post('/adopter/sub-districts', [AdopterController::class, 'getSubDistricts'])->name('adopter.sub-districts');

    //DATA HEWAN
    Route::post('/animals/{id}/createAdoption', [AdoptionController::class, 'statusAdoption'])->name('update.adoption.status');
    Route::get('/list/animal/adoption', [AdoptionController::class, 'AnimalList'])->name('adopter.data.animal');
    Route::get('/list/animal/dogs', [AdoptionController::class, 'dogsList'])->name('adopter.data.dogs');
    Route::get('/list/animal/cats', [AdoptionController::class, 'catsList'])->name('adopter.data.cats');

    //ADOPTION
    Route::get('/adopter/{id}/edit', [AdopterController::class, 'editData'])->name('adopter.data.edit');
    Route::put('/update/{id}/adopter', [AdopterController::class, 'updateData'])->name('adopter.data.update');
    Route::get('/status', [AdoptionController::class, 'status'])->name('adopter.data.status');

    //DATA RESCUE
    Route::get('/list/rescue', [DataRescueController::class, 'listRescue'])->name('adopter.data.rescue');
    Route::get('/list/rescue/cats', [DataRescueController::class, 'listCatsRescue'])->name('adopter.rescue.cats');
    Route::get('/list/rescue/dogs', [DataRescueController::class, 'listDogsRescue'])->name('adopter.rescue.dogs');
});
