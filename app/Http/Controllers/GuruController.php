<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;

class GuruController extends Controller
{
    protected $Guru;
    public function __construct()
    {
        $this->Guru = new Guru();
    }
    public function index()
    {
        $data = [
            'guru' => $this->Guru->allData(),
        ];
        return view('guru.index', $data);
    }
    public function profil($id)
    {
        $guru = Guru::find($id);
        $data = [
            'guru' => $this->Guru->detailData($id),
        ];
        return view('guru.profil', ['guru' => $guru, 'data' => $data]);
    }

    public function create()
    {
        return view('guru.create');
    }

    public function insert(Request $request)
    {
        // fungsi validasi data input
        $this->validate(
            $request,
            [
                'nama' => 'required|alpha|min:4',
                'nip' => 'required|alpha|min:1',
                'email' => 'required|email',
                'jabatan' => 'required',
                'pendidikan' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'agama' => 'required',
                'telp' => 'required|alpha-num|min:1',
                'photo' => 'required|mimes:jpg, jpeg, png',
            ]
        );

        $file = $request->photo;
        $fileName = $request->nama . '.' . $file->extension();
        $file->move(public_path('images'), $fileName);
        // $guru = \App\Models\Guru::create($request->all());
        $this->Guru->tambahData($request->all());
        return redirect()->route('guru')->with('pesan', 'Data Berhasil di Tambahkan');
    }

    public function edit($id)
    {
        $guru = Guru::find($id);
        $data = [
            'guru' => $this->Guru->detailData($id)
        ];
        return view('guru.edit', ['guru' => $guru, 'data' => $data]);
    }

    public function update(Request $request, $id)
    {
        // fungsi validasi data input
        $this->validate(
            $request,
            [
                'nama' => 'required|alpha|min:4',
                'nip' => 'required|alpha|min:1',
                'email' => 'required|email',
                'jabatan' => 'required',
                'pendidikan' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'agama' => 'required',
                'telp' => 'required|alpha-num|min:1',
                'photo' => 'required|mimes:jpg, jpeg, png',
            ]
        );
        if($request->photo <> ""){
            $file = $request->photo;
            $fileName = $request->nama . '.' . $file->extension();
            $file->move(public_path('images'), $fileName);

            $data = [
                'nama' => $request->nama,
                'nip' => $request->nip,
                'email' => $request->email,
                'jabatan' => $request->jabatan,
                'pendidikan' => $request->pendidikan,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'agama' => $request->agama,
                'telp' => $request->telp,
                'photo' => $fileName,
            ];
            $this->Guru->updateData($id, $data);
        } else {
            $file = $request->photo;
            $fileName = $request->nama . '.' . $file->extension();
            $file->move(public_path('images'), $fileName);

            $data = [
                'nama' => $request->nama,
                'nip' => $request->nip,
                'email' => $request->email,
                'jabatan' => $request->jabatan,
                'pendidikan' => $request->pendidikan,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'agama' => $request->agama,
                'telp' => $request->telp,
                'photo' => $fileName,
            ];
            $this->Guru->updateData($id, $data);
        }
        return redirect()->route('guru')->with('pesan', 'Data Berhasil di update');
    }

    public function delete($id){
        $guru = Guru::findOrFail($id);
        if($guru->photo <> ""){
            unlink(public_path('images') . '/' . $guru->photo);
        }
        $guru->delete();
        return redirect()->route('guru')->with("pesan", "Data Berhasil DiHapus ..!");
    }
}
