<?php

namespace Database\Seeders;

use App\Models\Config;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            Config::insert(
               [
                    [
                        'name'  => 'logo',
                        'value' => 'logo.png',
                        'type'  => 'image',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'name'  => 'blogname',
                        'value' => 'beeBlog',
                        'type'  => 'text',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'name'  => 'title',
                        'value' => 'Welcome to Blog Home!',
                        'type'  => 'text',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'name'  => 'caption',
                        'value' => 'A Bootstrap 5 starter layout for your next blog homepage',
                        'type'  => 'text',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'name'  => 'ads_widget',
                        'value' => 'adsene widget',
                        'type'  => 'text',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'name'  => 'ads_header',
                        'value' => 'adsene header',
                        'type'  => 'text',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'name'  => 'ads_footer',
                        'value' => 'adsene footer',
                        'type'  => 'text',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'name'  => 'phone',
                        'value' => '082353089050',
                        'type'  => 'text',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'name'  => 'email',
                        'value' => 'beecode@gmail.com',
                        'type'  => 'text',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'name'  => 'facebook',
                        'value' => 'facebook.com',
                        'type'  => 'text',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ], [
                        'name'  => 'whatsapp',
                        'value' => 'whatsapp',
                        'type'  => 'text',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ], [
                        'name'  => 'youtube',
                        'value' => 'youtube',
                        'type'  => 'text',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'name'  => 'instagram',
                        'value' => 'instagram',
                        'type'  => 'text',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'name'  => 'footer',
                        'value' => 'footer',
                        'type'  => 'text',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]
               ]
            );
    }
}
