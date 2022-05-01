<?php
/**
 *  app/Http/Requests/DegreeRequest.php
 *
 * Date-Time: 29.04.22
 * Time: 17:06
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Http\Requests;

use App\Models\Language;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class DegreeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $defaultLocale = Language::where('default',true)->firstOrFail();

        return [
            $defaultLocale->locale.'' => 'required|array',
            $defaultLocale->locale.'.title' => 'required|string|max:255'
        ];
    }
}
