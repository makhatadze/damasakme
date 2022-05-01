<?php
/**
 *  app/Http/Controllers/Back/CityAreaDistrictController.php
 *
 * Date-Time: 01.05.22
 * Time: 10:28
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityAreaDistrictRequest;
use App\Http\Resources\CityAreaDistrict\CityAreaDistrictResource;
use App\Models\CityArea;
use App\Models\CityAreaDistrict;
use JetBrains\PhpStorm\NoReturn;
use function back;
use function inertia;

class CityAreaDistrictController extends Controller
{

    public function index(): \Inertia\Response|\Inertia\ResponseFactory
    {
        $cityAreaDistricts = CityAreaDistrictResource::collection(CityAreaDistrict::with('translations','getCityArea.translations')->latest()->paginate(10));
        $cityAreas = CityArea::with('translations')->get()->toArray();

        return inertia('CityAreaDistricts/Index', [
            'cityAreaDistricts' => $cityAreaDistricts,
            'cityAreas' => $cityAreas
        ]);
    }

    /**
     * @param \App\Http\Requests\CityAreaDistrictRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    #[NoReturn] public function store(CityAreaDistrictRequest $request): \Illuminate\Http\RedirectResponse
    {
        $attr = $request->toArray();
        CityAreaDistrict::create($attr);

        return back()->with([
            'type' => 'success',
            'message' => __('City area district has been created'),
        ]);
    }

    public function update(CityAreaDistrictRequest $request, CityAreaDistrict $cityAreaDistrict): \Illuminate\Http\RedirectResponse
    {
        $attr = $request->toArray();

        $cityAreaDistrict->update($attr);

        return back()->with([
            'type' => 'success',
            'message' => __('City area district has been updated'),
        ]);
    }

    public function destroy(CityAreaDistrict $cityAreaDistrict): \Illuminate\Http\RedirectResponse
    {
        $cityAreaDistrict->delete();

        return back()->with([
            'type' => 'success',
            'message' => __('City area district has been deleted'),
        ]);
    }
}
