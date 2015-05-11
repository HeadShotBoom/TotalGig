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

class GigController extends Controller {

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
		$gigs = Gig::orderBy('gig_date', 'ASC')->get();
		$clients = Client::all();
		$employees = Employee::all();
		$gears = Gear::all();
		$packages = Package::all();
		return view('gigs', compact('thisUser', 'gigs', 'clients', 'employees', 'gears', 'packages'));
	}
    public function index1()
    {
        $thisUser = Auth::user();
        $gigs = Gig::orderBy('gig_date', 'DESC')->get();
        $clients = Client::all();
        $employees = Employee::all();
        $gears = Gear::all();
        $packages = Package::all();
        return view('gigs', compact('thisUser', 'gigs', 'clients', 'employees', 'gears', 'packages'));
    }
    public function index2()
    {
        $thisUser = Auth::user();
        $gigs = Gig::orderBy('category', 'DESC')->get();
        $clients = Client::all();
        $employees = Employee::all();
        $gears = Gear::all();
        $packages = Package::all();
        return view('gigs', compact('thisUser', 'gigs', 'clients', 'employees', 'gears', 'packages'));
    }

	public function viewGig(Request $request)
	{
		$uri = $request->url();
		$toRemove = 'http://totalgig/gigs/';
		$gigId = str_replace($toRemove, '', $uri);
		$gig = Gig::where('id', $gigId)->get();
		$clientInfo = Client::where('id', $gig[0]->client_id)->get();
		$packageInfo = Package::where('id', $gig[0]->service_package)->get();
		$servicesInfo = DB::table('services')->where('package_id', $gig[0]->service_package)->get();
        $gearInfo = DB::table('gears_gig')->where('gig_id', $gig[0]->id)->get();
        $employeesInfo = DB::table('employee_gig')->where('gig_id', $gig[0]->id)->get();
        $invoiceInfo = DB::table('invoices')->where('gig_id', $gig[0]->id)->get();
        $thisUser = Auth::user();
        $clients = Client::all();
        $employees = Employee::all();
        $gears = Gear::all();
        $packages = Package::all();
		return view('viewGig', compact('thisUser', 'gig', 'clientInfo', 'packageInfo', 'servicesInfo', 'gearInfo', 'employeesInfo', 'invoiceInfo', 'clients', 'employees', 'gears', 'packages'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$gig = new Gig;
		$gig->user_id = Auth::id();
		$gig->gig_name = $request->add_gig_name;
		$gig->client_id = $request->add_gig_client;
		$gig->category = $request->edit_gig_category;
		$gig->service_package = $request->add_gig_package;
		$gig->gig_date = $request->add_gig_date;
		$gig->notes = $request->add_gig_notes;
		$gig->save();
		$gigId = $gig->id;
		foreach($request->add_gig_employees as $employee){
			DB::table('employee_gig')->insert(['employee_id' => $employee, 'gig_id' => $gigId]);
            $data['name'] = DB::table('employees')->where('id', $employee)->pluck('name');
            $data['email'] = DB::table('employees')->where('id', $employee)->pluck('email');
            $data['date'] = $gig->gig_date;
            $data['gig_name'] = $gig->gig_name;
            $data['boss'] = Auth::user();
            Mail::send('emails.booked', $data, function($message) use ($data){

                $message->to($data['email'], $data['name'])->subject('You have been booked!');
            });
		}
        foreach($request->add_gig_gear as $gear){
            DB::table('gears_gig')->insert(['gear_id' => $gear, 'gig_id' => $gigId]);
        }
        $totalQty = DB::table('services')->select('service_qty')->where('package_id', $gig->service_package)->get();
        $totalPrice = DB::table('services')->select('service_price')->where('package_id', $gig->service_package)->get();
        $totalMoney = 0;
        for($x=0; $x<count($totalQty); $x++){
            $totalMoney += $totalQty[$x]->service_qty*$totalPrice[$x]->service_price;
        }
        $now = date('M | d | Y');
        DB::table('invoices')->insert(['gig_id' => $gigId, 'user_id' => $gig->user_id, 'date' => $now, 'total' => $totalMoney, 'paid' => 'No', 'name' => $gig->gig_name, 'client' => $gig->client_id, 'service_package' => $gig->service_package]);
        return redirect('gigs');


	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
