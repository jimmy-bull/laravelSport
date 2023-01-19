<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AskGame;
use Carbon\Carbon;

class SqlRAws extends Controller
{
    //TO GET RANGE OF EACH TEAM DEPENDING ON THE SEASON , 
    public static function getTeamRange($team, $sport_name)
    {
        // $startDate  = Carbon::createFromDate($years, $firstBetween)->format('Y-m');
        // $endDate  = Carbon::createFromDate($years, $secondBetween)->format('Y-m');
        // if ($firstBetween == 11) {
        //     $endDate  = Carbon::createFromDate($years + 1, $secondBetween)->format('Y-m');

        // $years,  $firstBetween, $secondBetween
        // }

        return  DB::select(DB::raw("SELECT * FROM (SELECT
        winner_team as team,
        RANK() OVER(
            ORDER BY
                (table2.winnings_count - table1.defeats_count) DESC
        ) AS ranking,
        (table2.winnings_count - table1.defeats_count) as difference
    FROM
        (
            SELECT
                looser_team,
                COUNT(game_id) as defeats_count
            FROM
                defeats
                
                INNER JOIN teams ON defeats.looser_team = teams.team_name
                WHERE teams.sport_name = '{$sport_name}'
            GROUP BY
                looser_team
        ) as table1
        INNER JOIN (
            SELECT
                winner_team,
                COUNT(game_id) as winnings_count
            FROM
                winnings
                INNER JOIN teams ON winnings.winner_team = teams.team_name
                WHERE teams.sport_name = '{$sport_name}'
            GROUP BY
                winner_team
        ) as table2 

        ON table1.looser_team = table2.winner_team 
    ORDER BY
        (table2.winnings_count - table1.defeats_count) DESC) as bigTAble  WHERE team='{$team}'"));
    }
    //  
    public static function palmares_fuction($team, $years, $page, $firstBetween, $secondBetween)
    {
        $startDate  = Carbon::createFromDate($years, $firstBetween)->format('Y-m');
        $endDate  = Carbon::createFromDate($years, $secondBetween)->format('Y-m');
        if ($firstBetween >= 11) {
            $startDate  = Carbon::createFromDate($years - 1, $firstBetween)->format('Y-m');
            $endDate  = Carbon::createFromDate($years, $secondBetween)->format('Y-m');
        }

        $team_of_asker = AskGame::leftJoin('teams', "ask_games.team_of_asker", '=', "teams.team_name")
            ->where('ask_games.team_of_asker', '=',  $team)
            ->where('ask_games.status', "=", 'finish')
            ->whereBetween("date_of_game", [$startDate, $endDate])
            ->leftJoin('winnings', "ask_games.id", '=', "winnings.game_id")
            ->leftJoin('defeats', "ask_games.id", '=', "defeats.game_id")
            ->leftJoin('draws', "ask_games.id", '=', "draws.game_id")
            ->select([
                'winnings.score as winningsScore', "defeats.score as defeatsScore", "draws.score as drawsScore",
                "ask_games.id", "ask_games.place_of_game", 'ask_games.hours_of_game',
                "ask_games.date_of_game", "winnings.winner_team", "winnings.winner_team", "defeats.looser_team",  'ask_games.status', "teams.sport_name"
            ])
            ->get()->unique()->skip($page)->take(10);

        return  $team_of_asker;
        // [en fonction des saison: hiver ete printemp  de chaque année
        // nombre de match jouer, [nombre de victoire, nombre de defaites, nombre de match null]
        // la liste des match]
        //Année
        // hiver | printemp | été === topbar in react native 

        // nombre de match jouer
        // 30 victore 2 defaite 16 match null ==== faire des cercle
        // acccordions des liste de match

        //printemps == 02 à 05 == est egale a 2 ou est inferieur a 5               [2,3,4] = printemps  = p
        //ete == 05-08 == est egale a 5 ou est inferieur a 8                       [5,6,7]  = ete = e
        //automne == 08-11 = est egale à 8 ou est inferieur a 11                   [8,9,10] = automne = a
        //hiver == 11-02 == est egale 11 ou est inferieur a 2 ou est egale a 12    [11,12,1] = hiver = h
    }
    public static function palmares_fuction_who_was_asked($team, $years, $page, $firstBetween, $secondBetween)
    {
        $startDate  = Carbon::createFromDate($years, $firstBetween)->format('Y-m');
        $endDate  = Carbon::createFromDate($years, $secondBetween)->format('Y-m');
        if ($firstBetween == 11) {
            $endDate  = Carbon::createFromDate($years + 1, $secondBetween)->format('Y-m');
        }
        return $who_was_asked = AskGame::leftJoin('teams', "ask_games.team_of_who_was_asked", '=', "teams.team_name")
            ->where('ask_games.team_of_who_was_asked', '=',  $team)
            ->where('ask_games.status', "=", 'finish')
            ->whereBetween("date_of_game",  [$startDate, $endDate])
            ->leftJoin('winnings', "ask_games.id", '=', "winnings.game_id")
            ->leftJoin('defeats', "ask_games.id", '=', "defeats.game_id")
            ->leftJoin('draws', "ask_games.id", '=', "draws.game_id")
            ->select([
                'winnings.score as winningsScore', "defeats.score as defeatsScore", "draws.score as drawsScore",
                "ask_games.id", "ask_games.place_of_game", 'ask_games.hours_of_game',
                "ask_games.date_of_game", "winnings.winner_team", "winnings.winner_team", "defeats.looser_team",  'ask_games.status', "teams.sport_name"
            ])
            ->get()->unique()->skip($page)->take(10);
        return $who_was_asked;
    }
}
