<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DefeatsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('defeats')->delete();
        
        \DB::table('defeats')->insert(array (
            0 => 
            array (
                'created_at' => '2022-09-24 14:01:19',
                'game_id' => 45,
                'id' => 84,
                'looser_mail' => 'Jamal@gmail.com',
                'looser_team' => 'Jamal Foot',
                'score' => 2,
                'score_2' => 4,
                'status' => 'accepted',
                'updated_at' => '2022-09-24 14:03:19',
            ),
            1 => 
            array (
                'created_at' => '2022-09-29 13:19:02',
                'game_id' => 48,
                'id' => 85,
                'looser_mail' => 'Jamal@gmail.com',
                'looser_team' => 'Jamal basket',
                'score' => 18,
                'score_2' => 25,
                'status' => 'accepted',
                'updated_at' => '2022-09-29 13:20:19',
            ),
            2 => 
            array (
                'created_at' => '2022-09-29 13:40:30',
                'game_id' => 50,
                'id' => 104,
                'looser_mail' => 'jbull635@gmail.com',
                'looser_team' => 'Team-De-Basket',
                'score' => 100,
                'score_2' => 25,
                'status' => 'accepted',
                'updated_at' => '2022-09-29 13:40:55',
            ),
            3 => 
            array (
                'created_at' => '2022-09-29 13:43:54',
                'game_id' => 51,
                'id' => 106,
                'looser_mail' => 'Jamal@gmail.com',
                'looser_team' => 'Jamal Foot',
                'score' => 1,
                'score_2' => 3,
                'status' => 'accepted',
                'updated_at' => '2022-09-29 13:44:11',
            ),
            4 => 
            array (
                'created_at' => '2022-09-30 09:08:58',
                'game_id' => 52,
                'id' => 107,
                'looser_mail' => 'jbull635@gmail.com',
                'looser_team' => 'Real Team',
                'score' => 2,
                'score_2' => 4,
                'status' => 'accepted',
                'updated_at' => '2022-09-30 09:09:25',
            ),
            5 => 
            array (
                'created_at' => '2022-09-30 09:11:38',
                'game_id' => 53,
                'id' => 108,
                'looser_mail' => 'Jamal@gmail.com',
                'looser_team' => 'Jamal Foot',
                'score' => 2,
                'score_2' => 5,
                'status' => 'accepted',
                'updated_at' => '2022-09-30 09:12:05',
            ),
            6 => 
            array (
                'created_at' => '2022-09-30 09:40:04',
                'game_id' => 54,
                'id' => 109,
                'looser_mail' => 'Jamal@gmail.com',
                'looser_team' => 'Jamal basket',
                'score' => 10,
                'score_2' => 9,
                'status' => 'accepted',
                'updated_at' => '2022-09-30 09:40:45',
            ),
            7 => 
            array (
                'created_at' => '2022-10-01 19:42:58',
                'game_id' => 56,
                'id' => 111,
                'looser_mail' => 'Jamal@gmail.com',
                'looser_team' => 'Jamal Foot',
                'score' => 1,
                'score_2' => 3,
                'status' => 'accepted',
                'updated_at' => '2022-10-01 19:43:37',
            ),
            8 => 
            array (
                'created_at' => '2022-10-06 08:37:50',
                'game_id' => 101,
                'id' => 156,
                'looser_mail' => 'Jamal@gmail.com',
                'looser_team' => 'Jamal Foot',
                'score' => 2,
                'score_2' => 6,
                'status' => 'accepted',
                'updated_at' => '2022-10-06 08:37:50',
            ),
            9 => 
            array (
                'created_at' => '2022-10-06 08:46:32',
                'game_id' => 102,
                'id' => 157,
                'looser_mail' => 'jbull635@gmail.com',
                'looser_team' => 'Real Team',
                'score' => 3,
                'score_2' => 6,
                'status' => 'accepted',
                'updated_at' => '2022-10-06 08:46:32',
            ),
            10 => 
            array (
                'created_at' => '2022-10-06 11:20:06',
                'game_id' => 103,
                'id' => 158,
                'looser_mail' => 'jbull635@gmail.com',
                'looser_team' => 'Real Team',
                'score' => 2,
                'score_2' => 7,
                'status' => 'accepted',
                'updated_at' => '2022-10-06 11:20:06',
            ),
            11 => 
            array (
                'created_at' => '2022-10-06 11:21:20',
                'game_id' => 104,
                'id' => 159,
                'looser_mail' => 'jbull635@gmail.com',
                'looser_team' => 'Real Team',
                'score' => 2,
                'score_2' => 4,
                'status' => 'accepted',
                'updated_at' => '2022-10-06 11:21:20',
            ),
            12 => 
            array (
                'created_at' => '2022-10-06 11:25:51',
                'game_id' => 105,
                'id' => 160,
                'looser_mail' => 'Jamal@gmail.com',
                'looser_team' => 'Jamal Foot',
                'score' => 2,
                'score_2' => 6,
                'status' => 'accepted',
                'updated_at' => '2022-10-06 11:25:51',
            ),
            13 => 
            array (
                'created_at' => '2022-10-06 11:26:30',
                'game_id' => 106,
                'id' => 161,
                'looser_mail' => 'Jamal@gmail.com',
                'looser_team' => 'Jamal Foot',
                'score' => 1,
                'score_2' => 6,
                'status' => 'accepted',
                'updated_at' => '2022-10-06 11:26:30',
            ),
            14 => 
            array (
                'created_at' => '2022-12-19 12:49:48',
                'game_id' => 107,
                'id' => 162,
                'looser_mail' => 'Jamal@gmail.com',
                'looser_team' => 'Jamal basket',
                'score' => 2,
                'score_2' => 3,
                'status' => 'accepted',
                'updated_at' => '2022-12-20 10:22:03',
            ),
            15 => 
            array (
                'created_at' => '2022-12-19 13:29:59',
                'game_id' => 108,
                'id' => 164,
                'looser_mail' => 'Jamal@gmail.com',
                'looser_team' => 'Jamal basket',
                'score' => 45,
                'score_2' => 50,
                'status' => 'accepted',
                'updated_at' => '2022-12-19 13:30:21',
            ),
            16 => 
            array (
                'created_at' => '2023-01-16 19:33:05',
                'game_id' => 110,
                'id' => 166,
                'looser_mail' => 'jbull635@gmail.com',
                'looser_team' => 'Jimmy handball',
                'score' => 1,
                'score_2' => 2,
                'status' => 'accepted',
                'updated_at' => '2023-01-16 19:33:14',
            ),
            17 => 
            array (
                'created_at' => '2023-01-19 17:41:06',
                'game_id' => 111,
                'id' => 170,
                'looser_mail' => 'jbull635@gmail.com',
                'looser_team' => 'Jimmy handball',
                'score' => 13,
                'score_2' => 34,
                'status' => 'accepted',
                'updated_at' => '2023-01-19 17:41:30',
            ),
            18 => 
            array (
                'created_at' => '2023-01-19 18:16:42',
                'game_id' => 112,
                'id' => 171,
                'looser_mail' => 'Jamal@gmail.com',
                'looser_team' => 'jamal hand',
                'score' => 52,
                'score_2' => 58,
                'status' => 'accepted',
                'updated_at' => '2023-01-19 18:17:18',
            ),
        ));
        
        
    }
}