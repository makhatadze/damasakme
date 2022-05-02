<?php
/**
 *  app/Http/Controllers/App/ContactController.php
 *
 * Date-Time: 02.05.22
 * Time: 06:17
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function __invoke(Request $request): \Inertia\Response|\Inertia\ResponseFactory
    {
        $departments = Department::with('translations')->get()->toArray();

        return inertia('Contact/Index',[
            'departments' => $departments
        ]);
    }
}
