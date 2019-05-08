<?php

namespace App\Http\Controllers;

use App\latihan;
use Illuminate\Http\Request;

class latihan1 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = latihan::all()->toArray();
        return view('buku.index', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buku.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
          'judul'         =>  'required',
          'pengarang'     =>  'required',
          'kategori'      =>  'required',
          'tahunTerbit'   =>  'required',
          'penerbit'      =>  'required'
      ]);
      $data = new latihan([
          'judul'         =>  $request->get('judul'),
          'pengarang'     =>  $request->get('pengarang'),
          'kategori'      =>  $request->get('kategori'),
          'tahunTerbit'   =>  $request->get('tahunTerbit'),
          'penerbit'      =>  $request->get('penerbit')
      ]);
      $data->save();
      return redirect()->route('buku.create')->with('success', 'Data Added');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\latihan  $latihan
     * @return \Illuminate\Http\Response
     */
    public function show(latihan $book)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = latihan::find($id);
        return view('buku.edit', compact('data', 'id'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
          'judul'         =>  'required',
          'pengarang'     =>  'required',
          'kategori'      =>  'required',
          'tahunTerbit'   =>  'required',
          'penerbit'      =>  'required'
      ]);
      $data = latihan::find($id);
      $data->judul=$request->get('judul');
      $data->pengarang=$request->get('pengarang');
      $data->kategori=$request->get('kategori');
      $data->tahunTerbit=$request->get('tahunTerbit');
      $data->penerbit=$request->get('penerbit');
      $data->save();
      return redirect()->route('buku.index')->with('success', 'Data Updated');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $data = latihan::find($id);
      $data->delete();
      return redirect()->route('buku.index')->with('success', 'Data Deleted');
    }
}
