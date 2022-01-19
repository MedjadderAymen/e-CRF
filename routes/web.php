<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    DmPatientController,
    CrfController,
    InclusionExclusionController,
    DeviceLogController,
    ControlSolutionController,
    GlucoseController,
    UserController,
    ExcelController
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
    return redirect()->route("login");
});

Route::get('/dashboard', function () {
    abort_if(!auth()->user()->hasRole('Super Admin'), 403);
    return view('main');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {

    Route::resource("dmPatients", DmPatientController::class);


    Route::get("crfs/create/{dmPatient}", [CrfController::class, 'create'])->name('crfs.create');
    Route::post("crfs/store/{dmPatient}", [CrfController::class, 'store'])->name('crfs.store');
    Route::put("crfs/update/{crf}", [CrfController::class, 'update'])->name('crfs.update');
    Route::get("crfs/print/{dmPatient}", [CrfController::class, 'print'])->name('crfs.print');


    Route::get("inclusion-exclusion/create/{dmPatient}", [InclusionExclusionController::class, 'create'])->name('inclusion_exclusion.create');
    Route::post("inclusion-exclusion/store/{dmPatient}", [InclusionExclusionController::class, 'store'])->name('inclusion_exclusion.store');
    Route::put("inclusion-exclusion/update/{inclusion_exclusion}", [InclusionExclusionController::class, 'update'])->name('inclusion_exclusion.update');

    Route::get("device-log/create/{dmPatient}", [DeviceLogController::class, 'create'])->name('device_log.create');
    Route::post("device-log/store/{dmPatient}", [DeviceLogController::class, 'store'])->name('device_log.store');
    Route::put("device-log/update/{device_log}", [DeviceLogController::class, 'update'])->name('device_log.update');

    Route::get("control-solution/create/{dmPatient}", [ControlSolutionController::class, 'create'])->name('control_solution.create');
    Route::post("control-solution/store/{dmPatient}", [ControlSolutionController::class, 'store'])->name('control_solution.store');
    Route::put("control-solution/update/{control_solution}", [ControlSolutionController::class, 'update'])->name('control_solution.update');

    Route::get("glucose/create/{dmPatient}", [GlucoseController::class, 'create'])->name('glucose.create');
    Route::post("glucose/store/{dmPatient}", [GlucoseController::class, 'store'])->name('glucose.store');
    Route::put("glucose/update/{glucose}", [GlucoseController::class, 'update'])->name('glucose.update');

    Route::resource("users", UserController::class);
});

Route::get('export_report', [ExcelController::class, 'export_mapping'])->name('patient.export_report')->middleware('auth');


