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
        // commentsテーブルにインサートする.
        DB::table("comments")->insert([
            "id" => 1,
            "message_id"=> 1,
            "comment"=> "テスト",
            "created_at" => new DateTime(),
            "updated_at" => new DateTime(),
            "deleted_at" => null,
        ]);
    }
}
