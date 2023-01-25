<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TeamRatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('team_rates')->delete();
        
        \DB::table('team_rates')->insert(array (
            0 => 
            array (
                'created_at' => '2022-09-24 14:01:19',
                'fair_play' => 4.0,
                'game_id' => 45,
                'id' => 66,
                'punctuality' => 4.0,
                'status' => 'pending',
                'team_rated_name' => 'Real Team',
                'teamrated' => 0.0,
                'updated_at' => '2022-09-24 14:03:19',
                'wichteamrated' => 'Jamal Foot',
            ),
            1 => 
            array (
                'created_at' => '2022-09-24 14:01:37',
                'fair_play' => 4.0,
                'game_id' => 45,
                'id' => 67,
                'punctuality' => 4.0,
                'status' => 'accepted',
                'team_rated_name' => 'Jamal Foot',
                'teamrated' => 0.0,
                'updated_at' => '2022-09-24 14:03:19',
                'wichteamrated' => 'Real Team',
            ),
            2 => 
            array (
                'created_at' => '2022-09-29 13:19:02',
                'fair_play' => 4.0,
                'game_id' => 48,
                'id' => 72,
                'punctuality' => 2.5,
                'status' => 'pending',
                'team_rated_name' => 'Jamal basket',
                'teamrated' => 0.0,
                'updated_at' => '2022-09-29 13:19:02',
                'wichteamrated' => 'Team-De-Basket',
            ),
            3 => 
            array (
                'created_at' => '2022-09-29 13:20:19',
                'fair_play' => 4.0,
                'game_id' => 48,
                'id' => 73,
                'punctuality' => 2.5,
                'status' => 'accepted',
                'team_rated_name' => 'Team-De-Basket',
                'teamrated' => 0.0,
                'updated_at' => '2022-09-29 13:20:19',
                'wichteamrated' => 'Jamal basket',
            ),
            4 => 
            array (
                'created_at' => '2022-09-29 13:22:52',
                'fair_play' => 4.0,
                'game_id' => 49,
                'id' => 74,
                'punctuality' => 2.5,
                'status' => 'pending',
                'team_rated_name' => 'Jamal basket',
                'teamrated' => 0.0,
                'updated_at' => '2022-09-29 13:22:52',
                'wichteamrated' => 'Team-De-Basket',
            ),
            5 => 
            array (
                'created_at' => '2022-09-29 13:23:15',
                'fair_play' => 4.0,
                'game_id' => 49,
                'id' => 75,
                'punctuality' => 2.5,
                'status' => 'accepted',
                'team_rated_name' => 'Team-De-Basket',
                'teamrated' => 0.0,
                'updated_at' => '2022-09-29 13:23:15',
                'wichteamrated' => 'Jamal basket',
            ),
            6 => 
            array (
                'created_at' => '2022-09-29 13:26:21',
                'fair_play' => 4.0,
                'game_id' => 50,
                'id' => 76,
                'punctuality' => 2.5,
                'status' => 'pending',
                'team_rated_name' => 'Jamal basket',
                'teamrated' => 0.0,
                'updated_at' => '2022-09-29 13:40:31',
                'wichteamrated' => 'Team-De-Basket',
            ),
            7 => 
            array (
                'created_at' => '2022-09-29 13:40:55',
                'fair_play' => 5.0,
                'game_id' => 50,
                'id' => 77,
                'punctuality' => 2.5,
                'status' => 'accepted',
                'team_rated_name' => 'Team-De-Basket',
                'teamrated' => 0.0,
                'updated_at' => '2022-09-29 13:40:55',
                'wichteamrated' => 'Jamal basket',
            ),
            8 => 
            array (
                'created_at' => '2022-09-29 13:43:01',
                'fair_play' => 4.0,
                'game_id' => 51,
                'id' => 78,
                'punctuality' => 2.5,
                'status' => 'pending',
                'team_rated_name' => 'Real Team',
                'teamrated' => 0.0,
                'updated_at' => '2022-09-29 13:43:54',
                'wichteamrated' => 'Jamal Foot',
            ),
            9 => 
            array (
                'created_at' => '2022-09-29 13:44:11',
                'fair_play' => 4.0,
                'game_id' => 51,
                'id' => 79,
                'punctuality' => 2.5,
                'status' => 'accepted',
                'team_rated_name' => 'Jamal Foot',
                'teamrated' => 0.0,
                'updated_at' => '2022-09-29 13:44:11',
                'wichteamrated' => 'Real Team',
            ),
            10 => 
            array (
                'created_at' => '2022-09-30 09:08:58',
                'fair_play' => 4.0,
                'game_id' => 52,
                'id' => 80,
                'punctuality' => 2.5,
                'status' => 'pending',
                'team_rated_name' => 'Jamal Foot',
                'teamrated' => 0.0,
                'updated_at' => '2022-09-30 09:08:58',
                'wichteamrated' => 'Real Team',
            ),
            11 => 
            array (
                'created_at' => '2022-09-30 09:09:25',
                'fair_play' => 4.0,
                'game_id' => 52,
                'id' => 81,
                'punctuality' => 2.5,
                'status' => 'accepted',
                'team_rated_name' => 'Real Team',
                'teamrated' => 0.0,
                'updated_at' => '2022-09-30 09:09:25',
                'wichteamrated' => 'Jamal Foot',
            ),
            12 => 
            array (
                'created_at' => '2022-09-30 09:11:39',
                'fair_play' => 4.0,
                'game_id' => 53,
                'id' => 82,
                'punctuality' => 2.5,
                'status' => 'pending',
                'team_rated_name' => 'Jamal Foot',
                'teamrated' => 0.0,
                'updated_at' => '2022-09-30 09:11:39',
                'wichteamrated' => 'Real Team',
            ),
            13 => 
            array (
                'created_at' => '2022-09-30 09:12:05',
                'fair_play' => 4.0,
                'game_id' => 53,
                'id' => 83,
                'punctuality' => 2.5,
                'status' => 'accepted',
                'team_rated_name' => 'Real Team',
                'teamrated' => 0.0,
                'updated_at' => '2022-09-30 09:12:05',
                'wichteamrated' => 'Jamal Foot',
            ),
            14 => 
            array (
                'created_at' => '2022-09-30 09:40:05',
                'fair_play' => 5.0,
                'game_id' => 54,
                'id' => 84,
                'punctuality' => 2.5,
                'status' => 'pending',
                'team_rated_name' => 'Team-De-Basket',
                'teamrated' => 0.0,
                'updated_at' => '2022-09-30 09:40:05',
                'wichteamrated' => 'Jamal basket',
            ),
            15 => 
            array (
                'created_at' => '2022-09-30 09:40:45',
                'fair_play' => 5.0,
                'game_id' => 54,
                'id' => 85,
                'punctuality' => 2.5,
                'status' => 'accepted',
                'team_rated_name' => 'Jamal basket',
                'teamrated' => 0.0,
                'updated_at' => '2022-09-30 09:40:45',
                'wichteamrated' => 'Team-De-Basket',
            ),
            16 => 
            array (
                'created_at' => '2022-09-30 09:42:01',
                'fair_play' => 4.0,
                'game_id' => 55,
                'id' => 86,
                'punctuality' => 2.5,
                'status' => 'pending',
                'team_rated_name' => 'Team-De-Basket',
                'teamrated' => 0.0,
                'updated_at' => '2022-09-30 09:42:32',
                'wichteamrated' => 'Jamal basket',
            ),
            17 => 
            array (
                'created_at' => '2022-09-30 09:42:42',
                'fair_play' => 4.0,
                'game_id' => 55,
                'id' => 87,
                'punctuality' => 2.5,
                'status' => 'accepted',
                'team_rated_name' => 'Jamal basket',
                'teamrated' => 0.0,
                'updated_at' => '2022-09-30 09:42:42',
                'wichteamrated' => 'Team-De-Basket',
            ),
            18 => 
            array (
                'created_at' => '2022-10-01 19:42:59',
                'fair_play' => 4.0,
                'game_id' => 56,
                'id' => 88,
                'punctuality' => 2.5,
                'status' => 'pending',
                'team_rated_name' => 'Jamal Foot',
                'teamrated' => 0.0,
                'updated_at' => '2022-10-01 19:42:59',
                'wichteamrated' => 'Real Team',
            ),
            19 => 
            array (
                'created_at' => '2022-10-01 19:43:37',
                'fair_play' => 4.0,
                'game_id' => 56,
                'id' => 89,
                'punctuality' => 2.5,
                'status' => 'accepted',
                'team_rated_name' => 'Real Team',
                'teamrated' => 0.0,
                'updated_at' => '2022-10-01 19:43:37',
                'wichteamrated' => 'Jamal Foot',
            ),
            20 => 
            array (
                'created_at' => '2022-12-19 12:49:49',
                'fair_play' => 4.0,
                'game_id' => 107,
                'id' => 90,
                'punctuality' => 2.5,
                'status' => 'pending',
                'team_rated_name' => 'Team-De-Basket',
                'teamrated' => 0.0,
                'updated_at' => '2022-12-19 12:49:49',
                'wichteamrated' => 'Jamal basket',
            ),
            21 => 
            array (
                'created_at' => '2022-12-19 12:50:59',
                'fair_play' => 4.0,
                'game_id' => 107,
                'id' => 91,
                'punctuality' => 4.0,
                'status' => 'accepted',
                'team_rated_name' => 'Jamal basket',
                'teamrated' => 0.0,
                'updated_at' => '2022-12-19 12:50:59',
                'wichteamrated' => 'Team-De-Basket',
            ),
            22 => 
            array (
                'created_at' => '2022-12-19 13:28:55',
                'fair_play' => 4.0,
                'game_id' => 108,
                'id' => 92,
                'punctuality' => 2.5,
                'status' => 'pending',
                'team_rated_name' => 'Jamal basket',
                'teamrated' => 0.0,
                'updated_at' => '2022-12-19 13:30:00',
                'wichteamrated' => 'Team-De-Basket',
            ),
            23 => 
            array (
                'created_at' => '2022-12-19 13:30:21',
                'fair_play' => 4.0,
                'game_id' => 108,
                'id' => 93,
                'punctuality' => 4.0,
                'status' => 'accepted',
                'team_rated_name' => 'Team-De-Basket',
                'teamrated' => 0.0,
                'updated_at' => '2022-12-19 13:30:21',
                'wichteamrated' => 'Jamal basket',
            ),
            24 => 
            array (
                'created_at' => '2022-12-19 15:07:56',
                'fair_play' => 4.0,
                'game_id' => 109,
                'id' => 94,
                'punctuality' => 2.5,
                'status' => 'pending',
                'team_rated_name' => 'Jamal basket',
                'teamrated' => 0.0,
                'updated_at' => '2022-12-19 15:07:56',
                'wichteamrated' => 'Team-De-Basket',
            ),
            25 => 
            array (
                'created_at' => '2022-12-19 15:08:12',
                'fair_play' => 4.0,
                'game_id' => 109,
                'id' => 95,
                'punctuality' => 2.5,
                'status' => 'accepted',
                'team_rated_name' => 'Team-De-Basket',
                'teamrated' => 0.0,
                'updated_at' => '2022-12-19 15:08:12',
                'wichteamrated' => 'Jamal basket',
            ),
            26 => 
            array (
                'created_at' => '2023-01-16 19:32:22',
                'fair_play' => 5.0,
                'game_id' => 110,
                'id' => 96,
                'punctuality' => 2.5,
                'status' => 'pending',
                'team_rated_name' => 'Jimmy handball',
                'teamrated' => 0.0,
                'updated_at' => '2023-01-16 19:33:06',
                'wichteamrated' => 'jamal hand',
            ),
            27 => 
            array (
                'created_at' => '2023-01-16 19:33:14',
                'fair_play' => 5.0,
                'game_id' => 110,
                'id' => 97,
                'punctuality' => 2.5,
                'status' => 'accepted',
                'team_rated_name' => 'jamal hand',
                'teamrated' => 0.0,
                'updated_at' => '2023-01-16 19:33:14',
                'wichteamrated' => 'Jimmy handball',
            ),
            28 => 
            array (
                'created_at' => '2023-01-19 15:56:03',
                'fair_play' => 5.0,
                'game_id' => 111,
                'id' => 98,
                'punctuality' => 2.5,
                'status' => 'pending',
                'team_rated_name' => 'jamal hand',
                'teamrated' => 0.0,
                'updated_at' => '2023-01-19 17:41:06',
                'wichteamrated' => 'Jimmy handball',
            ),
            29 => 
            array (
                'created_at' => '2023-01-19 17:41:30',
                'fair_play' => 4.0,
                'game_id' => 111,
                'id' => 99,
                'punctuality' => 2.5,
                'status' => 'accepted',
                'team_rated_name' => 'Jimmy handball',
                'teamrated' => 0.0,
                'updated_at' => '2023-01-19 17:41:30',
                'wichteamrated' => 'jamal hand',
            ),
            30 => 
            array (
                'created_at' => '2023-01-19 18:16:42',
                'fair_play' => 2.5,
                'game_id' => 112,
                'id' => 100,
                'punctuality' => 2.5,
                'status' => 'pending',
                'team_rated_name' => 'Jimmy handball',
                'teamrated' => 0.0,
                'updated_at' => '2023-01-19 18:16:42',
                'wichteamrated' => 'jamal hand',
            ),
            31 => 
            array (
                'created_at' => '2023-01-19 18:17:17',
                'fair_play' => 5.0,
                'game_id' => 112,
                'id' => 101,
                'punctuality' => 2.5,
                'status' => 'accepted',
                'team_rated_name' => 'jamal hand',
                'teamrated' => 0.0,
                'updated_at' => '2023-01-19 18:17:17',
                'wichteamrated' => 'Jimmy handball',
            ),
        ));
        
        
    }
}