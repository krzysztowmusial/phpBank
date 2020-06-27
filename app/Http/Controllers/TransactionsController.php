<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Illuminate\Http\Request;

class TransactionsController extends Controller
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

        return view('transactions', ['user' => $user]);
    }

    public function send(Request $request) {
        
        $saldo = Auth::user()->saldo;
        $from = Auth::user()->id;
        $to = DB::table('users')->where($request->type, $request->text)->value('id');
        $amount = $request->amount;

        if($amount <= $saldo) {
            $from_saldo = $saldo - $amount;
            DB::table('users')
                ->where('id', $from)
                ->update(['saldo' => $from_saldo]);
            $to_saldo = DB::table('users')->where('id', $to)->value('saldo') + $amount;
            DB::table('users')
                ->where('id', $to)
                ->update(['saldo' => $to_saldo]);
            DB::table('transactions')
                ->insert(['from' => $from, 'to' => $to, 'amount' => $amount]);

            return redirect('/dashboard');
        } else {
            return redirect('/dashboard/transactions');
        }
    }

    public function add(Request $request) {
        
        $saldo = Auth::user()->saldo;
        $user = Auth::user()->id;
        $amount = $request->amount;

        $to_saldo = $saldo + $amount;
        DB::table('users')
            ->where('id', $user)
            ->update(['saldo' => $to_saldo]);
        DB::table('transactions')
            ->insert(['from' => $user, 'to' => $user, 'amount' => $amount]);

        return redirect('/dashboard');
    }
}
