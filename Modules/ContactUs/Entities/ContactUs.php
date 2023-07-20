<?php

namespace Modules\ContactUs\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactUs extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = "contact_us";

    protected $fillable = [
        "name",
        "email",
        "mobile",
        "title",
        "message"
    ];

    protected $casts = [
        "title" => "string"
    ];
}
