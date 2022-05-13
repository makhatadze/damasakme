<?php
/**
 * app/Http/Controllers/Back/TermController.php
 *
 * Date-Time: 13.05.22
 * Time: 07:58
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRequest;
use App\Http\Requests\TermRequest;
use App\Models\About;
use App\Models\Term;
use function back;
use function inertia;

class TermController extends Controller
{

    public function edit(): \Inertia\Response|\Inertia\ResponseFactory
    {
        $term = Term::with('translations')->first()->toArray();

        return inertia('Term/Index', [
            'term' => $term,
        ]);
    }

    public function update(TermRequest $request, Term $term): \Illuminate\Http\RedirectResponse
    {
        $attr = $request->toArray();

        $term->update($attr);

        return back()->with([
            'type' => 'success',
            'message' => __('Term has been updated'),
        ]);
    }
}
