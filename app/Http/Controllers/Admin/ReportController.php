<?php

namespace App\Http\Controllers\Admin;

use PDF;
use App\Models\User;
use App\Models\Category;
use App\Models\Property;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Exports\FilterExport;
use App\Exports\PropertyExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
	public function agent(Request $request)
	{
    $query= User::role(['Agent','Member']);
		// for search only
		if($request->has('filter')){
			if($request->input('from_date')){
				$query->whereBetween('created_at',array($request->from_date, $request->to_date));
			}
			$data['users'] = $query->get();
		// for export to excel
		} elseif($request->has('excel_export')){
			if($request->input('from_date')){
				$query->whereBetween('created_at',array($request->from_date, $request->to_date));
			}
			$data['users'] = $query->get();
			return Excel::download(new FilterExport($request->from_date, $request->to_date), 'Users-reports.xlsx');
		// for export to pdf
		} elseif($request->has('pdf_export')){
			if($request->input('from_date')){
				$query->whereBetween('created_at',array($request->from_date, $request->to_date));
			}
			$data['users'] = $query->get();
			// return view('admin.reports.export.pdf_export',$data);
			$pdf = PDF::loadView('admin.reports.export.pdf_export',$data)->setPaper('a4', 'landscape');
			return $pdf->download('pdf_export.pdf');
		// for firstime loading
		} else {
			$data['users'] = $query->get();
		}
		return view('admin.reports.agent.index',$data);
	}

	public function property(Request $request)
	{
		/*
			$subtype = Property::with('parent')
							->where('category_id',5)
			->whereHas('parent',function($query){
					$query->whereHas('subtype',function($query){
						$query->where('type_id',1);
					});
			})
			->toSql();
			dd ($subtype);
		*/
		if($request->input('sortby')){
			$data['sortby'] = $request->input('sortby');
		} else {
			$data['sortby']='';
		}
		if($request->input('from_date')){
			$data['from_date'] = $request->input('from_date');
		} else {
			$data['from_date']='';
		}
		if($request->input('to_date')){
			$data['to_date'] = $request->input('to_date');
		} else {
			$data['to_date']='';
		}
		if($request->input('location')){
			$data['location'] = $request->input('location');
		} else {
			$data['location']='';
		}
		if($request->input('type')){
			$data['type'] = $request->input('type');
		} else {
			$data['type']='';
		}
		if($request->input('purpose')){
			$data['purpose'] = $request->input('purpose');
		} else {
			$data['purpose']='';
		}
		$data['rpt_categories'] = Category::where('parent_id',0)->published()->get();
		$data['rpt_cattype'] = Category::where('parent_id',5)->published()->get();
		$data['rpt_provinces'] = Province::get();
		if($request->has('filter')){
			$data['properties'] = Property::PropertyReport($request)->get();
		}
		if($request->has('excel_export')){
			$data['properties'] = Property::PropertyReport($request)->get();
			return Excel::download(new PropertyExport($request), 'Users-reports.xlsx');
		}
    if($request->has('pdf_export')){
			$data['properties'] = Property::PropertyReport($request)->get();
			// return view('admin.reports.export.property_pdf',$data);
			$pdf = PDF::loadView('admin.reports.export.property_pdf',$data)->setPaper('a4', 'landscape');
			return $pdf->download('pdf_export.pdf');
		}
		return view('admin.reports.property.index',$data);
  }

	public function print_entry($placa, $datefecha, $datehora, $tipo)
	{
		try {
            // fill you own connector
            $connector = new WindowPrintConnector('EPSON20');
            // Start the priter
            $printer = new Printer($connector);
            // System Var
            $printer->selectPrntMode(Printer::MODE_DOUBLE_WIDTH);
            $printer->selectJustification(Printer::JUSTIFY_CENTER);
            $system_name = $this->db->get_where('setting',array('type'=>'system_name'))->row()->description;
            $duemo_name =$this->db->get_where('setting',array('type'=>'nombre_demo'))->row()->description;
            $nit = $this->db->get_where('setting',array('type'=>'nit'))->row()->description;
            $direction =$this->db->get_where('setting',array('type'=>'address'))->row()->description;
            $telefono = $this->db->get_where('setting',array('type'=>'phone'))->row()->description;
            $politicas =$this->db->get_where('setting',array('type'=>'politicas'))->row()->description;
            $printer->setTextSize(2,2);
            $printer->text($system_name. "\n");
            $printer->feed();
            $printer->selectPrintMode();
            $printer->text($duemo_name);
            $printer->text("NIT: ".$nit."\n");
            $printer->text("DIR: ".$direction. "\n");
            $printer->text("TELEFONO- ".$telefono."\n");
            $printer->feed();

            // Title of Receipt
            $printer->setEmphasis(true);
            $printer->text("INGRESO \n");
            $printer->text("---------------------------------------------------\n");
            $printer->setTextSize(4,3);
            $printer->text("Placa ".$placa."\n");
            $printer->selectPrintMode();
            $printer->text("---------------------------------------------------\n");
            $printer->setEmphasis(false);
            $printer->selectPrintMode();
            $printer->text("Fecha Entrada                   " .$datefecha."\n");
            $printer->text("Hora Entrada                   " .$datehora."\n");
                $this->db->select('tipo');
                $this->db->from('tipo');
                $this->db->where('idtipo',$tipo);
            $printer->text();
            $printer->feed();
            $printer->feed();
            $printer->feed();
            $printer->feed();

		} catch (\Throwable $th) {
			//throw $th;
		}
	}

}
