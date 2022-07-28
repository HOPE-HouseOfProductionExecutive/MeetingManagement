<?php

namespace App\Http\Controllers;

use App\Models\Meetings;
use App\Models\Title;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class MeetingController extends Controller
{
    public function goToDashboard(){
        $data = Title::all();
        $total_rapat = DB::select("SELECT count(id) AS 'Total_Rapat'
        FROM meetings");
        $rapat_selesai = DB::select("SELECT count(keterangan) as Total FROM meetings
        WHERE keterangan LIKE 'Selesai'");
        $rapat_berjalan = DB::select("SELECT count(keterangan) AS Total FROM meetings
        WHERE keterangan LIKE 'Belum Selesai'");
        $rapat_terdekat = DB::select("SELECT count(id) as total FROM meetings
        WHERE CURRENT_DATE-waktu_selesai < 7");

        $total_rapat = $total_rapat[0]->Total_Rapat;
        $rapat_selesai = $rapat_selesai[0]->Total;
        $rapat_berjalan = $rapat_berjalan[0]->Total;
        $rapat_terdekat = $rapat_terdekat[0]->total;
        return view('user.dashboard', compact('data', 'total_rapat', 'rapat_selesai', 'rapat_berjalan', 'rapat_terdekat'));
    }
    public function getModalDetailDash(Request $request){
        // $data = Meetings::where('')
    }

    public function paginate(){
        $datas = DB::select("
            SELECT m.id, m.tindak_lanjut, m.SKPD, m.progress, m.waktu_selesai, m.data_pendukung, m.keterangan, t.judul, t.waktu_rapat
            FROM meetings m, titles t
            WHERE t.id = m.title_id
        ");
        return response()->json($datas);
    }

    public function goToManage(){
        $data = Meetings::all();
        return view('user.manage', compact('data'));
    }

    public function storeTitle(Request $request){
        $request->validate([
            'judul_rapat' => 'required',
            'waktu_rapat' => 'required',
        ]);

        $data = new Title();
        $data->judul = $request->judul_rapat;
        $data->waktu_rapat = $request->waktu_rapat;
        $data->save();
        return redirect()->back()->with('success', 'Meeting Title added successfully');
    }

    public function storeMeetingData(Request $request){
        $request->validate([
            'judul_rapat' => 'required',
            'tindak_lanjut' => 'required',
            'penanggung_jawab' => 'required',
            'progres_rapat' => 'required',
            'data_pendukung' => 'required',
            'batas_waktu' => 'required',
        ]);
        $data = new Meetings();
        $data->title_id = $request->judul_rapat;
        $data->tindak_lanjut = $request->tindak_lanjut;
        $data->SKPD = $request->penanggung_jawab;
        $data->progress = $request->progres_rapat;
        $data->data_pendukung = $request->data_pendukung;
        $data->keterangan = "Belum Selesai";
        $data->waktu_selesai = $request->batas_waktu;
        $data->save();
        return redirect()->back()->with('success', 'Meeting added successfully');
    }

    public function updateMeetingData(Request $request){
        $request->validate([
            'judul_rapat' => 'required',
            'tindak_lanjut' => 'required',
            'penanggung_jawab' => 'required',
            'progres_rapat' => 'required',
            'waktu_rapat' => 'required',
            'batas_waktu' => 'required',
        ]);
        $data = Meetings::find($request->id);
        if($data->title->judul != $request->judul_rapat || $data->title->waktu_rapat != $request->waktu_rapat){
            $title = Title::find($data->title_id);
            $title->judul = $request->judul_rapat;
            $title->waktu_rapat = $request->waktu_rapat;
            $title->save();
        }
        $data->tindak_lanjut = $request->tindak_lanjut;
        $data->SKPD = $request->penanggung_jawab;
        $data->progress = $request->progres_rapat;
        $data->data_pendukung = $request->data_pendukung;
        $data->keterangan = $request->status;
        $data->waktu_selesai = $request->batas_waktu;
        $data->save();
        return redirect()->back()->with('success', 'Meeting updated successfully');
    }

    public function deleteMeetingData(Request $request){
        $data = Meetings::find($request->id);
        $data->delete();
        return redirect()->back()->with('success', 'Meeting deleted successfully');
    }

    public function showMeettingTitle(){
        $data = Title::all();
        $title = '<option value="" disabled="disabled" selected="selected">Pilih Judul Rapat</option>';
        foreach ($data as $key) {
            $title .= '<option value="'.$key->id.'">'.$key->judul.'</option>';
        }
        return response()->json($title);
    }

    public function getDateTitle(Request $request){
        $data = Title::find($request->title);
        return response()->json($data);
    }

    public function goToSearch(){
        $data = Title::all()->unique('waktu_rapat');
        $tes = Title::all();
        return view('user.shortcut', compact('data', 'tes'));
        // $req = 'Rapat';
        // $kn = Title::where('judul', 'LIKE', $req.'%')->get();
        // dd($kn);
    }

    public function search(Request $request) {
        if($request->ajax()) {
            $data = null;

            if($request->search != "" && $request->search1 == ""){
                $data = Title::where([
                    'waktu_rapat' => $request->search
                ])->get();
            }
            else if($request->search == "" && $request->search1 != ""){
                $data = Title::where('judul', 'LIKE', '%'.$request->search1.'%')->get();
            }
            else if($request->search != "" && $request->search1 != ""){
                // $data = Title::where([
                //     'waktu_rapat' => $request->search
                // ])->get();
                // $data = Title::where([
                //     'waktu_rapat' => $request->search,
                //     'judul' => $request->search1
                // ])->get();
                $data = DB::select("
                    SELECT * FROM titles
                    WHERE judul LIKE '%$request->search1%'
                    AND waktu_rapat = '$request->search'

                ");
            }
            if($data) {
                return response()->json($data);
            }

        }
    }


}
