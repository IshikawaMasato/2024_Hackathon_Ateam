<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\category;

class report extends Model
{
    use HasFactory;
    protected $table = 'reports';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function comments()
    {
        return $this->hasMany(comments::class);
    }

    public function report_tag()
    {
        return $this->hasMany(report_tag::class);
    }

    public function tag()
    {
        return $this->belongsToMany(tag::class,'report_tag','report_id','tag_id');
    }
}
