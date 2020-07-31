<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('insert into reviews (book_id, name, body)
        values
        (1, "山田太郎", "環境を作るのに手間取ったが、本の通りにゲームアプリを作ることができて、楽しかった。"),
        (1, "鈴木智子", "初めてC#に挑戦しました。手順説明が丁寧で、図が多くて、良かったです。"),
        (1, "田中博司", "小5の子どもと一緒に勉強しました。途中からほとんど私がコーディングしていましたが。。。ダウンロードサンプルがあったので、つまづいた時に利用できて助かりました。"),
        (2, "山田太郎", "仕事でAndroidアプリ開発を行うことになって購入した。説明が詳しく、分かりやすい。")
        ');
    }
}
