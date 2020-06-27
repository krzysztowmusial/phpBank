<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('dashboard');
    } else {
        $cards = '';
        return view('home', ['cards' => $cards]);
    }
});

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
// Contacts
Route::get('/dashboard/contacts', 'ContactsController@index')->name('contacts');
Route::post('/dashboard/contacts/add', 'ContactsController@add');
Route::post('/dashboard/contacts/delete', 'ContactsController@delete');
// Tranbsactions
Route::get('/dashboard/transactions', 'TransactionsController@index')->name('transactions');
Route::post('/dashboard/transactions', 'TransactionsController@send');
Route::get('/dashboard/transactions/add', function() {
    $user = Auth::user();
    return view('transactions_add', ['user' => $user]);
})->name('transactions_add');
Route::post('/dashboard/transactions/add', 'TransactionsController@add');
// CARDS
Route::get('dashboard/card/add', function(){
    $user = Auth::user();
    $cards = DB::table('cards')->where('user_id', $user->id)->get();
    return view('card_add', ['user' => $user, 'cards' => $cards]);
})->name('card_add');
Route::post('dashboard/card/add', 'CardsController@add');
Route::post('dashboard/card/remove/{id}', 'CardsController@remove');