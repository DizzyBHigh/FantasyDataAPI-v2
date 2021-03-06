<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */
namespace FantasyDataAPI;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Command\Guzzle\GuzzleClient;
use GuzzleHttp\Command\Guzzle\Description;
use InvalidArgumentException;
use FantasyDataAPI\Enum;
use GuzzleHttp\Command;

/**
 * Web service client for FantasyDataAPI
 *
 * @method Command\Model AreAnyGamesInProgress() AreAnyGamesInProgress( array $pOptions )
 * @method Command\Model CurrentSeason() CurrentSeason( array $pOptions )
 * @method Command\Model LastCompletedSeason() LastCompletedSeason( array $pOptions )
 * @method Command\Model UpcomingSeason() UpcomingSeason ( array $pOptions )
 * @method Command\Model Teams() Teams( array $pOptions )
 * @method Command\Model Schedules() Schedules( array $pOptions )
 * @method Command\Model Byes() Byes( array $pOptions )
 * @method Command\Model LastCompletedWeek() LastCompletedWeek( array $pOptions )
 * @method Command\Model CurrentWeek() CurrentWeek( array $pOptions )
 * @method Command\Model UpcomingWeek() UpcomingWeek( array $pOptions )
 * @method Command\Model Scores() Scores( array $pOptions )
 * @method Command\Model ScoresByWeek() ScoresByWeek( array $pOptions )
 * @method Command\Model TeamGameStats() TeamGameStats( array $pOptions )
 * @method Command\Model TeamSeasonStats() TeamSeasonStats( array $pOptions )
 * @method Command\Model Standings() Standings( array $pOptions )
 * @method Command\Model FreeAgents() FreeAgents( array $pOptions )
 * @method Command\Model SeasonLeagueLeaders() SeasonLeagueLeaders( array $pOptions )
 * @method Command\Model GameLeagueLeadersByWeek() GameLeagueLeadersByWeek( array $pOptions )
 * @method Command\Model FantasyDefenseByGame() FantasyDefenseByGame( array $pOptions )
 * @method Command\Model FantasyDefenseBySeason() FantasyDefenseBySeason( array $pOptions )
 * @method Command\Model FantasyDefenseProjectionsByGame() FantasyDefenseProjectionsByGame( array $pOptions )
 * @method Command\Model FantasyDefenseProjectionsBySeason() FantasyDefenseProjectionsBySeason( array $pOptions )
 * @method Command\Model Injuries() Injuries( array $pOptions )
 * @method Command\Model News() News( array $pOptions )
 * @method Command\Model NewsByPlayerID() NewsByPlayerID( array $pOptions )
 * @method Command\Model NewsByTeam() NewsByTeam( array $pOptions )
 * @method Command\Model LiveBoxScores() LiveBoxScores( array $pOptions )
 * @method Command\Model GameStats() GameStats( array $pOptions )
 * @method Command\Model GameStatsByWeek() GameStatsByWeek( array $pOptions )
 * @method Command\Model Timeframes() Timeframes( array $pOptions )
 * @method Command\Model BoxScore() BoxScore( array $pOptions )
 * @method Command\Model FinalBoxScores() FinalBoxScores( array $pOptions )
 * @method Command\Model ActiveBoxScores() ActiveBoxScores( array $pOptions )
 * @method Command\Model BoxScoresDelta() BoxScoresDelta( array $pOptions )
 * @method Command\Model BoxScores() BoxScores( array $pOptions )
 * @method Command\Model RecentlyUpdatedBoxScores() RecentlyUpdatedBoxScores( array $pOptions )
 * @method Command\Model Stadiums() Stadiums( array $pOptions )
 * @method Command\Model Players() Players( array $pOptions )
 * @method Command\Model PlayersByTeam() PlayersByTeam( array $pOptions )
 * @method Command\Model Player() Player( array $pOptions )
 * @method Command\Model PlayerSeasonStats() PlayerSeasonStats( array $pOptions )
 * @method Command\Model PlayerSeasonStatsByTeam() PlayerSeasonStatsByTeam( array $pOptions )
 * @method Command\Model PlayerSeasonStatsByPlayerID() PlayerSeasonStatsByPlayerID( array $pOptions )
 * @method Command\Model PlayerSeasonProjectionStats() PlayerSeasonProjectionStats( array $pOptions )
 * @method Command\Model PlayerSeasonProjectionStatsByTeam() PlayerSeasonProjectionStatsByTeam( array $pOptions )
 * @method Command\Model PlayerSeasonProjectionStatsByPlayerID() PlayerSeasonProjectionStatsByPlayerID( array $pOptions )
 * @method Command\Model PlayerGameStatsByWeek() PlayerGameStatsByWeek( array $pOptions )
 * @method Command\Model PlayerGameStatsByTeam() PlayerGameStatsByTeam( array $pOptions )
 * @method Command\Model PlayerGameStatsByPlayerID() PlayerGameStatsByPlayerID( array $pOptions )
 * @method Command\Model PlayerGameProjectionStatsByTeam() PlayerGameProjectionStatsByTeam( array $pOptions )
 * @method Command\Model PlayerGameProjectionStatsByWeek() PlayerGameProjectionStatsByWeek( array $pOptions )
 * @method Command\Model PlayerGameProjectionStatsByPlayerID() PlayerGameProjectionStatsByPlayerID( array $pOptions )
 * @method Command\Model FantasyPlayersByADP() FantasyPlayersByADP( array $pOptions )
 * @method Command\Model DailyFantasyPlayers() DailyFantasyPlayers( array $pOptions )
 */

class Client extends GuzzleClient
{
    /**
     * @param string $pApiKey
     *
     * @throws InvalidArgumentException
     */
    public function __construct($pApiKey)
    {
        if ( empty( $pApiKey ) )
        {
            throw new InvalidArgumentException("API key must not be empty.");
        }

        $service_config = require 'Resources/fantasy_data_api.php';
        $description = new Description($service_config);

        $client = $this->CreateHttpClient();

        parent::__construct($client, $description);

        $client->setDefaultOption('headers', array('Ocp-Apim-Subscription-Key' => $pApiKey));
    }

    /**
     * @param array $pOptions
     *
     * @return HttpClient
     */
    protected function CreateHttpClient($pOptions=[])
    {
        return new HttpClient($pOptions);
    }
}