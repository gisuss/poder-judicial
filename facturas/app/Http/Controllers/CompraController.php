<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\compra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CompraController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('compra.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $compra = compra::create([
            'product_id'    =>  $request->product_id,
            'user_id'       =>  Auth::user()->id,
        ]);
        $result = $compra->save();

        if ($result) {
            return redirect()->route('home')->with('success', 'Se generó la venta correctamente.');
        }else{
            return Redirect()->back()->with('error','Venta no generada.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show($compra_id)
    {
        $compra = compra::find($compra_id);
        if(isset($compra)) {
            return view('compra.show', compact('compra'));
        }else{
            return Redirect()->back()->with('error','compra no encontrada.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function edit($compra_id)
    {
        $compra = compra::find($compra_id);        
        
        //Revisa que el usuario exista
        if (isset($compra)) {
            return view('compra.edit', compact('compra'));
        }else{
            return Redirect()->back()->with('error','Compra no encontrada.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $compra_id)
    {
        $compra = compra::find($compra_id);
        
        //Revisa que el usuario exista
        if (isset($compra)) {
            $request->validate([
                'product_id'    => 'required',
            ]);

            $compra->product_id = $request->product_id;
            $compra->save();

            return redirect()->route('home')->with('success','Compra Editada Correctamente.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy($compra_id)
    {
        compra::destroy($compra_id);
        return redirect()->route('home')->with('success',"Compra Eliminada Correctamente.");
    }
}
