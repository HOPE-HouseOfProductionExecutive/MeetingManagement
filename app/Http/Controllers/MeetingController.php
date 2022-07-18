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
        return view('user.dashboard', compact('data'));
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
            'judul' => 'required',
            'tindak_lanjut' => 'required',
            'penanggung_jawab' => 'required',
            'progres_rapat' => 'required',
            'data_pendukung' => 'required',
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
        $data = DB::table('meetings')->distinct()->get();
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
            else{
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
