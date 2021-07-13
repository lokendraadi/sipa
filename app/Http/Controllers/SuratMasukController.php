<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use App\Exports\SuratMasukExport;
use App\Imports\SuratMasukImport;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class SuratMasukController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){
            $data = SuratMasuk::where('no_surat','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }else{
            $data = SuratMasuk::paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }


        return view('datasurat', compact('data'));
    }

    public function tambahsuratmasuk()
    {
        return view('tambahsurat');
    }

    public function insertsuratmasuk(Request $request)
    {
        $this->validate($request,[
            'no_surat' => 'required|min:5|max:25',
            'no_agenda' => 'required|min:3|max:6',
            'tanggal_pkpa' => 'required',
            'tanggal_surat' => 'required',
            'perihal' => 'required|min:5|max:50',
            'dari' => 'required|min:5|max:50',
            'kepada' => 'required|min:5|max:50',
            'disposisi' => 'required|min:2|max:50',
            'posisi_terakhir' => 'required|min:5|max:50',
        ]);
        SuratMasuk::create($request->all());
        return redirect()->route('suratmasuk')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function tampilkansuratmasuk($id)
    {
        $data = SuratMasuk::find($id);
        return view('tampilsurat', compact('data'));
    }

    public function updatesuratmasuk(Request $request, $id)
    {
        $data = SuratMasuk::find($id);
        $data->update($request->all());

        if(session('halaman_url')){
            return Redirect(session('halaman_url'))->with('success', 'Data Berhasil Di Update');
        }
        return redirect()->route('suratmasuk')->with('success', 'Data Berhasil Di Update');
    }

    public function deletesuratmasuk($id)
    {
        $data = SuratMasuk::find($id);
        $data->delete();
        return redirect()->route('suratmasuk')->with('success', 'Data Berhasil Di Hapus');
    }

    public function exportpdf()
    {
        $data = SuratMasuk::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('datasurat-pdf');
        return $pdf->download('rekap-suratmasuk.pdf');
    }

    public function exportexcel()
    {
        return Excel::download(new SuratMasukExport, 'rekap-suratmasuk.xlsx');
    }

    public function importexcel(Request $request)
    {
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('SuratMasukData', $namafile);

        Excel::import(new SuratMasukImport, \public_path('/SuratMasukData/'.$namafile));
        return redirect()->back();
    }
}
