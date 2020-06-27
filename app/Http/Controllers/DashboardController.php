<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        $contacts_id = DB::table('contacts')->where('user_id', $user->id)->get();
        $contacts = [];
        foreach($contacts_id as $contact) {
            array_push($contacts, DB::table('users')->where('id', $contact->contact_id)->get());
        }

        $transactions = DB::table('transactions')->where('from', $user->id)->orWhere('to', $user->id)->get();
        $transactions = $transactions->reverse()->take(6);

        $cards = DB::table('cards')->where('user_id', $user->id)->get();

        return view('dashboard', ['user' => $user, 'contacts' => $contacts, 'transactions' => $transactions, 'cards' => $cards]);
    }
}
