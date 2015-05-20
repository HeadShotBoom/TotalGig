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
use PDF;

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
		$gigs = Gig::where('user_id', $thisUser->id)->orderBy('gig_date', 'ASC')->get();
		$clients = Client::where('user_id', $thisUser->id)->get();
		$employees = Employee::where('user_id', $thisUser->id)->get();
		$gears = Gear::where('user_id', $thisUser->id)->get();
		$packages = Package::where('user_id', $thisUser->id)->get();
		return view('gigs', compact('thisUser', 'gigs', 'clients', 'employees', 'gears', 'packages'));
	}
    public function index1()
    {
        $thisUser = Auth::user();
        $gigs = Gig::where('user_id', $thisUser->id)->orderBy('gig_date', 'DESC')->get();
        $clients = Client::where('user_id', $thisUser->id)->get();
        $employees = Employee::where('user_id', $thisUser->id)->get();
        $gears = Gear::where('user_id', $thisUser->id)->get();
        $packages = Package::where('user_id', $thisUser->id)->get();
        return view('gigs', compact('thisUser', 'gigs', 'clients', 'employees', 'gears', 'packages'));
    }
    public function index2()
    {
        $thisUser = Auth::user();
        $gigs = Gig::where('user_id', $thisUser->id)->orderBy('category', 'DESC')->get();
        $clients = Client::where('user_id', $thisUser->id)->get();
        $employees = Employee::where('user_id', $thisUser->id)->get();
        $gears = Gear::where('user_id', $thisUser->id)->get();
        $packages = Package::where('user_id', $thisUser->id)->get();
        return view('gigs', compact('thisUser', 'gigs', 'clients', 'employees', 'gears', 'packages'));
    }

	public function viewGig(Request $request)
	{
		$uri = $request->url();
        $gigId = filter_var($uri, FILTER_SANITIZE_NUMBER_INT);
		$gig = Gig::where('id', $gigId)->get();
		$clientInfo = Client::where('id', $gig[0]->client_id)->get();
		$packageInfo = Package::where('id', $gig[0]->service_package)->get();
		$servicesInfo = DB::table('services')->where('package_id', $gig[0]->service_package)->get();
        $gearInfo = DB::table('gears_gig')->where('gig_id', $gig[0]->id)->get();
        $employeesInfo = DB::table('employee_gig')->where('gig_id', $gig[0]->id)->get();
        $invoiceInfo = DB::table('invoices')->where('gig_id', $gig[0]->id)->get();
        $thisUser = Auth::user();
        $clients = Client::where('user_id', $thisUser->id)->get();
        $employees = Employee::where('user_id', $thisUser->id)->get();
        $gears = Gear::where('user_id', $thisUser->id)->get();
        $packages = Package::where('user_id', $thisUser->id)->get();
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
        $employees = $request->add_gig_employees;
        $thisGear = $request->add_gig_gear;
        $thisPackage = $request->add_gig_package;
		if(isset($employees)) {
            foreach ($request->add_gig_employees as $employee) {
                DB::table('employee_gig')->insert(['employee_id' => $employee, 'gig_id' => $gigId]);
                $data['name'] = DB::table('employees')->where('id', $employee)->pluck('name');
                $data['email'] = DB::table('employees')->where('id', $employee)->pluck('email');
                $data['date'] = $gig->gig_date;
                $data['gig_name'] = $gig->gig_name;
                $data['boss'] = Auth::user();
                Mail::send('emails.booked', $data, function ($message) use ($data) {

                    $message->to($data['email'], $data['name'])->subject('You have been booked!');
                });
            }
        }
        if(isset($thisGear)) {
            foreach ($request->add_gig_gear as $gear) {
                DB::table('gears_gig')->insert(['gear_id' => $gear, 'gig_id' => $gigId]);
            }
        }
        if(isset($thisPackage)) {
            $totalQty = DB::table('services')->select('service_qty')->where('package_id', $gig->service_package)->get();
            $totalPrice = DB::table('services')->select('service_price')->where('package_id', $gig->service_package)->get();
            $totalMoney = 0;
            for ($x = 0; $x < count($totalQty); $x++) {
                $totalMoney += $totalQty[$x]->service_qty * $totalPrice[$x]->service_price;
            }
            $now = date('M | d | Y');
            DB::table('invoices')->insert(['gig_id' => $gigId, 'user_id' => $gig->user_id, 'date' => $now, 'total' => $totalMoney, 'paid' => 'No', 'name' => $gig->gig_name, 'client' => $gig->client_id, 'service_package' => $gig->service_package]);
        }
        return redirect()->back();


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
	public function update(Gig $gig, Request $request)
	{
        $updatedGig = $gig;
        $updatedGig->id = $request->edit_gig_id;
        $updatedGig->gig_name = $request->edit_gig_name;
        $updatedGig->category = $request->edit_gig_category;
        $updatedGig->client_id = $request->edit_gig_client;
        $updatedGig->service_package = $request->edit_gig_package;
        $updatedGig->gig_date = $request->edit_gig_date;
        $updatedGig->notes = $request->edit_gig_notes;
        $updatedGig->save();
        $thisEmployees = $request->edit_gig_employees;
        $thisGear = $request->edit_gig_gear;
        $thisPackage = $request->edit_gig_package;
        DB::table('employee_gig')->where('gig_id', $request->edit_gig_id)->delete();
        if(isset($thisEmployees)) {
            foreach ($request->edit_gig_employees as $employee) {
                DB::table('employee_gig')->insert(['employee_id' => $employee, 'gig_id' => $request->edit_gig_id]);
                $data['name'] = DB::table('employees')->where('id', $employee)->pluck('name');
                $data['email'] = DB::table('employees')->where('id', $employee)->pluck('email');
                $data['date'] = $updatedGig->gig_date;
                $data['gig_name'] = $updatedGig->gig_name;
                $data['boss'] = Auth::user();
                Mail::send('emails.updatedbooked', $data, function ($message) use ($data) {

                    $message->to($data['email'], $data['name'])->subject('You have been booked!');
                });
            }
            DB::table('gears_gig')->where('gig_id', $request->edit_gig_id)->delete();
        }
        if(isset($thisGear)) {
            foreach ($request->edit_gig_gear as $gear) {
                DB::table('gears_gig')->insert(['gear_id' => $gear, 'gig_id' => $request->edit_gig_id]);
            }
        }
        if(isset($thisPackage)) {
            $totalQty = DB::table('services')->select('service_qty')->where('package_id', $updatedGig->service_package)->get();
            $totalPrice = DB::table('services')->select('service_price')->where('package_id', $updatedGig->service_package)->get();
            $totalMoney = 0;
            for ($x = 0; $x < count($totalQty); $x++) {
                $totalMoney += $totalQty[$x]->service_qty * $totalPrice[$x]->service_price;
            }
            $now = date('M | d | Y');
            DB::table('invoices')->where('gig_id', $request->edit_gig_id)->update(['date' => $now, 'total' => $totalMoney, 'name' => $updatedGig->gig_name, 'client' => $updatedGig->client_id, 'service_package' => $updatedGig->service_package]);
        }
        return redirect()->back();
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

    public function delete(Request $request)
    {
        $uri = $request->url();
        $gigId = filter_var($uri, FILTER_SANITIZE_NUMBER_INT);
        DB::table('gigs')->where('id', $gigId)->delete();
        return redirect('gigs');
    }

    public function downloadContract(Request $request)
    {
        $uri = $request->url();
        $gigId = filter_var($uri, FILTER_SANITIZE_NUMBER_INT);
        $stuff = DB::table('gigs')->where('id', $gigId)->get();
        $data = [];
        $data['created_date'] = date("m/d/Y", strtotime($stuff[0]->created_at));
        $data['client_name'] = DB::table('clients')->where('id' , $stuff[0]->client_id)->pluck('name');
        $data['client_location'] = DB::table('clients')->where('id' , $stuff[0]->client_id)->pluck('address');
        $data['client_number'] = DB::table('clients')->where('id' , $stuff[0]->client_id)->pluck('phone');
        $userInfo = DB::table('users')->where('id', $stuff[0]->user_id)->get();
        $data['user_name'] = $userInfo[0]->name;
        $data['user_business'] = $userInfo[0]->business;
        $data['user_email'] = $userInfo[0]->email;
        $services = DB::table('services')->where('package_id', $stuff[0]->service_package)->get();
        for($i=0; $i<count($services); $i++){
            $data['services'][$i] = $services[$i];
        }
        $pdf = PDF::loadView('pdf.contract', $data);
        return $pdf->download('contract.pdf');
    }

    public function printPdf(Request $request)
    {
        $uri = $request->url();
        $gigId = filter_var($uri, FILTER_SANITIZE_NUMBER_INT);
        $stuff = DB::table('gigs')->where('id', $gigId)->get();
        $data = [];
        $data['created_date'] = date("m/d/Y", strtotime($stuff[0]->created_at));
        $data['client_name'] = DB::table('clients')->where('id' , $stuff[0]->client_id)->pluck('name');
        $data['client_location'] = DB::table('clients')->where('id' , $stuff[0]->client_id)->pluck('address');
        $data['client_number'] = DB::table('clients')->where('id' , $stuff[0]->client_id)->pluck('phone');
        $userInfo = DB::table('users')->where('id', $stuff[0]->user_id)->get();
        $data['user_name'] = $userInfo[0]->name;
        $data['user_business'] = $userInfo[0]->business;
        $data['user_email'] = $userInfo[0]->email;
        $services = DB::table('services')->where('package_id', $stuff[0]->service_package)->get();
        for($i=0; $i<count($services); $i++){
            $data['services'][$i] = $services[$i];
        }

        return view('partial.contract', compact('data'));
    }

    public function toggleContract(Request $request)
    {
        $uri = $request->url();
        $gigId = filter_var($uri, FILTER_SANITIZE_NUMBER_INT);
        $signed = DB::table('gigs')->where('id', $gigId)->pluck('contract');
        if($signed === 0){
            DB::table('gigs')->where('id', $gigId)->update(['contract' => 1]);
        }elseif($signed === 1){
            DB::table('gigs')->where('id', $gigId)->update(['contract' => 0]);
        }else {
            DB::table('gigs')->where('id', $gigId)->update(['contract' => 0]);
        }
        return redirect()->back();
    }

}
