<?php

use App\Livewire\Author\Sets as AuthorSets;
use App\Livewire\Author\Cards as AuthorCards;
use App\Livewire\Student\SetsList;
use App\Livewire\Student\CardsViewer;
use App\Models\Card;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', fn() => redirect()->route('student.sets'));

Route::middleware(['auth'])->group(function () {
    Route::get('/student/sets', SetsList::class)->name('student.sets');
    Route::get('/student/sets/{setId}', CardsViewer::class)->name('student.cards');

    Route::get('/author/sets', AuthorSets::class)->name('author.sets');
    Route::get('/author/sets/{setId}/cards', AuthorCards::class)->name('author.cards');
    Route::delete('/cards/{card}', function (Card $card) {
        $card->delete();
        return redirect()->back();
    })->name('cards.destroy');
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

require __DIR__ . '/auth.php';
