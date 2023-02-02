<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Users_Profile_Photo;
use App\Models\FollowingSystem;
use App\Models\PostTable;
use App\Models\Team;
use App\Models\AskGame;
use App\Models\phone;
use Illuminate\Support\Facades\DB;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName(),
            'lastname' => $this->faker->name(),
            'city' => $this->faker->city(),
            "latitude" => $this->faker->latitude(),
            "longitude" => $this->faker->longitude(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$v91eT4OXFaMtA1macO4G3Ov8uAigOTHpoilWAkHiWkCwagiQfoJb2', // password
            'remember_token' => Str::random(10),
            "country" => 'FRANCE',
            "speudo" => $this->faker->name(),
            "location" =>  DB::raw("POINT(" .  $this->faker->longitude() . ',' . $this->faker->latitude() . ")")
        ];
    }
    public function configure()
    {
        return $this->afterCreating(function (User $user) {
            Users_Profile_Photo::factory(1)->create([
                'email' => $user->email,
                'image' => $this->faker->randomElement([
                    "public/post_images_videos/main_1.jpeg",
                    "public/post_images_videos/barssa.jpg",
                    "public/post_images_videos/barsa.jpg"
                ]),
            ]);
            FollowingSystem::factory(1)->create([
                'thefollower' =>  "jbull635@gmail.com",
                'thefollowed' => $user->email,
                'thefollowingState' => "isfollowing",
            ]);

            PostTable::factory(1)->create([
                'title' => $this->faker->text(30),
                'user_id' => $user->id,
                'who_can_see' => "monde",
                "status" => "online"
            ]); // 

            phone::factory(1)->create([
                'users_id' => $user->id,
                "phone_number" => $this->faker->numberBetween(10000, 20000)
            ]); //
            // Team::factory(1)->create([
            //     'team_name' => $this->faker->name(),
            //     'sport_name' => "Football",
            //     'city' => $this->faker->city(),
            //     'email' => $user->email,
            //     'logo' => $this->faker->randomElement([
            //         "public/teams_photos/barc.jpg",
            //         "public/teams_photos/mars.png",
            //         "public/teams_photos/paris.jpg",
            //         "public/teams_photos/paris_2.jpg"
            //     ]),
            //     'cover' => $this->faker->randomElement([
            //         "public/teams_photos/barc.jpg",
            //         "public/teams_photos/mars.png",
            //         "public/teams_photos/paris.jpg",
            //         "public/teams_photos/paris_2.jpg"
            //     ])

            // ]);
            //to do soon
            // AskGame::factory(1)->create([
            //     "who_is_asking" => "jbull635@gmail.com",
            //     "who_was_asked" => "Jamal@gmail.com",
            //     'date_of_game' => $this->faker->dateTimeBetween("2023-01-01 16:30:18", "2023-02-02 16:30:18"),
            //     "hours_of_game" => "19h30",
            //     "place_of_game" => $this->faker->city(),
            //     "team_of_asker" => "Real Team",
            //     "team_of_who_was_asked" => "Jamal Foot",
            //     "status" => "finish"
            // ]);
            // Users_Profile_Photo, FollowingSystem public/profils_photos/profil_main.jpeg
        });
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
