<?php

use App\Livewire\Dashboard;
use App\Livewire\Events\EventCreate;
use App\Livewire\Events\EventEdit;
use App\Livewire\Events\EventIndex;
use App\Livewire\Events\EventView;
use App\Livewire\Groups\GroupCreate;
use App\Livewire\Groups\GroupEdit;
use App\Livewire\Groups\GroupIndex;
use App\Livewire\Groups\GroupView;
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

Route::get('/', function () {
    return redirect('/events');
});

Route::get('dashboard', function () {
    return redirect('/events');
});

Route::get('dashboard/events', Dashboard\DashboardEvents::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard.events');

Route::get('dashboard/groups', Dashboard\DashboardGroups::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard.groups');

Route::get('dashboard/profile', Dashboard\DashboardProfile::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard.profile');

Route::get('events/', EventIndex::class)
    ->name('events.index');
Route::get('events/{event}', EventView::class)
    ->name('events.view');
Route::get('events/{event}/edit', EventEdit::class)
    ->middleware(['auth', 'verified'])
    ->name('events.edit');
Route::get('create-event/{id?}', EventCreate::class)
    ->middleware(['auth', 'verified'])
    ->name('events.create');

Route::get('groups', GroupIndex::class)
    ->name('groups.index');
Route::get('groups/{group}', GroupView::class)
    ->name('groups.view');
Route::get('groups/{group}/edit', GroupEdit::class)
    ->middleware(['auth', 'verified'])
    ->name('groups.edit');
Route::get('create-group', GroupCreate::class)
    ->middleware(['auth', 'verified'])
    ->name('groups.create');

require __DIR__.'/auth.php';
