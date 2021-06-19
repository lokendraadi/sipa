<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use App\Exports\SuratMasukExport;
use App\Imports\SuratMasukImport;
use Maatwebsite\Excel\Facades\Excel;

class SuratMasukController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){
            $data = SuratMasuk::where('no_surat','LIKE','%' .$request->search.'%')->paginate(5);
        }else{
            $data = SuratMasuk::paginate(5);
        }


        return view('datasurat', compact('data'));
    }

    public function tambahsuratmasuk()
    {
        return view('tambahsurat');
    }

    public function insertsuratmasuk(Request $request)
    {
        SuratMasuk::create($request->all());
        return redirect()->route('suratmasuk')->with('sukses', 'Data Berhasil Di Tambahkan');
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
        return redirect()->route('suratmasuk')->with('sukses', 'Data Berhasil Di Update');
    }

    public function deletesuratmasuk($id)
    {
        $data = SuratMasuk::find($id);
        $data->delete();
        return redirect()->route('suratmasuk')->with('sukses', 'Data Berhasil Di Hapus');
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
