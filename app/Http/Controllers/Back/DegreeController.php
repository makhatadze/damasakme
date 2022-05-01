<?php
/**
 *  app/Http/Controllers/Back/DegreeController.php
 *
 * Date-Time: 29.04.22
 * Time: 17:00
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\DegreeRequest;
use App\Http\Resources\Degree\DegreeResource;
use App\Models\Degree;
use function back;
use function inertia;

class DegreeController extends Controller
{

    public function index(): \Inertia\Response|\Inertia\ResponseFactory
    {
        $degrees = DegreeResource::collection(Degree::with('translations')->latest()->paginate(10));
        return inertia('Degrees/Index', [
            'degrees' => $degrees,
        ]);
    }

    public function store(DegreeRequest $request): \Illuminate\Http\RedirectResponse
    {
        $attr = $request->toArray();
        Degree::create($attr);

        return back()->with([
            'type' => 'success',
            'message' => __('Degree has been created'),
        ]);
    }

    public function update(DegreeRequest $request, Degree $degree): \Illuminate\Http\RedirectResponse
    {
        $attr = $request->toArray();

        $degree->update($attr);

        return back()->with([
            'type' => 'success',
            'message' => __('Degree has been updated'),
        ]);
    }

    public function destroy(Degree $degree): \Illuminate\Http\RedirectResponse
    {
        $degree->delete();

        return back()->with([
            'type' => 'success',
            'message' => __('Degree has been deleted'),
        ]);
    }
}
