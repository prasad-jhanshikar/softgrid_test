<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


/**
 * Class User
 * @package App\Models
 */
class ApiHit extends Model
{
    /**
     * @var string
     */
    protected $table = 'api_hits';
    /**
     * @var array
     */
    protected $guarded = ['id'];
    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
