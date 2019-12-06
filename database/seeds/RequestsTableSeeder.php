<?php

use Illuminate\Database\Seeder;

class RequestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Requestssテーブルにインサートする.
        DB::table("Requests")->insert([
            "id" => 1,
            "title"=> "タイトルです",
            "contents"=> "内容です",
            "created_at" => new DateTime(),
            "updated_at" => new DateTime(),
            "deleted_at" => null,
        ]);
    }
}
