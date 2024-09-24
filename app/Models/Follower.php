<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    // テーブル名を指定
    protected $table = 'follows';

    // 複合主キーがある場合、以下を設定する
    protected $primaryKey = ['follower_id', 'followed_id'];
    public $incrementing = false; // 自動増分を無効にする
    protected $keyType = 'int'; // 主キーの型を指定する

    // 更新日時を自動管理する
    public $timestamps = false;
}
