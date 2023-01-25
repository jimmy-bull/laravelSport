<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersProfilePhotosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users__profile__photos')->delete();
        
        \DB::table('users__profile__photos')->insert(array (
            0 => 
            array (
                'created_at' => '2022-06-26 20:55:20',
                'email' => 'jbull635@gmail.com',
                'id' => 1,
                'image' => 'public/profils_photos/U6kVsbKpUqRZhnXwQBxHc3oG8xnQb2LjbzqtryzJ.jpg',
                'updated_at' => '2023-01-05 09:41:02',
            ),
            1 => 
            array (
                'created_at' => '2022-07-01 17:11:44',
                'email' => 'Lyon@gmail.com',
                'id' => 2,
                'image' => 'public/profils_photos/dlHnQo1HYNklAslXLubm5Ow76xTAs98cioMJA49c.jpg',
                'updated_at' => '2022-07-14 18:20:48',
            ),
            2 => 
            array (
                'created_at' => '2022-07-01 17:23:51',
                'email' => 'Jamal@gmail.com',
                'id' => 3,
                'image' => 'public/profils_photos/hOulMkphmD6ZKicPlWvknf4pfWNICcpXfNF73duj.jpg',
                'updated_at' => '2023-01-02 19:46:39',
            ),
            3 => 
            array (
                'created_at' => '2022-07-01 17:29:24',
                'email' => 'Paris@gmail.com',
                'id' => 4,
                'image' => 'public/profils_photos/NCGV15SLubm6BOG9ev68c355poiPHlP3OVzI1DkI.jpg',
                'updated_at' => '2022-09-01 04:59:20',
            ),
            4 => 
            array (
                'created_at' => '2022-09-01 05:03:37',
                'email' => 'Lille@gmail.com',
                'id' => 5,
                'image' => 'public/profils_photos/x82TepzmEGzgvwG6NlswTICPOfWzYkt8PYST1V2C.jpg',
                'updated_at' => '2022-09-01 05:03:37',
            ),
            5 => 
            array (
                'created_at' => '2022-09-01 05:13:05',
                'email' => 'rrunte@example.com',
                'id' => 6,
                'image' => 'public/profils_photos/DMsmnvXGsa6AMoXKrzomaLHbbasenCHxInNLmLJ3.jpg',
                'updated_at' => '2022-09-01 05:13:34',
            ),
            6 => 
            array (
                'created_at' => '2022-09-01 05:54:00',
                'email' => 'perry.stanton@example.org',
                'id' => 7,
                'image' => 'public/profils_photos/wo6HANkWl7ymUS3mc6unEhGNzhLSZMsvla2LBfed.jpg',
                'updated_at' => '2022-09-01 05:54:00',
            ),
            7 => 
            array (
                'created_at' => '2022-11-25 12:30:25',
                'email' => 'thetrackmonster@gmail.com',
                'id' => 8,
                'image' => 'public/profils_photos/znfJ5zYuoTzGGcL3TYK0hVP4tG1iOljiqSY4kig0.png',
                'updated_at' => '2022-11-25 12:30:25',
            ),
            8 => 
            array (
                'created_at' => '2022-11-25 12:49:31',
                'email' => 'noreply@o-score.fr',
                'id' => 9,
                'image' => 'public/profils_photos/tfSsIoTsX38WaS7Z2L6MjIjbhP3NE1w9f5k6FNpX.jpg',
                'updated_at' => '2022-11-25 12:50:00',
            ),
        ));
        
        
    }
}