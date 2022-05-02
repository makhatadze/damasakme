<?php
/**
 *  app/Http/Controllers/Back/DepartmentController.php
 *
 * Date-Time: 02.05.22
 * Time: 05:56
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\DegreeRequest;
use App\Http\Requests\DepartmentRequest;
use App\Http\Resources\Department\DepartmentResource;
use App\Models\Degree;
use App\Models\Department;
use function back;
use function inertia;

class DepartmentController extends Controller
{

    public function index(): \Inertia\Response|\Inertia\ResponseFactory
    {
        $departments = DepartmentResource::collection(Department::with('translations')->latest()->paginate(10));
        return inertia('Departments/Index', [
            'departments' => $departments,
        ]);
    }

    public function store(DepartmentRequest $request): \Illuminate\Http\RedirectResponse
    {
        $attr = $request->toArray();
        Department::create($attr);

        return back()->with([
            'type' => 'success',
            'message' => __('Department has been created'),
        ]);
    }

    public function update(DepartmentRequest $request, Department $department): \Illuminate\Http\RedirectResponse
    {
        $attr = $request->toArray();

        $department->update($attr);

        return back()->with([
            'type' => 'success',
            'message' => __('Department has been updated'),
        ]);
    }

    public function destroy(Department $department): \Illuminate\Http\RedirectResponse
    {
        $department->delete();

        return back()->with([
            'type' => 'success',
            'message' => __('Department has been deleted'),
        ]);
    }
}
