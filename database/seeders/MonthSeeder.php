<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\month;

class MonthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $month = [
            [
                'id' => 1,
                'month_name' => 'januari'
            ],
            [
                'id' => 2,
                'month_name' => 'februari'
            ],
            [
                'id' => 3,
                'month_name' => 'maret'
            ],
            [
                'id' => 4,
                'month_name' => 'april'
            ],
            [
                'id' => 5,
                'month_name' => 'mei'
            ],
            [
                'id' => 6,
                'month_name' => 'juni'
            ],
            [
                'id' => 7,
                'month_name' => 'juli'
            ],
            [
                'id' => 8,
                'month_name' => 'agustus'
            ],
            [
                'id' => 9,
                'month_name' => 'september'
            ],
            [
                'id' => 10,
                'month_name' => 'oktober'
            ],
            [
                'id' => 11,
                'month_name' => 'november'
            ],
            [
                'id' => 12,
                'month_name' => 'desember'
            ]
            ];
        DB::table('months')->insert($month);
    }
}
