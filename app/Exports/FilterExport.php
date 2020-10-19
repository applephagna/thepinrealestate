<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class FilterExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
	use Exportable;
   // varible form and to 
   public function __construct(String $from = null , String $to = null)
   {
     $this->from = $from;
     $this->to   = $to;
   }
   
   //function select data from database 
   public function collection()
   {
   		if($this->from !='' && $this->to !=''){
			$users = User::role(['Agent','Member'])->whereBetween('created_at',[$this->from,$this->to])->get();							 
   		} else {
   			$users = User::role(['Agent','Member'])->get();
   		}
			return $users;
   }

  public function registerEvents(): array
  {
    return [
        AfterSheet::class    => function(AfterSheet $event) {
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
           'name',
           'email',
           'email_verified_at',
           'created_at',
           'updated_at',
      ];
  }
}
