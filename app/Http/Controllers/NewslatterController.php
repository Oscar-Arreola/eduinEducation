<?php

namespace App\Http\Controllers;

use App\Newslatter;
use Illuminate\Http\Request;

class NewslatterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $newslatters = Newslatter::all();

        return view('admin.newslatters.index',compact('newslatters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (empty($request->footernombre) and empty($request->footercorreo)) {
                \Toastr::error('Error faltan mas datos');
               
        }
        $newslatter = new Newslatter;
        $newslatter->nombre = $request->footernombre;
        $newslatter->mail = $request->footercorreo;
        $newslatter->save();
        \Toastr::success('Registrado');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Newslatter  $newslatter
     * @return \Illuminate\Http\Response
     */
    public function show(Newslatter $newslatter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Newslatter  $newslatter
     * @return \Illuminate\Http\Response
     */
    public function edit(Newslatter $newslatter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Newslatter  $newslatter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Newslatter $newslatter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Newslatter  $newslatter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newslatter $newslatter)
    {
        //
    }
}
