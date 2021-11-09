<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    DmPatientController,
    CrfController,
    InclusionExclusionController
};

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('main');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {

    Route::resource("dmPatients", DmPatientController::class);


    Route::get("crfs/create/{dmPatient}", [CrfController::class, 'create'])->name('crfs.create');
    Route::post("crfs/store/{dmPatient}", [CrfController::class, 'store'])->name('crfs.store');
    Route::put("crfs/update/{crf}", [CrfController::class, 'update'])->name('crfs.update');


    Route::get("inclusion_exclusion/create/{dmPatient}", [InclusionExclusionController::class, 'create'])->name('inclusion_exclusion.create');
    Route::post("inclusion_exclusion/store/{dmPatient}", [InclusionExclusionController::class, 'store'])->name('inclusion_exclusion.store');
    Route::put("inclusion_exclusion/update/{inclusion_exclusion}", [InclusionExclusionController::class, 'update'])->name('inclusion_exclusion.update');
});
