<?php

namespace App\Http\Controllers;

use App\Models\Meetings;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class MeetingController extends Controller
{
    public function goToDashboard(){
        $data = Meetings::all();
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

    public function paginate(){
        $data = Meetings::all();
        return response()->json($data);
    }

    public function goToManage(){
        $data = Meetings::all();
        return view('user.manage', compact('data'));
    }

    public function storeMeetingData(Request $request){
        $request->validate([
            'judul_rapat' => 'required',
            'tindak_lanjut' => 'required',
            'penanggung_jawab' => 'required',
            'progres_rapat' => 'required',
            'data_pendukung' => 'required',
            'waktu_rapat' => 'required',
            'batas_waktu' => 'required',
        ]);

        $data = new Meetings();
        $data->judul = $request->judul_rapat;
        $data->tindak_lanjut = $request->tindak_lanjut;
        $data->SKPD = $request->penanggung_jawab;
        $data->progress = $request->progres_rapat;
        $data->data_pendukung = $request->data_pendukung;
        $data->keterangan = "Belum Selesai";
        $data->waktu_rapat = $request->waktu_rapat;
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
        $data->judul = $request->judul_rapat;
        $data->tindak_lanjut = $request->tindak_lanjut;
        $data->SKPD = $request->penanggung_jawab;
        $data->progress = $request->progres_rapat;
        $data->data_pendukung = $request->data_pendukung;
        $data->keterangan = $request->status;
        $data->waktu_rapat = $request->waktu_rapat;
        $data->waktu_selesai = $request->batas_waktu;
        $data->save();
        return redirect()->back()->with('success', 'Meeting updated successfully');
    }

    public function deleteMeetingData(Request $request){
        $data = Meetings::find($request->id);
        $data->delete();
        return redirect()->back()->with('success', 'Meeting deleted successfully');
    }

    public function goToSearch(){
        // $data = DB::table('meetings')
        // ->select('judul','waktu_rapat')
        // ->groupBy('waktu_rapat')
        // ->get();
        $data = Meetings::all()->unique('waktu_rapat');
        // dd($data);
        $tes = Meetings::all();
        return view('user.shortcut', compact('data', 'tes'));
    }

    public function search(Request $request) {
        if($request->ajax()) {
            $output = "";
            $data = null;

            if($request->search != "" && $request->search1 == ""){
                $data = Meetings::where([
                    'waktu_rapat' => $request->search
                ])->get();
            }
            else if($request->search == "" && $request->search1 != ""){
                $data = Meetings::where([
                    'keterangan' => $request->search1
                ])->get();
            }
            else if($request->search != "" && $request->search1 != ""){
                $data = Meetings::where([
                    'waktu_rapat' => $request->search,
                    'keterangan' => $request->search1
                ])->get();
            }
            if($data) {
                return response()->json($data);
            }

        }
    }


}
