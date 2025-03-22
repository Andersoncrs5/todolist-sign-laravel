<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaskModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tasks';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'description',
        'completed',
        'fk_user_id'
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(UserModel::class);
    }
}
