<?php

namespace Modules\Ticket\Http\Requests\Ticket;

use Illuminate\Foundation\Http\FormRequest;

class ValidateTicketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
//        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'partId' => 'nullable|integer|exists:ticket_parts,id',
            'priority' => 'nullable|integer',
            'title' => 'required|string',
            'status' => 'nullable|integer',
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => "عنوان",
        ];
    }
}

