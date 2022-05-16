<?php
/**
 * app/Http/Controllers/Back/GuestController.php
 *
 * Date-Time: 13.05.22
 * Time: 03:54
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */

namespace App\Http\Controllers\Back;

use App\Exports\ApplicationExport;
use App\Exports\GuestExport;
use App\Http\Controllers\Controller;
use App\Http\Resources\Guest\GuestResource;
use App\Models\City;
use App\Models\Degree;
use App\Models\Guest;
use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use function inertia;

class ApplicationController extends Controller
{

    public function index(Request $request): \Inertia\Response|\Inertia\ResponseFactory
    {
        $filter = false;
        $guests = Guest::query()->with('city', 'educations');
        if ($request->filled('gender')) {
            $guests->where('gender', $request->gender);
            $filter = true;
        }
        if ($request->filled('street')) {
            $guests->where('street', 'like', '%' . $request->street);
            $filter = true;
        }
        if ($request->filled('education')) {
            $guests->whereIn('guests.id', array_values(Guest::getGuestFromEdu($request->education)));
            $filter = true;
        }
        if ($request->filled('jobs') != null) {
            $guests->whereIn('guests.id', array_values(Guest::getGuestFromJob($request->jobs)));
            $filter = true;
        }
        if ($request->filled('area')) {
            $guests->where('area_id', $request->area);
            $filter = true;
        }
        if ($request->filled('age')) {
            $toDate = now()->subYears($request->age);
            $additionalDays = $request->age / 4;
            $fromDate = now()->subDays(round(($request->age * 365) + 364 + $additionalDays));
            $guests->whereBetween('birthday', [$fromDate, $toDate]);
            $filter = true;
        }
        if ($request->filled('city')) {
            $guests->where('city_id', $request->city);
            $filter = true;
        }

        $guests = GuestResource::collection($guests->latest()->paginate(10));

        $cities = City::with('translations', 'getCityAreas', 'getCityAreas.getCityAreaDistricts')->get()->toArray();

        $jobs = Job::with('translations')->get()->toArray();

        $degrees = Degree::with('translations')->get()->toArray();

        return inertia('Applications/Index', [
            'guests' => $guests,
            'jobs' => $jobs,
            'degrees' => $degrees,
            'cities' => $cities,
            'filter' => $filter,
            'filters' => $request->toArray()
        ]);
    }


    /**
     * @param Request $request
     * @return BinaryFileResponse
     */
    public function exportExcel(Request $request): BinaryFileResponse
    {
        return Excel::download((new ApplicationExport())
            ->setRequest($request), 'applications.xlsx');
    }

}
