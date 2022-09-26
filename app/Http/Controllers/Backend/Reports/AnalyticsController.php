<?php

namespace App\Http\Controllers\Backend\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
     public function __construct(){
        $this->middleware(['auth']);
    }
    public function index(){ 
        return view('admin.page.Report.analytics');
    }
}
