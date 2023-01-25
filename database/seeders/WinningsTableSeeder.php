<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WinningsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('winnings')->delete();
        
        \DB::table('winnings')->insert(array (
            0 => 
            array (
                'created_at' => '2022-09-24 14:01:19',
                'game_id' => 45,
                'id' => 129,
                'score' => 4,
                'score_2' => 2,
                'status' => 'accepted',
                'updated_at' => '2022-09-24 14:03:19',
                'winner_mail' => 'jbull635@gmail.com',
                'winner_team' => 'Real Team',
            ),
            1 => 
            array (
                'created_at' => '2022-09-29 13:19:00',
                'game_id' => 48,
                'id' => 130,
                'score' => 25,
                'score_2' => 18,
                'status' => 'accepted',
                'updated_at' => '2022-09-29 13:20:19',
                'winner_mail' => 'jbull635@gmail.com',
                'winner_team' => 'Team-De-Basket',
            ),
            2 => 
            array (
                'created_at' => '2022-09-29 13:40:30',
                'game_id' => 50,
                'id' => 149,
                'score' => 25,
                'score_2' => 100,
                'status' => 'accepted',
                'updated_at' => '2022-09-29 13:40:55',
                'winner_mail' => 'Jamal@gmail.com',
                'winner_team' => 'Jamal basket',
            ),
            3 => 
            array (
                'created_at' => '2022-09-29 13:43:54',
                'game_id' => 51,
                'id' => 151,
                'score' => 3,
                'score_2' => 1,
                'status' => 'accepted',
                'updated_at' => '2022-09-29 13:44:11',
                'winner_mail' => 'jbull635@gmail.com',
                'winner_team' => 'Real Team',
            ),
            4 => 
            array (
                'created_at' => '2022-09-30 09:08:58',
                'game_id' => 52,
                'id' => 152,
                'score' => 4,
                'score_2' => 2,
                'status' => 'accepted',
                'updated_at' => '2022-09-30 09:09:25',
                'winner_mail' => 'Jamal@gmail.com',
                'winner_team' => 'Jamal Foot',
            ),
            5 => 
            array (
                'created_at' => '2022-09-30 09:11:38',
                'game_id' => 53,
                'id' => 153,
                'score' => 5,
                'score_2' => 2,
                'status' => 'accepted',
                'updated_at' => '2022-09-30 09:12:05',
                'winner_mail' => 'jbull635@gmail.com',
                'winner_team' => 'Real Team',
            ),
            6 => 
            array (
                'created_at' => '2022-09-30 09:40:04',
                'game_id' => 54,
                'id' => 154,
                'score' => 9,
                'score_2' => 10,
                'status' => 'accepted',
                'updated_at' => '2022-09-30 09:40:45',
                'winner_mail' => 'jbull635@gmail.com',
                'winner_team' => 'Team-De-Basket',
            ),
            7 => 
            array (
                'created_at' => '2022-10-01 19:42:58',
                'game_id' => 56,
                'id' => 156,
                'score' => 3,
                'score_2' => 1,
                'status' => 'accepted',
                'updated_at' => '2022-10-01 19:43:37',
                'winner_mail' => 'jbull635@gmail.com',
                'winner_team' => 'Real Team',
            ),
            8 => 
            array (
                'created_at' => '2022-10-06 08:38:52',
                'game_id' => 101,
                'id' => 202,
                'score' => 9,
                'score_2' => 2,
                'status' => 'accepted',
                'updated_at' => '2022-10-06 08:38:52',
                'winner_mail' => 'jbull635@gmail.com',
                'winner_team' => 'Real Team',
            ),
            9 => 
            array (
                'created_at' => '2022-10-06 08:54:24',
                'game_id' => 102,
                'id' => 204,
                'score' => 6,
                'score_2' => 0,
                'status' => 'accepted',
                'updated_at' => '2022-10-06 08:54:24',
                'winner_mail' => 'Jamal@gmail.com',
                'winner_team' => 'Jamal Foot',
            ),
            10 => 
            array (
                'created_at' => '2022-10-06 11:20:42',
                'game_id' => 103,
                'id' => 205,
                'score' => 5,
                'score_2' => 2,
                'status' => 'accepted',
                'updated_at' => '2022-10-06 11:20:42',
                'winner_mail' => 'Jamal@gmail.com',
                'winner_team' => 'Jamal Foot',
            ),
            11 => 
            array (
                'created_at' => '2022-10-06 11:21:16',
                'game_id' => 104,
                'id' => 206,
                'score' => 4,
                'score_2' => 0,
                'status' => 'accepted',
                'updated_at' => '2022-10-06 11:21:16',
                'winner_mail' => 'Jamal@gmail.com',
                'winner_team' => 'Jamal Foot',
            ),
            12 => 
            array (
                'created_at' => '2022-10-06 11:25:55',
                'game_id' => 105,
                'id' => 207,
                'score' => 6,
                'score_2' => 3,
                'status' => 'accepted',
                'updated_at' => '2022-10-06 11:25:55',
                'winner_mail' => 'jbull635@gmail.com',
                'winner_team' => 'Real Team',
            ),
            13 => 
            array (
                'created_at' => '2022-10-06 11:26:27',
                'game_id' => 106,
                'id' => 208,
                'score' => 9,
                'score_2' => 1,
                'status' => 'accepted',
                'updated_at' => '2022-10-06 11:26:27',
                'winner_mail' => 'jbull635@gmail.com',
                'winner_team' => 'Real Team',
            ),
            14 => 
            array (
                'created_at' => '2022-12-19 12:49:48',
                'game_id' => 107,
                'id' => 209,
                'score' => 3,
                'score_2' => 2,
                'status' => 'accepted',
                'updated_at' => '2022-12-20 10:22:03',
                'winner_mail' => 'jbull635@gmail.com',
                'winner_team' => 'Team-De-Basket',
            ),
            15 => 
            array (
                'created_at' => '2022-12-19 13:29:59',
                'game_id' => 108,
                'id' => 211,
                'score' => 50,
                'score_2' => 45,
                'status' => 'accepted',
                'updated_at' => '2022-12-19 13:30:21',
                'winner_mail' => 'jbull635@gmail.com',
                'winner_team' => 'Team-De-Basket',
            ),
            16 => 
            array (
                'created_at' => '2023-01-16 19:33:05',
                'game_id' => 110,
                'id' => 213,
                'score' => 2,
                'score_2' => 1,
                'status' => 'accepted',
                'updated_at' => '2023-01-16 19:33:14',
                'winner_mail' => 'Jamal@gmail.com',
                'winner_team' => 'jamal hand',
            ),
            17 => 
            array (
                'created_at' => '2023-01-19 17:41:05',
                'game_id' => 111,
                'id' => 217,
                'score' => 34,
                'score_2' => 13,
                'status' => 'accepted',
                'updated_at' => '2023-01-19 17:41:30',
                'winner_mail' => 'Jamal@gmail.com',
                'winner_team' => 'jamal hand',
            ),
            18 => 
            array (
                'created_at' => '2023-01-19 18:16:42',
                'game_id' => 112,
                'id' => 218,
                'score' => 58,
                'score_2' => 52,
                'status' => 'accepted',
                'updated_at' => '2023-01-19 18:17:18',
                'winner_mail' => 'jbull635@gmail.com',
                'winner_team' => 'Jimmy handball',
            ),
        ));
        
        
    }
}