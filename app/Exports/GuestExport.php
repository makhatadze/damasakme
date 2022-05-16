<?php
/**
 * app/Exports/GuestExport.php
 *
 * Date-Time: 16.05.22
 * Time: 10:20
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Exports;

use App\Models\Guest;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GuestExport implements FromCollection,WithHeadings
{
    public function headings():array{
        return [
            '#',
            'სახელი',
            'გვარი',
            'დაბ.თარიღი',
            'ასაკი',
            'სქესი',
            'ელ-ფოსტა',
            'მობილური',
            'ქალაქი',
            'რაიონი',
            'უბანი',
            'ქუჩა',
            'განათლება',
            'დასაქმების სფერო',
            'დამატების თარიღი'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(Guest::getGuests());
    }
}
