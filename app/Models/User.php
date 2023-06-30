<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use JetBrains\PhpStorm\ArrayShape;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    const gender_unknown = 0;
    const gender_male = 1;
    const gender_female = 2;

    const status_unknown = 0;
    const status_active = 1;
    const status_inactive = 2;
    const status_block = 3;
    protected $fillable = [
        'name',
        'family',
        'full_name',
        'father',
        'national_code',
        'gender',
        'birthday',
        'username',
        'password',
        'email',
        'email_verified_at',
        'mobile',
        'nationalCode',
        'code',
        'career',
        'degree',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function getStatusGender(): array
    {
        return [
            self::gender_unknown,
            self::gender_male,
            self::gender_female,
        ];
    }

    public static function getStatusGenderPersian(): array
    {
        return [
            self::gender_unknown => 'نامشخص',
            self::gender_male => 'مرد',
            self::gender_female => 'زن',
        ];
    }

    public static function getStatusGenderTitle($status = null): array|bool|int|string|null
    {
        $statuses = self::getStatusGenderPersian();
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

    public static function getStatusUserTitle($status = null): array|bool|int|string|null
    {
        $statuses = self::getStatusUserPersian();
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

    public static function getStatusUser(): array
    {
        return [
            self::status_unknown,
            self::status_active,
            self::status_inactive,
            self::status_block,
        ];
    }

    #[ArrayShape([self::status_unknown => "string", self::status_active => "string", self::status_inactive => "string", self::status_block => "string"])]
    public static function getStatusUserPersian(): array
    {
        return [
            self::status_unknown => 'نامشخص',
            self::status_active => 'فعال',
            self::status_inactive => 'غیرفعال',
            self::status_block => 'بلاک شده',
        ];
    }

  /*  public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }*/

    # relations is here...

    public static function check_unique_code($code = null): bool
    {
        return $code && self::query()->where('code', $code)->doesntExist();
    }
}
