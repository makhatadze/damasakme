<?php
/**
 *  app/Http/Controllers/Back/DashboardController.php
 *
 * Date-Time: 24.04.22
 * Time: 11:14
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;
use function inertia;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function __invoke(Request $request): Response|ResponseFactory
    {
        return inertia('Dashboard');
    }
}
