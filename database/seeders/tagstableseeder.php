<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tagstableseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $param = [
            'tag_name' => '地震',
            'delete_flag' => 0,
        ];
        DB::table('tags')->insert($param);

        $param = [
            'tag_name' => '津波',
            'delete_flag' => 0,
        ];
        DB::table('tags')->insert($param);

        $param = [
            'tag_name' => '台風',
            'delete_flag' => 0,
        ];
        DB::table('tags')->insert($param);

        $param = [
            'tag_name' => 'がけ崩れ',
            'delete_flag' => 0,
        ];
        DB::table('tags')->insert($param);

        $param = [
            'tag_name' => '地すべり',
            'delete_flag' => 0,
        ];
        DB::table('tags')->insert($param);

        $param = [
            'tag_name' => '落雷',
            'delete_flag' => 0,
        ];
        DB::table('tags')->insert($param);

        $param = [
            'tag_name' => '高潮',
            'delete_flag' => 0,
        ];
        DB::table('tags')->insert($param);

        $param = [
            'tag_name' => '大雪',
            'delete_flag' => 0,
        ];
        DB::table('tags')->insert($param);

        $param = [
            'tag_name' => '竜巻',
            'delete_flag' => 0,
        ];
        DB::table('tags')->insert($param);

        $param = [
            'tag_name' => '干ばつ',
            'delete_flag' => 0,
        ];
        DB::table('tags')->insert($param);

        $param = [
            'tag_name' => '冷夏',
            'delete_flag' => 0,
        ];
        DB::table('tags')->insert($param);

        $param = [
            'tag_name' => '火山噴火',
            'delete_flag' => 0,
        ];
        DB::table('tags')->insert($param);

        $param = [
            'tag_name' => '土砂崩れ',
            'delete_flag' => 0,
        ];
        DB::table('tags')->insert($param);

        $param = [
            'tag_name' => '火災',
            'delete_flag' => 0,
        ];
        DB::table('tags')->insert($param);

        $param = [
            'tag_name' => '洪水',
            'delete_flag' => 0,
        ];
        DB::table('tags')->insert($param);

        $param = [
            'tag_name' => '暴風',
            'delete_flag' => 0,
        ];
        DB::table('tags')->insert($param);
        //
    }
}
