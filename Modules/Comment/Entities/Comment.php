<?php

namespace Modules\Comment\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use JetBrains\PhpStorm\ArrayShape;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments_polymorphism';

    const status_unknown = 0;
    const status_reject = 1;
    const status_confirmed = 2;


    protected $fillable = [
        'id',
        'user_id',
        'replay_to_comments_id',
        'name',
        'email',
        'title',
        'content',
        'display',
        'pin',
        'status',
        'created_at',
        'updated_at',
    ];

    protected $hidden=[
//        'id',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'replay_to_comments_id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'title' => 'string',
        'content' => 'string',
        'display' => 'string',
        'pin' => 'boolean',
        'status' => 'integer',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];

    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }

    public static function getStatusComment(): array
    {
        return [
            self::status_unknown,
            self::status_reject,
            self::status_confirmed,
        ];
    }

    #[ArrayShape([self::status_unknown => "string", self::status_reject => "string", self::status_confirmed => "string"])]
    public static function getStatusCommentPersian(): array
    {
        return [
            self::status_unknown => 'نامشخص',
            self::status_reject => 'رد شده',
            self::status_confirmed => 'تایید شده',
        ];
    }

    public static function getStatusCommentTitle($status = null): array|bool|int|string|null
    {
        $statuses = self::getStatusCommentPersian();
        if (!is_null($status)) {
            if (is_string_persian($status)) {
                return array_search($status, $statuses) ?? null;
            }
            if (is_int($status) && in_array($status, array_keys($statuses))) {
                return $statuses[$status] ?? null;
            }
            return null;
        }
        return $statuses;
    }

}
