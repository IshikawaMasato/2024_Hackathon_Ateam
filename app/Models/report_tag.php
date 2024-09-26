<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class report_tag extends Model
{
    use HasFactory;
    protected $table = 'report_tag';
    protected $fillable = ['report_id', 'tag_id'];

    public function report()
    {
        return $this->belongsTo(report::class);
    }
}
