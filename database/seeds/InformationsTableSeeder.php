<?php

use Illuminate\Database\Seeder;

class InformationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ownersテーブルにインサートする.
        DB::table("informations")->insert([
            "id" => 1,
            "title" => "バグを直しました",
            "detail"=> "テスト",
            "created_at" => new DateTime(),
            "updated_at" => new DateTime(),
            "deleted_at" => null,
        ]);
    }
}
