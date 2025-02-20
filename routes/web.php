<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\MessageController;

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

Route::resources([
    'websites' => WebsiteController::class,
    'messages' => MessageController::class,
    'questionnaires' => QuestionnaireController::class,
]);

Route::get('/test', function () {
    return view('test');
});

/*HBCU COLLEGE TOUR*/
Route::get('/hbcu_college_tour', [HomeController::class, 'hbcu_college_tour'])->name('hbcu_college_tour');
Route::post('/contact_post', [HomeController::class, 'contact_post'])->name('contact_post');
Route::get('/hbcu_college_tour/{confirmation}', [HomeController::class, 'hbcu_college_tour_confirmation'])->name('hbcu_college_tour_confirmation');
Route::get('/hbcu_college_tour_registrations/', [HomeController::class, 'hbcu_college_tour_registrations'])->name('hbcu_college_tour_registrations');

Route::get('/', [HomeController::class, 'index'])->name('web_index');

Route::get('/small_video', [HomeController::class, 'small_video'])->name('small_video');

Route::get('/recruiter/portfolio', [HomeController::class, 'portfolio1'])->name('portfolio1');

Route::get('/small_business/portfolio', [HomeController::class, 'portfolio2'])->name('portfolio2');

Route::get('/small_business/about', [HomeController::class, 'portfolio2_about'])->name('about');

Route::get('/settings', [HomeController::class, 'settings'])->name('settings');

Route::get('/messages', [MessageController::class, 'index'])->name('messages');

Route::post('/settings/{setting}', [HomeController::class, 'settings_update']);

Route::post('/reset_count', [HomeController::class, 'reset_counter']);

Route::post('websites/reminder/{website}', [WebsiteController::class, 'payment_reminder'])->name('payment_reminder');

Route::put('questionnaires/completed/{questionnaire}', [QuestionnaireController::class, 'web_post'])->name('questionnaire_web_post');

require __DIR__.'/auth.php';
