<?php

namespace Modules\Ticket\Http\Requests\TicketBody;

use Illuminate\Foundation\Http\FormRequest;

class ValidateTicketBodyRequest extends FormRequest
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
            'ticketId' => 'nullable|integer|exists:tickets,id',
            'body' => 'nullable|string',
            'status' => 'nullable|integer',
        ];
    }

    public function attributes(): array
    {
        return [

        ];
    }
}
