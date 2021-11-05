<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'jobs';

    protected $primaryKey = 'id';

    protected $fillable = [
        'job_name',
        'category_id',
        'jobType_id',
        'workCondition_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function jobType()
    {
        return $this->belongsTo(JobType::class);
    }

    public function workCondition()
    {
        return $this->belongsTo(WorkCondition::class);
    }

}

