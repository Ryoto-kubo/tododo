<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Commentsテーブルにインサートする.
        DB::table("Comments")->insert([
            "id" => 1,
            "request_id"=> 1,
            "comment"=> "テスト",
            "created_at" => new DateTime(),
            "updated_at" => new DateTime(),
            "deleted_at" => null,
        ]);
    }
}
