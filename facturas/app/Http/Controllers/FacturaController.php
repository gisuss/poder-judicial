<?php

namespace App\Http\Controllers;

use App\Models\compra;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FacturaController extends Controller
{
    public function generar()
    {
        $users = DB::table('compras')->select('user_id')->distinct()->get();
        $facturas = [];
        foreach ($users as $user) {
            $products_user = DB::table('compras')->select('product_id')->where('user_id', $user)->orderBy('created_at', 'desc')->get();
            $item = [];
            // $item['user_id'] = $user;
            $item['user_id'] = User::find($user);
            foreach ($products_user as $prod) {
                // $item['products'] = $prod;
                $item['products'] = Product::find($prod);
            }
            $facturas[] = $item;
        }
        DB::table('compras')->delete();
        return view('facturas.index', compact('facturas'));
    }
}
