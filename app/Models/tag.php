<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    use HasFactory;

    public function report()
    {
        return $this->belongsToMany(report::class,'report_tags','report_id','tag_id');
    }
}
