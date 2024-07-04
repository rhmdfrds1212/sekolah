<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guru = Guru::all();
        return view('guru.index')
                ->with('guru', $guru);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusan = Jurusan::all();
        return view('guru.create')->with('jurusan', $jurusan);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->user()->cannot('create', Guru::class)){
            abort(403);
        }
        $val = $request->validate([
            'url_guru'=> 'required|url',
            'nuptk'=> 'required|max:16',
            'nama'=> 'required|max:45',
            'jenis_kelamin'=> 'required|max:45',
            'email'=> 'required|max:45',
            'alamat'=> 'required|max:45',
            'jurusan_id'=> 'required',
            'tempat_lahir'=> 'required|max:45',
            'tanggal_lahir'=> 'required'
        ]);

        Guru::create($val);
        return redirect()->route('guru.index')->with('success',$val['nama'].' Berhasil di Simpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($guru)
    {
        $guru = Guru::find($guru);
        $jurusan = Jurusan::all();
        return view('guru.edit')->with('jurusan', $jurusan)->with('guru', $guru);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $guru)
    {
        if ($request->user()->cannot('update', Guru::class)){
            abort(403);
        }
        if ($request->url_guru){
            $val = $request->validate([
                'url_guru'=> 'required|url',
                'nuptk'=> 'required|max:16',
                'nama'=> 'required|max:45',
                'jenis_kelamin'=> 'required|max:45',
                'email'=> 'required|max:45',
                'alamat'=> 'required|max:45',
                'jurusan_id'=> 'required',
                'tempat_lahir'=> 'required|max:45',
                'tanggal_lahir'=> 'required'
            ]);
        }else{
            $val = $request->validate([
                //'url_guru'=> 'required|url',
                'nuptk'=> 'required|max:16',
                'nama'=> 'required|max:45',
                'jenis_kelamin'=> 'required|max:45',
                'email'=> 'required|max:45',
                'alamat'=> 'required|max:45',
                'jurusan_id'=> 'required',
                'tempat_lahir'=> 'required|max:45',
                'tanggal_lahir'=> 'required'
            ]);
            $guru = Guru::find($guru);
            Guru::where('id', $guru['id'])->update($val);
            return redirect()->route('guru.index')->with('success',$val['nama'].' Berhasil di Edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($guru)
    {
        $guru = Guru::find($guru);
        $guru->delete();
        return redirect()->route('guru.index')->with('success','Data Berhasil di Hapus');
    }
}
