<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class CardsController extends Controller
{
    public function add(Request $request) {
        $id = Auth::user()->id;
        $number = rand( 100 , 999 );
        $brand = $request->brand;
        $color = $request->color;

        DB::table('cards')
            ->insert(['user_id' => $id, 'number' => $number, 'brand' => $brand, 'color' => $color]);

        return redirect('/');
    }

    public function remove($id = null) {
        DB::table('cards')->where('id', '=', $id)->delete();

        return redirect('/');
    }
}
