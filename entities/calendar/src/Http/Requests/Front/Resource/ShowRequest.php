<?php

namespace InetStudio\CalendarPackage\Calendar\Http\Requests\Front\Resource;

use Illuminate\Foundation\Http\FormRequest;
use InetStudio\CalendarPackage\Calendar\Contracts\Http\Requests\Front\Resource\ShowRequestContract;

/**
 * Class ShowRequest.
 */
class ShowRequest extends FormRequest implements ShowRequestContract
{
    /**
     * Определить, авторизован ли пользователь для этого запроса.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Сообщения об ошибках.
     *
     * @return array
     */
    public function messages(): array
    {
        return [];
    }

    /**
     * Правила проверки запроса.
     *
     * @return array
     */
    public function rules(): array
    {
        return [];
    }
}
