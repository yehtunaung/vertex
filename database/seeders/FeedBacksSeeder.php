<?php

namespace Database\Seeders;

use App\Models\Feedback;
use Illuminate\Database\Seeder;

class FeedBacksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $feedbacks = [
            [
                'id'    =>  1,
                'title' => 'good',
            ],
            [
                'id'    =>  2,
                'title' => 'bad',
            ],
            [
                'id'    =>  3,
                'title' => 'initial',
            ],
        ];
        Feedback::insert($feedbacks);
    }
}
