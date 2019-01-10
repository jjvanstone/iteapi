<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Log;
use Laravel\Passport\HasApiTokens;

class Post extends Model {
    use HasApiTokens, Notifiable;
	
    /**
     * The table associated to the model.
     *
     * @var string
     */
    protected $table = 'post';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'content',
        'updated_at',
        'created_at'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

}