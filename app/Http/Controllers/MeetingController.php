<?php

namespace App\Http\Controllers;

use App\Models\Meetings;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function goToDashboard(){
        $data = Meetings::all();
        return view('user.dashboard', compact('data'));
    }


}
