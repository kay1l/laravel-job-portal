<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TeamSize;

class TeamSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TeamSize::insert([
          [
            'name' => 'Only Me',
          'slug' => 'only-me'
        ],
        [
            'name' => '5-10 Members',
          'slug' => '5-10-members'
        ],
        [
            'name' => '10-20 Members',
          'slug' => '10-20-members'
        ],
        [
            'name' => '20-30 Members',
          'slug' => '20-30-members'
        ],
        [
            'name' => '30-40 Members',
          'slug' => '30-40-members'
        ],
        [
            'name' => '40-50 Members',
          'slug' => '40-50-members'
        ],
        [
            'name' => '50-100 Members',
          'slug' => '50-100-members'
        ],
        [
            'name' => '100-500 Members',
          'slug' => '100-500-members'
        ],
        [
            'name' => '500+ Members',
          'slug' => '500+-members'
        ],

        ]);
    }
}
