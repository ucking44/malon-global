<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkCondition extends Model
{
    use HasFactory;

    protected $table = 'work_conditions';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'description',
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

}

