<?php
/**
 *  app/Http/Controllers/Back/CityAreaController.php
 *
 * Date-Time: 01.05.22
 * Time: 08:29
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityAreaRequest;
use App\Http\Resources\CityArea\CityAreaResource;
use App\Models\City;
use App\Models\CityArea;
use function back;
use function inertia;

class CityAreaController extends Controller
{

    public function index(): \Inertia\Response|\Inertia\ResponseFactory
    {
        $cityAreas = CityAreaResource::collection(CityArea::with('translations','getCity.translations')->latest()->paginate(10));
        $cities = City::with('translations')->get()->toArray();

        return inertia('CityAreas/Index', [
            'cityAreas' => $cityAreas,
            'cities' => $cities
        ]);
    }

    public function store(CityAreaRequest $request): \Illuminate\Http\RedirectResponse
    {
        $attr = $request->toArray();
        CityArea::create($attr);

        return back()->with([
            'type' => 'success',
            'message' => __('City area has been created'),
        ]);
    }

    public function update(CityAreaRequest $request, CityArea $cityArea): \Illuminate\Http\RedirectResponse
    {
        $attr = $request->toArray();

        $cityArea->update($attr);

        return back()->with([
            'type' => 'success',
            'message' => __('City area has been updated'),
        ]);
    }

    public function destroy(CityArea $cityArea): \Illuminate\Http\RedirectResponse
    {
        $cityArea->delete();

        return back()->with([
            'type' => 'success',
            'message' => __('City area has been deleted'),
        ]);
    }
}
