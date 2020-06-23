<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use DB;


/**
 * Class User
 * @package App\Models
 */
class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @param string $date
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function apiHits($date = '')
    {
        $hits =  $this->hasMany(ApiHit::class, 'user_id', 'id');
        if (!empty($date) && $date != null) {
            $hits = $hits->where(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d")'), $date);
        }
        return $hits;
    }

}
