<?php
/**
 *  app/Http/Controllers/Back/CityController.php
 *
 * Date-Time: 01.05.22
 * Time: 08:11
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Http\Resources\City\CityResource;
use App\Models\City;
use function back;
use function inertia;

class CityController extends Controller
{

    public function index(): \Inertia\Response|\Inertia\ResponseFactory
    {
        $cities = CityResource::collection(City::with('translations')->latest()->paginate(10));
        return inertia('Cities/Index', [
            'cities' => $cities,
        ]);
    }

    public function store(CityRequest $request): \Illuminate\Http\RedirectResponse
    {
        $attr = $request->toArray();
        City::create($attr);

        return back()->with([
            'type' => 'success',
            'message' => __('City has been created'),
        ]);
    }

    public function update(CityRequest $request, City $city): \Illuminate\Http\RedirectResponse
    {
        $attr = $request->toArray();

        $city->update($attr);

        return back()->with([
            'type' => 'success',
            'message' => __('City has been updated'),
        ]);
    }

    public function destroy(City $city): \Illuminate\Http\RedirectResponse
    {
        $city->delete();

        return back()->with([
            'type' => 'success',
            'message' => __('City has been deleted'),
        ]);
    }
}
