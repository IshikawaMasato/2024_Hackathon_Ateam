<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class report_tag extends Model
{
    use HasFactory;
    protected $table = 'report_tag';
    public $incrementing = false; // 自動インクリメントではない
    protected $keyType = 'array';  // 複合主キーを使用

    protected $fillable = ['report_id', 'tag_id', 'delete_flag'];

    // テーブルの主キーを指定するメソッド
    public function getKey()
    {
        return [$this->report_id, $this->tag_id];
    }
}
