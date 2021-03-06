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
    public function getModalDetailDash(Request $request){
        $data = Meetings::where('title_id', '=', $request->id)->get();
        $html = '';
        foreach($data as $item){
            if ($item->keterangan == 'Selesai') {
                $style = 'background:#39A952';
            }else{
                $style = "background:#FF0000";
            }
            $time = \Carbon\Carbon::parse($item->title->waktu_rapat)->locale('id');
            $time->settings(['formatFunction' => 'translatedFormat']);
            $time1 = $time->isoformat('dddd, DD MMMM YYYY');

            $time = \Carbon\Carbon::parse($item->waktu_selesai)->locale('id');
            $time->settings(['formatFunction' => 'translatedFormat']);
            $time2 = $time->isoformat('DD MMMM YYYY');

            if($item->data_pendukung == null){
                $data_pendukung = 'Tidak Ada';
            }else{
                $data_pendukung = 'Ada';
            }
            $html.= '
            <div class="mySlides">
                <div class="detail_rapat_popup">
                    <div class="inner_detail_popup">
                        <div class="detail_upper">
                            <div class="status" style='.$style.'>
                                <p>'.$item->keterangan.'</p>
                                </div>
                                <div class="detail1">
                                <h2>'.$time1.'</h2>
                                </div>
                            </div>
                                <div class="hasil_box">
                                    <h4>Tindak Lanjut Hasil Rapat</h4>
                                    <p>'.$item->tindak_lanjut.'</p>
                                </div>
                            <div class="detail2">
                                <div class="skdp_box">
                                <h4>SKPD</h4>
                                <p>'.$item->SKPD.'</p>
                            </div>
                            <div class="dl_box">
                                <h4>
                                    Batas Waktu
                                </h4>
                                <p>'.$time2.'</p>
                            </div>
                            <div class="dp_box">
                                <h4>
                                    Data Pendukung
                                </h4>
                                <p>'.$data_pendukung.'</p>
                            </div>
                        </div>
                        <div class="detail3">
                            <div class="judul_box">
                                <h4>
                                    Judul Rapat
                                </h4>
                                <p>'.$item->title->judul.'</p>
                            </div>
                            <div class="progres_box">
                                <h4>
                                    Progres Tindak Lanjut Hasil Rapat
                                </h4>
                                <p>'.$item->progress.'</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ';
        }

        return response()->json($html);
    }
    public function paginateHome(){
        $datas = Title::all();
        return response()->json($datas);
    }

    public function paginate(){
        $datas = DB::select("
            SELECT m.id, m.tindak_lanjut, m.SKPD, m.progress, m.waktu_selesai, m.data_pendukung, m.keterangan, t.judul, t.waktu_rapat
            FROM meetings m, titles t
            WHERE t.id = m.title_id
            ORDER BY t.waktu_rapat DESC
        ");
        return response()->json($datas);
    }

    public function showMeettingTitle(){
        $data = Title::all();
        $title = '<option value="" disabled="disabled" selected="selected">Pilih Judul Rapat</option>';
        foreach ($data as $key) {
            $title .= '<option value="'.$key->id.'">'.$key->judul.'</option>';
        }
        return response()->json($title);
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

            if($request->search != "" && $request->search1 == "" && $request->search2 == ""){
                $data = Title::where([
                    'waktu_rapat' => $request->search
                ])->get();
            }
            else if($request->search == "" && $request->search1 != "" && $request->search2 == ""){
                $data = Title::where('judul', 'LIKE', '%'.$request->search1.'%')->get();
            }
            else if($request->search == "" && $request->search1 == "" && $request->search2 != ""){
                $data = DB::select("
                    SELECT t.waktu_rapat, t.judul, t.id
                    FROM titles t, Meetings m
                    WHERE t.id = m.title_id
                    AND m.keterangan LIKE '$request->search2%'
                ");
            }
            else if($request->search != "" && $request->search1 != "" && $request->search2 == ""){
                $data = DB::select("
                    SELECT t.waktu_rapat, t.judul, t.id FROM titles t
                    WHERE t.judul LIKE '%$request->search1%'
                    AND t.waktu_rapat = '$request->search'
                ");
            }
            else if($request->search != "" && $request->search1 == "" && $request->search2 != ""){
                $data = DB::select("
                    SELECT t.waktu_rapat, t.judul, t.id
                    FROM titles t, Meetings m
                    WHERE t.id = m.title_id
                    AND t.waktu_rapat = '$request->search'
                    AND m.keterangan LIKE '$request->search2%'
                ");
            }
            else if($request->search == "" && $request->search1 != "" && $request->search2 != ""){
                $data = DB::select("
                    SELECT t.waktu_rapat, t.judul, t.id
                    FROM titles t, Meetings m
                    WHERE t.id = m.title_id
                    AND t.judul LIKE '%$request->search1%'
                    AND m.keterangan LIKE '$request->search2%'
                ");
            }
            else if($request->search != "" && $request->search1 != "" && $request->search2 != ""){
                $data = DB::select("
                    SELECT t.waktu_rapat, t.judul, t.id FROM titles t, Meetings m
                    WHERE t.id = m.title_id
                    AND t.judul LIKE '%$request->search1%'
                    AND t.waktu_rapat = '$request->search'
                    AND m.keterangan LIKE '$request->search2%'

                ");
            }


            if($data) {
                return response()->json($data);
            }

        }
    }


}
