<?php

namespace App\Models;

use App\Models\User;
use App\Models\Workspace;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'workspace_id',
        'user_id',
        'uuid',
        'name',
        'description',
        'deadline',
        'status',
    ];

    public function workspace()
    {
        return $this->belongsTo(Workspace::class, 'workspace_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
