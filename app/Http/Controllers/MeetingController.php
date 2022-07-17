<?php

namespace App\Http\Controllers;

use App\Models\Meetings;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class MeetingController extends Controller
{
    public function goToDashboard(){
        $data = Meetings::all();
        return view('user.dashboard', compact('data'));
    }

    public function paginate(){
        $data = Meetings::all();
        return response()->json($data);;
    }


}
