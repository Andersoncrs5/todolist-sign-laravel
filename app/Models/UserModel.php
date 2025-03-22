<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'user';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'password',
        'last_login_at'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];

    public function tasks()
    {
        return $this->hasMany(TaskModel::class, 'fk_user_id', 'id');
    }
}
