<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Big;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Team;
use App\Models\FollowingSystem;
use App\Models\NotificationToken;
use App\Models\Notification;
use App\Models\Teammember;
use App\Http\Controllers\SqlRAws;
use App\Models\phone;
use App\Models\PostTable;

class Interaction extends Controller
{
    public function checkme(Request $request)
    {
        $checkfirst =  User::where('remember_token', "=", $request->token)->count();
        if ($checkfirst > 0) {
            $getEmail =  User::where('remember_token', "=", $request->token)->value("email");
            return  $getEmail;
        } else {
            return 'not connected';
        }
    }
    public function searchFriends(Request $request)
    {

        // $users = phone::find(16161);
        // return $users->user->get();
        // return User::find(16161)->phone()->get();
          return (User::find(11160)->post()->get()->groupBy("post_id"));

      //  return (PostTable::find(20299)->user->name);

        /**
         * This code is a SQL query that performs the following operations on a table named "users":
         *SELECT: It selects all columns (*) from the "users" table.
         *ST_Distance_Sphere: It calculates the spherical distance between two geographical points: 
         * - the first point is specified by the coordinates (-0.330690059361, 49.2074415651), and the second point
         * - is stored in the "location" column of the "users" table. The calculated distance is given an alias name "distance".

         *HAVING: It filters the rows based on the condition "distance < 100 * 1000", meaning 
         * it only returns the rows where the calculated distance is less than 100 kilometers.
         * 
         *ORDER BY: It sorts the result set in ascending order based on the "distance" column.
         *LIMIT: It limits the number of returned rows to 5, meaning the query returns only the first 5 rows of the sorted result set.
         */





        //    return dd (DB::select(DB::raw("SELECT *, ST_Distance_Sphere(POINT(-0.330690059361, 49.2074415651), location) as distance
        //    FROM `users`
        //    HAVING distance < 100 * 1000
        //    ORDER BY distance limit 5")));



        $lat = $request->lat;
        $long = $request->long;

        $sport = [];
        $checkfirst =  User::where('remember_token', "=", $request->token)->count();

        if ($checkfirst > 0) {
            $sport__ = Team::where('email', "=",  User::where('remember_token', "=", $request->token)->value('email'))->select('sport_name')->get();
            foreach ($sport__ as $key => $value) {
                array_push($sport, $value->sport_name);
            }
        }
        $getEmail =  User::where('remember_token', "=", $request->token)->value("email");

        /**
         * FILTRE de base: sport, de la distance du lieu,
         * Sport: tout mes sport, ou sport specifique
         * lieu: du plus proche au plus eloigné ou distance précise au tour de mois;
        //   * Nombre de victoire,
        //  * rang dans la saison actuelle ou saison précise
         * par fairplay: du plus grand au plus pétit,
         * pareil pour ponctualité
         */
        /**
         * CREE DES UTILISATEUR QUI ON:  deux équipe, avec photo de profil,que je suis et qui me suive, avec 3 poste chacun
         */
        // GET USER NEAR ME THAT HAVE THE SAME TEAMS AS ME
        // filtre de base: sport: tout les sport; avec fairplay: c'est desc, pareil pour ponctualité; lieu: plus proche au plus loin;
        $firstSearch = User::leftJoin('users__profile__photos', 'users.email', '=', 'users__profile__photos.email')
            ->leftjoin('teams', 'users.email', '=', 'teams.email')
            ->whereIn("teams.sport_name", $sport)
            ->where("users.email", "!=",  $getEmail)
            ->select(['users.city',  "users__profile__photos.image", 'users.name', 'users.lastname', "users.email", "users.speudo"])
            ->orderBy(DB::raw("ST_Distance_Sphere(POINT(" . $long . "," . $lat . "), location)"))->get()->groupBy("city")->skip($request->page)->take(10);


        // GET USER NEAR ME THAT NOT HAVE THE SAME TEAMS AS ME; GET THIS ONLY WHEN THE FIRST RESULT IS NOT 10
        $secondSearch = User::leftJoin('users__profile__photos', 'users.email', '=', 'users__profile__photos.email')
            ->leftJoin('teams', 'users.email', '=', 'teams.email')
            ->where("users.email", "!=",  $getEmail)
            ->select(['users.city',  "users__profile__photos.image", 'users.name', 'users.lastname', "users.email", "users.speudo"])
            ->orderBy(DB::raw("ST_Distance_Sphere(POINT(" . $long . "," . $lat . "), location)"))->get()->groupBy("city")->skip($request->page)->take(10);

        if (count($firstSearch) == 10) {
            return  $firstSearch;
        } else {
            foreach ($secondSearch as $key => $value) {
                $firstSearch[$key] = $secondSearch[$key];
            }
        }
        $lastSend = [];
        foreach ($firstSearch as $key => $value) {
            array_push($lastSend, $firstSearch[$key][0]);
        }
        return  $lastSend;
    }
    public function searchFriendsNOlocation(Request $request)
    {
        $sport = [];
        $checkfirst =  User::where('remember_token', "=", $request->token)->count();

        if ($checkfirst > 0) {
            $sport__ = Team::where('email', "=",  User::where('remember_token', "=", $request->token)->value('email'))->select('sport_name')->get();
            foreach ($sport__ as $key => $value) {
                array_push($sport, $value->sport_name);
            }
        }
        $getEmail =  User::where('remember_token', "=", $request->token)->value("email");
        $first =  User::leftJoin('users__profile__photos', 'users.email', '=', 'users__profile__photos.email')
            ->leftJoin('teams', 'users.email', '=', 'teams.email')
            ->whereIn("teams.sport_name", $sport)
            ->where("users.email", "!=",  $getEmail)
            ->select(['users.city', "users__profile__photos.image", 'users.name',  "users.lastname", "users.email"])
            ->get()->groupBy("city")->skip($request->page)->take(10);

        $second =  User::leftJoin('users__profile__photos', 'users.email', '=', 'users__profile__photos.email')
            ->leftJoin('teams', 'users.email', '=', 'teams.email')
            // ->whereIn("teams.sport_name", $sport)
            ->where("users.email", "!=",  $getEmail)
            ->select(['users.city',  "users__profile__photos.image", 'users.name', 'users.lastname', "users.email"])
            ->get()->groupBy("city")->skip($request->page)->take(10);



        if (count($first) == 10) {
            return  $first;
        } else {
            foreach ($second as $key => $value) {
                $first[$key] = $second[$key];
            }
        }
        $lastSend = [];
        foreach ($first as $key => $value) {
            array_push($lastSend, $first[$key][0]);
        }
        return  $lastSend;
    }
    public function searchWithInputWithlocation(Request $request)
    {
        $lat = $request->lat;
        $long = $request->long;

        $sport = [];
        $checkfirst =  User::where('remember_token', "=", $request->token)->count();

        if ($checkfirst > 0) {
            $sport__ = Team::where('email', "=",  User::where('remember_token', "=", $request->token)->value('email'))->select('sport_name')->get();
            foreach ($sport__ as $key => $value) {
                array_push($sport, $value->sport_name);
            }
        }
        $getEmail =  User::where('remember_token', "=", $request->token)->value("email");
        $_OnUserSearch = User::leftJoin('users__profile__photos', 'users.email', '=', 'users__profile__photos.email')
            ->leftjoin('teams', 'users.email', '=', 'teams.email')
            ->where("name", "LIKE", "{$request->q}%")
            ->orWhere("users.lastname", "LIKE", "{$request->q}%")
            ->select(['users.city',  "users__profile__photos.image", 'users.name',  'lastname', "users.email"])
            ->orderBy(DB::raw(SqlRAws::distance($lat, $long)))->get()->groupBy("city")->skip($request->page)->take(10);
        $lastSend = [];
        foreach ($_OnUserSearch as $key => $value) {
            array_push($lastSend, $_OnUserSearch[$key][0]);
        }
        return  $lastSend;
    }
    public function searchWithInputWithNolocation(Request $request)
    {
        $sport = [];
        $checkfirst =  User::where('remember_token', "=", $request->token)->count();

        if ($checkfirst > 0) {
            $sport__ = Team::where('email', "=",  User::where('remember_token', "=", $request->token)->value('email'))->select('sport_name')->get();
            foreach ($sport__ as $key => $value) {
                array_push($sport, $value->sport_name);
            }
        }
        $getEmail =  User::where('remember_token', "=", $request->token)->value("email");

        $_OnUserSearch = User::leftJoin('users__profile__photos', 'users.email', '=', 'users__profile__photos.email')
            ->leftjoin('teams', 'users.email', '=', 'teams.email')
            ->where("name", "LIKE", "{$request->q}%")
            ->orWhere("users.lastname", "LIKE", "{$request->q}%")
            ->where("users.email", "!=",  $getEmail)
            ->select(['users.city',  "users__profile__photos.image", 'users.name',  'lastname', 'users.email'])
            ->groupBy("city")->skip($request->page)->take(10);
        $lastSend = [];
        foreach ($_OnUserSearch as $key => $value) {
            array_push($lastSend, $_OnUserSearch[$key][0]);
        }
        return  $lastSend;
    }

    public function searchTeams(Request $request)
    {
        $lat = $request->lat;
        $long = $request->long;
        $sport = [];
        $checkfirst =  User::where('remember_token', "=", $request->token)->count();
        if ($checkfirst > 0) {
            $sport__ = Team::where('email', "=",  User::where('remember_token', "=", $request->token)->value('email'))->select('sport_name')->get();
            foreach ($sport__ as $key => $value) {
                array_push($sport, $value->sport_name);
            }
        }
        $firstSearch = User::leftjoin('teams', 'users.email', '=', 'teams.email')
            ->where("users.email", '!=',  User::where('remember_token', "=", $request->token)->value('email'))
            ->where("teams.sport_name", '!=',  null)
            ->select(['teams.logo',   'teams.team_name', "teams.sport_name", "teams.id", 'teams.cover', "teams.city", 'teams.email'])
            ->orderBy(DB::raw(SqlRAws::distance($lat, $long)))->get()->skip($request->page)->take(11);
        return    $firstSearch;
    }
    public function searchTeams_nolocation(Request $request)
    {
    }

    public function followingSystem_insert(Request $request)
    {
        $checkfirst =  User::where('remember_token', "=", $request->token)->count();
        if ($checkfirst > 0) {

            $mail =  User::where('remember_token', "=", $request->token)->value('email');

            $check = FollowingSystem::where('thefollower', "=", $mail)->where('thefollowed', "=", $request->email)->count();

            if ($check == 1) {
                $checkSub =  FollowingSystem::where('thefollower', "=", $mail)->where('thefollowed', "=", $request->email)->value("thefollowingState");
                if ($checkSub == "isfollowing") {
                    FollowingSystem::where('thefollower', "=", $mail)->where('thefollowed', "=", $request->email)
                        ->update(['thefollowingState' => "isunfollowed"]);
                    return "isunfollowed";
                } else {
                    FollowingSystem::where('thefollower', "=", $mail)->where('thefollowed', "=", $request->email)
                        ->update(['thefollowingState' => "isfollowing"]);
                    return "isfollowing";
                }
            } else if ($check == 0) {
                $followingSystem =  new FollowingSystem();
                $followingSystem->thefollower = $mail;
                $followingSystem->thefollowed = $request->email;
                $followingSystem->thefollowingState = "isfollowing";
                $followingSystem->save();
                return "isfollowing";
            }
        }
    }



    public function followingSystem_check(Request $request) // CHECK IF I'M ALREADY FOLLWING OR NOT A CURRENT USER
    {
        $mail =  User::where('remember_token', "=", $request->token)->value('email');
        $checkSub =  FollowingSystem::where('thefollower', "=", $mail)->where('thefollowed', "=", $request->email)->value("thefollowingState");
        if ($checkSub == "isfollowing") {
            return 'isfollowing';
        } else {
            return 'isunfollowed';
        }
    }

    public function followingSystem_check_2(Request $request)  // CHECK IF A CURRENT USER IS ALREADY FOLLWING ME OR NOT
    {
        $mail =  User::where('remember_token', "=", $request->token)->value('email');
        $checkSub =  FollowingSystem::where('thefollower', "=",  $request->email)->where('thefollowed', "=", $mail)->value("thefollowingState");
        if ($checkSub == "isfollowing") {
            return 'isfollowing_2';
        } else {
            return 'isunfollowed';
        }
    }
    public function adnotif(Request $request)
    {
        $mail =  User::where('remember_token', "=", $request->token)->value('email');
        $checkfirst =  User::where('remember_token', "=", $request->token)->count();
        $checkifNotifExist  = NotificationToken::where('token', "=", $request->notifToken)->count();
        if ($checkfirst > 0) {
            if ($checkifNotifExist > 0) {
                NotificationToken::where('token', "=", $request->notifToken)->update(["email" => $mail]);
            }
            $check_exist = NotificationToken::where('email', "=", $mail)->where('token', "=", $request->notifToken)->count();
            if ($check_exist == 0) {
                $notif = new NotificationToken();
                $notif->email =  $mail;
                $notif->token =  $request->notifToken;
                $notif->save();
                return "added";
            }
        }
    }
    public function getNotifTokens(Request $request)
    {
        $checkfirst =  User::where('remember_token', "=", $request->token)->count();

        if ($checkfirst > 0) {
            return NotificationToken::where('email', "=", $request->email)->get();
        }
    }
    public function addRealtimeNotif(Request $request)
    { // return $request->message;
        // Notification 0-10 $request->page
        // return $request->who;
        // $checkfirst =  User::where('remember_token', "=", $request->token)->count();
        // if ($checkfirst > 0) {
        $realtimeNotif = new Notification();
        $realtimeNotif->message = trim($request->message);
        $realtimeNotif->notification_actions = trim($request->notification_actions);
        $realtimeNotif->email = trim($request->who);
        $realtimeNotif->who_sent_notification = trim($request->who_sent);
        $realtimeNotif->state = "unreaded"; // 
        $realtimeNotif->save();

        if (trim($request->notification_actions) == "integration_actions") {
            //  UPDATE teammembers with notifications_id depending on 
            Teammember::where('id', "=",  $request->teammembers_id)->update(['notifications_id' => $realtimeNotif->id]);
            return [$realtimeNotif->id,  Notification::where('email', "=", $request->who)
                ->where('state', '=', "unreaded")
                ->orderBy("id", 'desc')->count()];
        } else {
            return  Notification::where('email', "=", $request->who)
                ->where('state', '=', "unreaded")
                ->orderBy("id", 'desc')->count();
        }
        //   ->skip(0)->take(10)

        // }  integration_actions 

        // return 'not connected';
    }
    public function getRealtimeNotif(Request $request)
    {
        //0-10 $request->page
        $checkfirst =  User::where('remember_token', "=", $request->token)->count();
        if ($checkfirst > 0) {
            $mail =  User::where('remember_token', "=", $request->token)->value('email');
            return  Notification::Leftjoin("users__profile__photos", "notifications.who_sent_notification", "=", "users__profile__photos.email")
                ->Leftjoin("users", "notifications.who_sent_notification", "=", "users.email")
                ->where('notifications.email', "=", $mail)
                ->skip($request->page)->take(10)->select(
                    'users__profile__photos.image',
                    "users.name",
                    "users.lastname",
                    "notifications.message",
                    "notifications.created_at",
                    "notifications.notification_actions",
                    "users.email"
                )->orderBy("notifications.id", 'desc')->get();
        }
        return 'not connected';
    }
    public function getRealtimeNotif_count(Request $request)
    {
        $checkfirst =  User::where('remember_token', "=", $request->token)->count();
        if ($checkfirst > 0) {
            return  Notification::where('email', "=",  User::where('remember_token', "=", $request->token)->value('email'))
                ->where('state', '=', "unreaded")
                ->orderBy("id", 'desc')->count();
        }
        return 'not connected';
    }
    public function getCurrentUsermail(Request $request)
    {
        return  User::where('remember_token', "=", $request->token)->value('email');
    }

    public function markNotifasreaded(Request $request)
    {
        $checkfirst =  User::where('remember_token', "=", $request->token)->count();
        if ($checkfirst > 0) {
            $mail =  User::where('remember_token', "=", $request->token)->value('email');
            Notification::where('email', "=", $mail)->update(['state' => "readed"]);
            return  Notification::where('email', "=",  User::where('remember_token', "=", $request->token)->value('email'))
                ->where('state', '=', "unreaded")
                ->orderBy("id", 'desc')->count();
        }
        return 'not connected';
    }
}

 // wherei['foot',"tennis']; 
  /*---------------------------------------------------------------*/
        /*
    Titre : Calcul la distance entre 2 points en km                                                                       
                                                                                                                          
    URL   : https://phpsources.net/code_s.php?id=1091
    Auteur           : sheppy1                                                                                            
    Website auteur   : https://lejournalabrasif.fr/qwanturank-concours-seo-qwant/                                         
    Date édition     : 05 Aout 2019                                                                                       
    Date mise à jour : 16 Aout 2019                                                                                      
    Rapport de la maj:                                                                                                    
    - fonctionnement du code vérifié                                                                                    
*/
        /*---------------------------------------------------------------*/

// function distance($lat1, $lng1, $lat2, $lng2, $miles = false)
// {
//     $pi80 = M_PI / 180;
//     $lat1 *= $pi80;
//     $lng1 *= $pi80;
//     $lat2 *= $pi80;
//     $lng2 *= $pi80;

//     $r = 6372.797; // rayon moyen de la Terre en km
//     $dlat = $lat2 - $lat1;
//     $dlng = $lng2 - $lng1;

//     $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlng / 2) * sin($dlng / 2);
//     // return $a;
//     $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
//     $km = $r * $c;

//     return ($miles ? ($km * 0.621371192) : $km);
// }
//echo  distance(45.7698747385, 4.82857516905, 49.1850251668, -0.370004009634) . ' CAEN LYON <br/><br/>';

// echo  distance(45.7698747385, 4.82857516905, 49.2074415651, -0.330690059361) . ' lyon herou <br/><br/>';

// echo  distance(45.7698747385, 3.0429756448, 48.862834158, 2.33616696102) . ' PARIS lyon <br/><br/>';