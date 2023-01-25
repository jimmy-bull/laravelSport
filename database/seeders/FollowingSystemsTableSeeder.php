<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FollowingSystemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('following_systems')->delete();
        
        \DB::table('following_systems')->insert(array (
            0 => 
            array (
                'created_at' => '2022-07-27 09:57:20',
                'id' => 8,
                'thefollowed' => 'Jamal@gmail.com',
                'thefollower' => 'jbull635@gmail.com',
                'thefollowingState' => 'isfollowing',
                'updated_at' => '2022-08-21 16:34:23',
            ),
            1 => 
            array (
                'created_at' => '2022-07-27 09:57:54',
                'id' => 9,
                'thefollowed' => 'Lille@gmail.com',
                'thefollower' => 'jbull635@gmail.com',
                'thefollowingState' => 'isfollowing',
                'updated_at' => '2022-07-27 12:43:43',
            ),
            2 => 
            array (
                'created_at' => '2022-07-27 10:06:45',
                'id' => 10,
                'thefollowed' => 'Paris@gmail.com',
                'thefollower' => 'jbull635@gmail.com',
                'thefollowingState' => 'isfollowing',
                'updated_at' => '2022-07-27 13:08:58',
            ),
            3 => 
            array (
                'created_at' => '2022-07-27 12:43:51',
                'id' => 11,
                'thefollowed' => 'icremin@example.org',
                'thefollower' => 'jbull635@gmail.com',
                'thefollowingState' => 'isfollowing',
                'updated_at' => '2022-07-27 12:43:57',
            ),
            4 => 
            array (
                'created_at' => '2022-07-27 12:44:02',
                'id' => 12,
                'thefollowed' => 'carley93@example.net',
                'thefollower' => 'jbull635@gmail.com',
                'thefollowingState' => 'isfollowing',
                'updated_at' => '2022-07-27 12:44:02',
            ),
            5 => 
            array (
                'created_at' => '2022-07-27 12:44:44',
                'id' => 13,
                'thefollowed' => 'brianne83@example.org',
                'thefollower' => 'jbull635@gmail.com',
                'thefollowingState' => 'isfollowing',
                'updated_at' => '2022-07-27 12:44:44',
            ),
            6 => 
            array (
                'created_at' => '2022-07-27 12:45:20',
                'id' => 14,
                'thefollowed' => 'uschimmel@example.com',
                'thefollower' => 'jbull635@gmail.com',
                'thefollowingState' => 'isunfollowed',
                'updated_at' => '2022-07-27 12:45:22',
            ),
            7 => 
            array (
                'created_at' => '2022-07-27 13:48:50',
                'id' => 15,
                'thefollowed' => 'jbull635@gmail.com',
                'thefollower' => 'Jamal@gmail.com',
                'thefollowingState' => 'isfollowing',
                'updated_at' => '2022-09-17 21:29:41',
            ),
            8 => 
            array (
                'created_at' => '2022-09-01 05:04:40',
                'id' => 16,
                'thefollowed' => 'jbull635@gmail.com',
                'thefollower' => 'Lille@gmail.com',
                'thefollowingState' => 'isfollowing',
                'updated_at' => '2022-09-01 05:04:40',
            ),
            9 => 
            array (
                'created_at' => '2022-11-25 12:31:06',
                'id' => 17,
                'thefollowed' => 'jbull635@gmail.com',
                'thefollower' => 'thetrackmonster@gmail.com',
                'thefollowingState' => 'isfollowing',
                'updated_at' => '2022-11-25 12:31:06',
            ),
            10 => 
            array (
                'created_at' => '2022-11-25 12:46:29',
                'id' => 18,
                'thefollowed' => 'Jamal@gmail.com',
                'thefollower' => 'noreply@o-score.fr',
                'thefollowingState' => 'isfollowing',
                'updated_at' => '2022-11-25 12:46:29',
            ),
            11 => 
            array (
                'created_at' => '2022-11-25 12:47:27',
                'id' => 19,
                'thefollowed' => 'jbull635@gmail.com',
                'thefollower' => 'noreply@o-score.fr',
                'thefollowingState' => 'isfollowing',
                'updated_at' => '2022-11-25 12:47:27',
            ),
        ));
        
        
    }
}