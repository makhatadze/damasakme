<?php
/**
 *  app/Http/Requests/CityAreaDistrictRequest.php
 *
 * Date-Time: 01.05.22
 * Time: 10:27
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Http\Requests;

use App\Models\Language;
use Illuminate\Foundation\Http\FormRequest;

class CityAreaDistrictRequest extends FormRequest
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
            'city_area' => 'required|exists:city_areas,id'
        ];
    }
}
