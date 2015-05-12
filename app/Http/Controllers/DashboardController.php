<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Gig;
use Auth;
use App\Client;
use App\Package;
use App\Employee;
use App\Gear;
use Illuminate\Http\Request;
use DB;
use Mail;

class DashboardController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $thisUser = Auth::user();
        $upcomingGigs = Gig::where('user_id', $thisUser->id)->orderBy('gig_date', 'ASC')->limit(7)->get();
        $gigs = Gig::where('user_id', $thisUser->id)->orderBy('gig_date', 'ASC')->get();
        $clients = Client::where('user_id', $thisUser->id)->get();
        $employees = Employee::where('user_id', $thisUser->id)->get();
        $gears = Gear::where('user_id', $thisUser->id)->get();
        $packages = Package::where('user_id', $thisUser->id)->get();
        return view('dashboard', compact('thisUser', 'gigs', 'clients', 'employees', 'gears', 'packages', 'upcomingGigs'));
    }

}
