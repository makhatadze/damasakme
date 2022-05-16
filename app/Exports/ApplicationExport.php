<?php
/**
 * app/Exports/ApplicationExport.php
 *
 * Date-Time: 16.05.22
 * Time: 10:27
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */

namespace App\Exports;

use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\NoReturn;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ApplicationExport implements
    FromCollection,WithHeadings
{
    /**
     * @var Request
     */
    public Request $request;

    /**
     * @return array
     */
    public function headings(): array
    {
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
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }

    /**
     * @param Request $request
     * @return ApplicationExport
     */
    public function setRequest(Request $request): ApplicationExport
    {
        $this->request = $request;
        return $this;
    }

    /**
     * @return Collection
     */
    #[NoReturn] public function collection(): Collection
    {
        $guests = Guest::query();
        $request = $this->getRequest();

        if ($request->filled('gender')){
            $guests->where('gender', $request->gender);
        }
        if ($request->filled('street')){
            $guests->where('street','like', '%'.$request->street);
        }
        if ($request->filled('education')){
            $guests->whereIn('guests.id', array_values(Guest::getGuestFromEdu($request->education)));
        }
        if ($request->filled('jobs')!=null){
            $guests->whereIn('guests.id', array_values(Guest::getGuestFromJob($request->jobs)));
        }
        if ($request->filled('area')){
            $guests->where('area_id',$request->area);
        }
        if ($request->filled('age')){
            $toDate = now()->subYears($request->age);
            $additionalDays = $request->age/4;
            $fromDate = now()->subDays(round(($request->age * 365) + 364 + $additionalDays));
            $guests->whereBetween('birthday',[$fromDate,$toDate]);
        }
        if ($request->filled('city')){
            $guests->where('city_id',$request->city);
        }

        return collect(Guest::getGuests($guests->get()));
    }
}
