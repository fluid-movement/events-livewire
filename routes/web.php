<?php

use App\Livewire\Events\EventCreate;
use App\Livewire\Events\EventEdit;
use App\Livewire\Events\EventIndex;
use App\Livewire\Events\EventView;
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('events', EventIndex::class)
    ->name('events.index');
Route::get('events/{event}', EventView::class)
    ->name('events.view');
Route::get('events/{event}/edit', EventEdit::class)
    ->name('events.edit');
Route::get('events/create', EventCreate::class)
    ->name('events.create');

require __DIR__.'/auth.php';
