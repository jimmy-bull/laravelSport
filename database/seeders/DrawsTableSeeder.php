<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DrawsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('draws')->delete();
        
        \DB::table('draws')->insert(array (
            0 => 
            array (
                'created_at' => '2022-09-29 13:22:51',
                'game_id' => 49,
                'id' => 24,
                'mail' => 'Jamal@gmail.com',
                'score' => 100,
                'status' => 'accepted',
                'team' => 'Jamal basket',
                'updated_at' => '2022-09-29 13:23:15',
            ),
            1 => 
            array (
                'created_at' => '2022-09-29 13:22:52',
                'game_id' => 49,
                'id' => 25,
                'mail' => 'jbull635@gmail.com',
                'score' => 100,
                'status' => 'accepted',
                'team' => 'Team-De-Basket',
                'updated_at' => '2022-09-29 13:23:15',
            ),
            2 => 
            array (
                'created_at' => '2022-09-30 09:42:32',
                'game_id' => 55,
                'id' => 26,
                'mail' => 'jbull635@gmail.com',
                'score' => 20,
                'status' => 'accepted',
                'team' => 'Team-De-Basket',
                'updated_at' => '2022-09-30 09:42:43',
            ),
            3 => 
            array (
                'created_at' => '2022-09-30 09:42:32',
                'game_id' => 55,
                'id' => 27,
                'mail' => 'Jamal@gmail.com',
                'score' => 20,
                'status' => 'accepted',
                'team' => 'Jamal basket',
                'updated_at' => '2022-09-30 09:42:43',
            ),
            4 => 
            array (
                'created_at' => '2022-12-19 15:07:55',
                'game_id' => 109,
                'id' => 28,
                'mail' => 'Jamal@gmail.com',
                'score' => 100,
                'status' => 'accepted',
                'team' => 'Jamal basket',
                'updated_at' => '2022-12-19 15:08:13',
            ),
            5 => 
            array (
                'created_at' => '2022-12-19 15:07:56',
                'game_id' => 109,
                'id' => 29,
                'mail' => 'jbull635@gmail.com',
                'score' => 100,
                'status' => 'accepted',
                'team' => 'Team-De-Basket',
                'updated_at' => '2022-12-19 15:08:13',
            ),
        ));
        
        
    }
}