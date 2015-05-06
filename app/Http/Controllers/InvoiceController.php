<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Invoice;
use Auth;
use Illuminate\Http\Request;
use DB;
use PDF;

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
         $data['name'] = $stuff[0]->name;
         $data['date'] = $stuff[0]->date;
         $data['total'] = $stuff[0]->total;
         $data['client'] = DB::table('clients')->where('id' , $stuff[0]->client)->pluck('name');

		 $pdf = PDF::loadView('pdf.invoice', $data);
		 return $pdf->download('invoice.pdf');
	 }


}
