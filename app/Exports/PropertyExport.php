<?php

namespace App\Exports;

use App\Models\Property;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;

class PropertyExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents, WithMapping
{
	use Exportable;
	protected $request;
	// varible form and to
	public function __construct($request)
	{
		$this->request = $request;
	}

	//function select data from database
	public function collection()
	{
		$properties = Property::PropertyReport($this->request)->get();
		return $properties;
	}

	public function registerEvents(): array
	{
		return [
			AfterSheet::class => function(AfterSheet $event) {
					$cellRange = 'A1:W1'; // All headers
					$event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
			},
		];
	}

	//function header in excel
	public function headings(): array
	{
		return [
				'No',
				'Title',
				'Price',
				'Category',
				'Type',
				'Post By',
				'Province',
				'District',
				'Commune',
				'views',
				'Status'
		];
    }
    
    public function map($properties):array
    {
			return [
				$properties->id,
				$properties->title,
				$properties->price,
				$properties->category->category_name,
				$properties->parent->category_name,
				$properties->name,
				$properties->province->name_en,
				$properties->district->name_en,
				$properties->commune->name_en,
				$properties->view_count,
				$properties->save_contact,
			];
    }

}
