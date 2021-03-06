<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    use HasFactory;

    protected $table = 'job_types';

    protected $primaryKey = 'id';

    protected $fillable = [
        'job_type_name',
        'JT_description',
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

}

