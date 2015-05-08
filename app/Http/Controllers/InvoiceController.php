<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Invoice;
use Auth;
use Illuminate\Http\Request;
use DB;
use PDF;
use Mail;

class InvoiceController extends Controller {

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
		$invoices = Invoice::orderBy('id', 'ASC')->get();
		return view('invoices', compact('invoices', 'thisUser'));
	}

    public function index1()
    {
        $thisUser = Auth::user();
        $invoices = Invoice::orderBy('date', 'ASC')->get();
        return view('invoices', compact('invoices', 'thisUser'));
    }

    public function index2()
    {
        $thisUser = Auth::user();
        $invoices = Invoice::orderBy('total', 'ASC')->get();
        return view('invoices', compact('invoices', 'thisUser'));
    }

    public function index3()
    {
        $thisUser = Auth::user();
        $invoices = Invoice::orderBy('paid', 'ASC')->get();
        return view('invoices', compact('invoices', 'thisUser'));
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
	public function store()
	{
		//
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

	/**
	 *This function handles changing the paid status of the invoice
	 */
	public function toggle(Request $request)
	{
		$uri = $request->url();
		$toRemove = 'http://totalgig/invoices/';
		$alsoRemove = '/toggle';
		$part1 = str_replace($toRemove, '', $uri);
		$invoiceId = str_replace($alsoRemove, '', $part1);
		$paid = DB::table('invoices')->where('id', $invoiceId)->pluck('paid');
		if($paid === 'No'){
			DB::table('invoices')->where('id', $invoiceId)->update(['paid' => "Yes"]);
		}elseif($paid === "Yes"){
			DB::table('invoices')->where('id', $invoiceId)->update(['paid' => "No"]);
		}
		return redirect('invoices');

	}
	 public function downloadPdf(Request $request)
	 {
		 $uri = $request->url();
		 $toRemove = 'http://totalgig/invoices/';
		 $alsoRemove = '/download';
		 $part1 = str_replace($toRemove, '', $uri);
		 $invoiceId = str_replace($alsoRemove, '', $part1);
		 $stuff = DB::table('invoices')->where('id', $invoiceId)->get();
         $data = [];
         $data['gig_name'] = $stuff[0]->name;
         $data['invoice_date'] = $stuff[0]->date;
		 $data['invoice_number'] = $invoiceId;
         $data['total_due'] = $stuff[0]->total;
         $data['client_name'] = DB::table('clients')->where('id' , $stuff[0]->client)->pluck('name');
		 $data['client_location'] = DB::table('clients')->where('id' , $stuff[0]->client)->pluck('address');
		 $data['client_number'] = DB::table('clients')->where('id' , $stuff[0]->client)->pluck('phone');
		 $userInfo = DB::table('users')->where('id', $stuff[0]->user_id)->get();
		 $data['user_name'] = $userInfo[0]->name;
		 $data['user_business'] = $userInfo[0]->business;
		 $data['user_email'] = $userInfo[0]->email;
		 $services = DB::table('services')->where('package_id', $stuff[0]->service_package)->get();
		 for($i=0; $i<count($services); $i++){
			 $data['services'][$i] = $services[$i];
		 }
		 $pdf = PDF::loadView('pdf.invoice', $data);
		 return $pdf->download('invoice.pdf');
	 }

	public function emailPdf(Request $request)
	{
		$uri = $request->url();
		$toRemove = 'http://totalgig/invoices/';
		$alsoRemove = '/email';
		$part1 = str_replace($toRemove, '', $uri);
		$invoiceId = str_replace($alsoRemove, '', $part1);
		$stuff = DB::table('invoices')->where('id', $invoiceId)->get();
		$data = [];
		$data['gig_name'] = $stuff[0]->name;
		$data['invoice_date'] = $stuff[0]->date;
		$data['invoice_number'] = $invoiceId;
		$data['total_due'] = $stuff[0]->total;
		$data['client_name'] = DB::table('clients')->where('id' , $stuff[0]->client)->pluck('name');
		$data['client_location'] = DB::table('clients')->where('id' , $stuff[0]->client)->pluck('address');
		$data['client_number'] = DB::table('clients')->where('id' , $stuff[0]->client)->pluck('phone');
		$data['client_email'] = DB::table('clients')->where('id' , $stuff[0]->client)->pluck('email');
		$userInfo = DB::table('users')->where('id', $stuff[0]->user_id)->get();
		$data['user_name'] = $userInfo[0]->name;
		$data['user_business'] = $userInfo[0]->business;
		$data['user_email'] = $userInfo[0]->email;
		$services = DB::table('services')->where('package_id', $stuff[0]->service_package)->get();
		for($i=0; $i<count($services); $i++){
			$data['services'][$i] = $services[$i];
		}
		$pdf = PDF::loadView('pdf.invoice', $data);
		Mail::send('emails.invoice', $data, function($message) use($pdf, $data)
		{
			$message->to($data['client_email'])->subject('Invoice');

			$message->attachData($pdf->output(), "invoice.pdf");
		});
		return redirect('invoices')->with('message', 'The invoice has been sent to the client!');
	}

	public function printPdf(Request $request)
	{
		$uri = $request->url();
		$toRemove = 'http://totalgig/invoices/';
		$alsoRemove = '/print';
		$part1 = str_replace($toRemove, '', $uri);
		$invoiceId = str_replace($alsoRemove, '', $part1);
		$stuff = DB::table('invoices')->where('id', $invoiceId)->get();
		$data = [];
		$data['gig_name'] = $stuff[0]->name;
		$data['invoice_date'] = $stuff[0]->date;
		$data['invoice_number'] = $invoiceId;
		$data['total_due'] = $stuff[0]->total;
		$data['client_name'] = DB::table('clients')->where('id' , $stuff[0]->client)->pluck('name');
		$data['client_location'] = DB::table('clients')->where('id' , $stuff[0]->client)->pluck('address');
		$data['client_number'] = DB::table('clients')->where('id' , $stuff[0]->client)->pluck('phone');
		$data['client_email'] = DB::table('clients')->where('id' , $stuff[0]->client)->pluck('email');
		$userInfo = DB::table('users')->where('id', $stuff[0]->user_id)->get();
		$data['user_name'] = $userInfo[0]->name;
		$data['user_business'] = $userInfo[0]->business;
		$data['user_email'] = $userInfo[0]->email;
		$services = DB::table('services')->where('package_id', $stuff[0]->service_package)->get();
		for($i=0; $i<count($services); $i++){
			$data['services'][$i] = $services[$i];
		}

        return view('partial.invoice', compact('data'));
	}


}
