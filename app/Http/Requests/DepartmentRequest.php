<?php
/**
 *  app/Http/Requests/DepartmentRequest.php
 *
 * Date-Time: 02.05.22
 * Time: 05:52
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Http\Requests;

use App\Models\Language;
use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
            $defaultLocale->locale.'.title' => 'required|string|max:255',
            $defaultLocale->locale.'.working' => 'required|string|max:255',
            'email' => 'required|string|max:255|email',
            'phone' => 'required'
        ];
    }
}
