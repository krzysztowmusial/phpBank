<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class ContactsController extends Controller
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

        return view('contacts', ['user' => $user, 'contacts' => $contacts]);
    }

    public function add(Request $request) {
        $user_id = Auth::user()->id;
        $contact = DB::table('users')->where('email', $request->email)->first();

        if($user_id != $contact->id) {
            DB::table('contacts')
                ->insert(['user_id' => $user_id, 'contact_id' => $contact->id]);
        }

        return redirect('/dashboard/contacts');
    }

    public function delete(Request $request) {
        DB::table('contacts')->where('contact_id', $request->contact_id)->delete();
        return redirect('/dashboard/contacts');
    }
}
