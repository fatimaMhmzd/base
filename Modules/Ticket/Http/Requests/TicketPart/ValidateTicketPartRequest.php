<?php

namespace Modules\Ticket\Http\Requests\TicketPart;

use Illuminate\Foundation\Http\FormRequest;

class ValidateTicketPartRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => "عنوان",
        ];
    }
}
