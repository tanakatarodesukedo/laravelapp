<?php

use App\Restdata;
use Illuminate\Database\Seeder;

class RestdataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            ['message' => 'Google Japan',
            'url' => 'https://www.google.co.jp'],
            ['message' => 'Yahoo Japan',
            'url' => 'https://www.yahoo.co.jp'],
            ['message' => 'MSN Japan',
            'url' => 'http://www.msn.com/ja-jp']
        ];

        foreach ($params as $param) {
            $restdata = new Restdata();
            $restdata->fill($param)->save();
        }
    }
}
