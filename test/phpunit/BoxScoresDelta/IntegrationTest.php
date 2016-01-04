<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Test\BoxScoresDelta;

use PHPUnit_Framework_TestCase;
use FantasyDataAPI\Test\DebugClient;

use FantasyDataAPI\Enum\BoxScore;
use FantasyDataAPI\Enum\ScoringDetails;
use FantasyDataAPI\Enum\Stadium;
use FantasyDataAPI\Enum\GameStatsByWeek;
use FantasyDataAPI\Enum\Score;

class IntegrationTest extends PHPUnit_Framework_TestCase
{
    /**
     * Given: A developer API key
     * When: API is queried for 2013REG, Week 17 BoxScores
     * Then: Expect a 200 response with an array entries that contains the BoxScores details
     *
     * @group Ug
     * @medium
     */
    public function testSuccessfulResponse()
    {
        $client = new DebugClient($_SERVER['FANTASY_DATA_API_KEY']);

        /** @var \GuzzleHttp\Command\Model $result */
        $result = $client->BoxScoresDelta(['Season' => '2013REG', 'Week' => '17', "Minutes" =>'60']);

        $response = $client->mHistory->getLastResponse();

        $this->assertEquals('200', $response->getStatusCode());

        $check_box_score = function ( $pStats )
        {
            /** we expect 20 keys */
            $this->assertCount( 20, $pStats );

            $cloned_array = $pStats;

            /** this function helps us assure that we're not missing any keys in the Enum list */
            $process_key = function ( $pKey ) use ( $pStats, &$cloned_array )
            {
                $this->assertArrayHasKey( $pKey, $pStats );
                unset( $cloned_array[$pKey] );
            };

            /** test all the keys */
            $process_key( BoxScore\Property::KEY_AWAY_DEFENSE );
            $process_key( BoxScore\Property::KEY_AWAY_FANTASY_DEFENSE );
            $process_key( BoxScore\Property::KEY_AWAY_KICK_PUNT_RETURNS );
            $process_key( BoxScore\Property::KEY_AWAY_KICKING );
            $process_key( BoxScore\Property::KEY_AWAY_PUNTING );
            $process_key( BoxScore\Property::KEY_AWAY_PUNTING );
            $process_key( BoxScore\Property::KEY_AWAY_RECEIVING );
            $process_key( BoxScore\Property::KEY_AWAY_RUSHING );
            $process_key( BoxScore\Property::KEY_GAME );
            $process_key( BoxScore\Property::KEY_AWAY_DEFENSE );
            $process_key( BoxScore\Property::KEY_AWAY_FANTASY_DEFENSE );
            $process_key( BoxScore\Property::KEY_AWAY_KICK_PUNT_RETURNS );
            $process_key( BoxScore\Property::KEY_AWAY_KICKING );
            $process_key( BoxScore\Property::KEY_AWAY_PUNTING );
            $process_key( BoxScore\Property::KEY_AWAY_PUNTING );
            $process_key( BoxScore\Property::KEY_AWAY_RECEIVING );
            $process_key( BoxScore\Property::KEY_AWAY_RUSHING );
            $process_key( BoxScore\Property::KEY_SCORE );
            $process_key( BoxScore\Property::KEY_SCORING_DETAILS );
            $process_key( BoxScore\Property::KEY_SCORING_PLAYS );

            /** process data in AWAY_DEFENCE  */
            if ( false == empty( $pStats[BoxScore\Property::KEY_AWAY_DEFENSE]) )
            {
                /** loop through AwayDefence Array and check keys */
                foreach($pStats[BoxScore\Property::KEY_AWAY_DEFENSE] as $currentDefence){

                    $cloned_currentDefence = $currentDefence;

                    /** we expect 25 keys in currentDefence*/
                    $this->assertCount( 25, $currentDefence );

                    $process_defence_details = function ( $pCurrentFantasyDefenceKey ) use ( &$cloned_currentDefence )
                    {
                        $this->assertArrayHasKey( $pCurrentFantasyDefenceKey, $cloned_currentDefence );
                        unset( $cloned_currentDefence[$pCurrentFantasyDefenceKey] );
                    };

                    $process_defence_details( BoxScore\Defence\Property::KEY_PLAYER_GAME_ID );
                    $process_defence_details( BoxScore\Defence\Property::KEY_PLAYER_ID );
                    $process_defence_details( BoxScore\Defence\Property::KEY_SHORT_NAME );
                    $process_defence_details( BoxScore\Defence\Property::KEY_NAME );
                    $process_defence_details( BoxScore\Defence\Property::KEY_TEAM );
                    $process_defence_details( BoxScore\Defence\Property::KEY_NUMBER );
                    $process_defence_details( BoxScore\Defence\Property::KEY_POSITION );
                    $process_defence_details( BoxScore\Defence\Property::KEY_POSITION_CATEGORY );
                    $process_defence_details( BoxScore\Defence\Property::KEY_FANTASY_POSITION );
                    $process_defence_details( BoxScore\Defence\Property::KEY_FANTASY_POINTS );
                    $process_defence_details( BoxScore\Defence\Property::KEY_UPDATED );
                    $process_defence_details( BoxScore\Defence\Property::KEY_ASSISTED_TACKLES );
                    $process_defence_details( BoxScore\Defence\Property::KEY_FUMBLE_RETURN_TOUCHDOWNS );
                    $process_defence_details( BoxScore\Defence\Property::KEY_FUMBLES_FORCED );
                    $process_defence_details( BoxScore\Defence\Property::KEY_FUMBLES_RECOVERED );
                    $process_defence_details( BoxScore\Defence\Property::KEY_INTERCEPTION_RETURN_TOUCHDOWNS );
                    $process_defence_details( BoxScore\Defence\Property::KEY_INTERCEPTION_RETURN_YARDS );
                    $process_defence_details( BoxScore\Defence\Property::KEY_INTERCEPTIONS );
                    $process_defence_details( BoxScore\Defence\Property::KEY_PASSES_DEFENDED );
                    $process_defence_details( BoxScore\Defence\Property::KEY_QUARTERBACK_HITS );
                    $process_defence_details( BoxScore\Defence\Property::KEY_SACK_YARDS );
                    $process_defence_details( BoxScore\Defence\Property::KEY_SACKS );
                    $process_defence_details( BoxScore\Defence\Property::KEY_SOLO_TACKLES );
                    $process_defence_details( BoxScore\Defence\Property::KEY_TACKLES );
                    $process_defence_details( BoxScore\Defence\Property::KEY_TACKLES_FOR_LOSS );

                    $this->assertEmpty( $cloned_currentDefence );
                }

            }

            /** process data in HOME_DEFENCE  */
            if ( false == empty( $pStats[BoxScore\Property::KEY_HOME_DEFENSE]) )
            {
                /** loop through AwayDefence Array and check keys */
                foreach($pStats[BoxScore\Property::KEY_HOME_DEFENSE] as $currentDefence){

                    $cloned_currentDefence = $currentDefence;

                    /** we expect 25 keys in currentDefence*/
                    $this->assertCount( 25, $currentDefence );

                    $process_defence_details = function ( $pCurrentFantasyDefenceKey ) use ( &$cloned_currentDefence )
                    {
                        $this->assertArrayHasKey( $pCurrentFantasyDefenceKey, $cloned_currentDefence );
                        unset( $cloned_currentDefence[$pCurrentFantasyDefenceKey] );
                    };

                    $process_defence_details( BoxScore\Defence\Property::KEY_PLAYER_GAME_ID );
                    $process_defence_details( BoxScore\Defence\Property::KEY_PLAYER_ID );
                    $process_defence_details( BoxScore\Defence\Property::KEY_SHORT_NAME );
                    $process_defence_details( BoxScore\Defence\Property::KEY_NAME );
                    $process_defence_details( BoxScore\Defence\Property::KEY_TEAM );
                    $process_defence_details( BoxScore\Defence\Property::KEY_NUMBER );
                    $process_defence_details( BoxScore\Defence\Property::KEY_POSITION );
                    $process_defence_details( BoxScore\Defence\Property::KEY_POSITION_CATEGORY );
                    $process_defence_details( BoxScore\Defence\Property::KEY_FANTASY_POSITION );
                    $process_defence_details( BoxScore\Defence\Property::KEY_FANTASY_POINTS );
                    $process_defence_details( BoxScore\Defence\Property::KEY_UPDATED );
                    $process_defence_details( BoxScore\Defence\Property::KEY_ASSISTED_TACKLES );
                    $process_defence_details( BoxScore\Defence\Property::KEY_FUMBLE_RETURN_TOUCHDOWNS );
                    $process_defence_details( BoxScore\Defence\Property::KEY_FUMBLES_FORCED );
                    $process_defence_details( BoxScore\Defence\Property::KEY_FUMBLES_RECOVERED );
                    $process_defence_details( BoxScore\Defence\Property::KEY_INTERCEPTION_RETURN_TOUCHDOWNS );
                    $process_defence_details( BoxScore\Defence\Property::KEY_INTERCEPTION_RETURN_YARDS );
                    $process_defence_details( BoxScore\Defence\Property::KEY_INTERCEPTIONS );
                    $process_defence_details( BoxScore\Defence\Property::KEY_PASSES_DEFENDED );
                    $process_defence_details( BoxScore\Defence\Property::KEY_QUARTERBACK_HITS );
                    $process_defence_details( BoxScore\Defence\Property::KEY_SACK_YARDS );
                    $process_defence_details( BoxScore\Defence\Property::KEY_SACKS );
                    $process_defence_details( BoxScore\Defence\Property::KEY_SOLO_TACKLES );
                    $process_defence_details( BoxScore\Defence\Property::KEY_TACKLES );
                    $process_defence_details( BoxScore\Defence\Property::KEY_TACKLES_FOR_LOSS );

                    $this->assertEmpty( $cloned_currentDefence );
                }

            }

            /** process data in AWAY_FANTASY_DEFENCE  */
            if ( false == empty( $pStats[BoxScore\Property::KEY_AWAY_FANTASY_DEFENSE]) )
            {
                /** Get The FantasyDefence Array */
                $awayFantasyDefence = $pStats[BoxScore\Property::KEY_AWAY_FANTASY_DEFENSE];

                /** we expect 67 keys in the array*/
                $this->assertCount( 67, $awayFantasyDefence );

                /** Process the ScoringDetails */
                if ( false == empty( $pStats[BoxScore\FantasyDefence\Property::KEY_SCORING_DETAILS]) )
                {
                    foreach($pStats[BoxScore\FantasyDefence\Property::KEY_SCORING_DETAILS] as $currentScoringDetail){
                        $cloned_currentScoringDetail = $currentScoringDetail;

                        /** we expect 10 keys in currentScoringDetail*/
                        $this->assertCount( 10, $currentScoringDetail );

                        $process_scoring_details = function ( $pCurrentScoreKey ) use ( &$cloned_currentScoringDetail )
                        {
                            $this->assertArrayHasKey( $pCurrentScoreKey, $cloned_currentScoringDetail );
                            unset( $cloned_currentScoringDetail[$pCurrentScoreKey] );
                        };

                        $process_scoring_details( ScoringDetails\Property::KEY_GAME_KEY );
                        $process_scoring_details( ScoringDetails\Property::KEY_LENGTH );
                        $process_scoring_details( ScoringDetails\Property::KEY_PLAYER_GAME_ID );
                        $process_scoring_details( ScoringDetails\Property::KEY_PLAYER_ID );
                        $process_scoring_details( ScoringDetails\Property::KEY_SCORING_DETAIL_ID );
                        $process_scoring_details( ScoringDetails\Property::KEY_SCORING_TYPE );
                        $process_scoring_details( ScoringDetails\Property::KEY_SEASON );
                        $process_scoring_details( ScoringDetails\Property::KEY_SEASON_TYPE );
                        $process_scoring_details( ScoringDetails\Property::KEY_TEAM );
                        $process_scoring_details( ScoringDetails\Property::KEY_WEEK );

                        $this->assertEmpty( $cloned_currentScoringDetail );

                    }

                }

                /** clone the fantasyDefence array */
                $cloned_currentFantasyDefence = $awayFantasyDefence;

                $process_fantasy_defence_details = function ( $pCurrentFantasyDefenceKey ) use ( &$cloned_currentFantasyDefence )
                {
                    $this->assertArrayHasKey( $pCurrentFantasyDefenceKey, $cloned_currentFantasyDefence );
                    unset( $cloned_currentFantasyDefence[$pCurrentFantasyDefenceKey] );
                };

                //remove the Keys
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_SCORING_DETAILS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_GAME_KEY);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_SEASON_TYPE);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_SEASON);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_WEEK);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_DATE);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_TEAM);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_OPPONENT);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_POINTS_ALLOWED);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_TOUCHDOWNS_SCORED);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_SOLO_TACKLES);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_ASSISTED_TACKLES);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_SACKS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_SACK_YARDS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_PASSES_DEFENDED);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_FUMBLES_FORCED);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_FUMBLES_RECOVERED);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_FUMBLES_RETURN_YARDS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_FUMBLE_RETURN_TOUCHDOWNS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_INTERCEPTIONS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_INTERCEPTION_RETURN_YARDS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_INTERCEPTION_RETURN_TOUCHDOWNS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_BLOCKED_KICKS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_SAFETIES);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_PUNT_RETURNS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_PUNT_RETURN_YARDS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_PUNT_RETURN_TOUCHDOWNS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_PUNT_RETURN_LONG);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_KICK_RETURNS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_KICK_RETURN_YARDS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_KICK_RETURN_TOUCHDOWNS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_KICK_RETURN_LONG);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_BLOCKED_KICK_RETURN_TOUCHDOWNS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_FIELD_GOAL_RETURN_TOUCHDOWNS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_FANTASY_POINTS_ALLOWED);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_QUARTERBACK_FANTASY_POINTS_ALLOWED);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_RUNNINGBACK_FANTASY_POINTS_ALLOWED);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_WIDE_RECEIVER_FANTASY_POINTS_ALLOWED_);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_TIGHT_END_FANTASY_POINTS_ALLOWED);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_KICKER_FANTASY_POINTS_ALLOWED);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_BLOCKED_KICK_RETURN_YARDS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_FIELD_GOAL_RETURN_YARDS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_QUARTERBACK_HITS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_TACKLES_FOR_LOSS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_DEFENSIVE_TOUCHDOWNS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_SPECIAL_TEAMS_TOUCHDOWNS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_IS_GAME_OVER);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_FANTASY_POINTS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_STADIUM);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_TEMPERATURE);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_HUMIDITY);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_WIND_SPEED);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_THIRD_DOWN_ATTEMPTS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_THIRD_DOWN_CONVERSIONS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_FOURTH_DOWN_ATTEMPTS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_FOURTH_DOWN_CONVERSIONS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_POINTS_ALLOWED_BY_DEFENSE_SPECIAL_TEAMS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_FAN_DUEL_SALARY);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_DRAFT_KINGS_SALARY);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_FANTASY_DATA_SALARY);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_VICTIV_SALARY);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_TWO_POINT_CONVERSION_RETURNS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_FANTASY_POINTS_FAN_DUEL);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_FANTASY_POINTS_DRAFT_KINGS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_OFFENSIVE_YARDS_ALLOWED);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_YAHOO_SALARY);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_PLAYER_ID);

               //var_dump($cloned_currentFantasyDefence);die();
                $this->assertEmpty( $cloned_currentFantasyDefence );
            }

            /** process data in HOME_FANTASY_DEFENCE  */
            if ( false == empty( $pStats[BoxScore\Property::KEY_HOME_FANTASY_DEFENSE]) )
            {
                /** Get The FantasyDefence Array */
                $homeFantasyDefence = $pStats[BoxScore\Property::KEY_HOME_FANTASY_DEFENSE];

                /** we expect 67 keys in the array*/
                $this->assertCount( 67, $homeFantasyDefence );

                /** clone the array */
                $cloned_currentFantasyDefence = $homeFantasyDefence;

                /** Process the ScoringDetails */
                if ( false == empty( $pStats[BoxScore\FantasyDefence\Property::KEY_SCORING_DETAILS]) )
                {
                    foreach($pStats[BoxScore\FantasyDefence\Property::KEY_SCORING_DETAILS] as $currentScoringDetail){
                        $cloned_currentScoringDetail = $currentScoringDetail;

                        /** we expect 10 keys in currentScoringDetail*/
                        $this->assertCount( 10, $currentScoringDetail );

                        $process_scoring_details = function ( $pCurrentScoreKey ) use ( &$cloned_currentScoringDetail )
                        {
                            $this->assertArrayHasKey( $pCurrentScoreKey, $cloned_currentScoringDetail );
                            unset( $cloned_currentScoringDetail[$pCurrentScoreKey] );
                        };

                        $process_scoring_details( ScoringDetails\Property::KEY_GAME_KEY );
                        $process_scoring_details( ScoringDetails\Property::KEY_LENGTH );
                        $process_scoring_details( ScoringDetails\Property::KEY_PLAYER_GAME_ID );
                        $process_scoring_details( ScoringDetails\Property::KEY_PLAYER_ID );
                        $process_scoring_details( ScoringDetails\Property::KEY_SCORING_DETAIL_ID );
                        $process_scoring_details( ScoringDetails\Property::KEY_SCORING_TYPE );
                        $process_scoring_details( ScoringDetails\Property::KEY_SEASON );
                        $process_scoring_details( ScoringDetails\Property::KEY_SEASON_TYPE );
                        $process_scoring_details( ScoringDetails\Property::KEY_TEAM );
                        $process_scoring_details( ScoringDetails\Property::KEY_WEEK );

                        $this->assertEmpty( $cloned_currentScoringDetail );

                    }

                }

                $process_fantasy_defence_details = function ( $pCurrentFantasyDefenceKey ) use ( &$cloned_currentFantasyDefence )
                {
                    $this->assertArrayHasKey( $pCurrentFantasyDefenceKey, $cloned_currentFantasyDefence );
                    unset( $cloned_currentFantasyDefence[$pCurrentFantasyDefenceKey] );
                };

                //remove the Keys
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_SCORING_DETAILS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_GAME_KEY);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_SEASON_TYPE);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_SEASON);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_WEEK);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_DATE);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_TEAM);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_OPPONENT);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_POINTS_ALLOWED);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_TOUCHDOWNS_SCORED);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_SOLO_TACKLES);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_ASSISTED_TACKLES);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_SACKS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_SACK_YARDS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_PASSES_DEFENDED);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_FUMBLES_FORCED);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_FUMBLES_RECOVERED);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_FUMBLES_RETURN_YARDS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_FUMBLE_RETURN_TOUCHDOWNS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_INTERCEPTIONS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_INTERCEPTION_RETURN_YARDS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_INTERCEPTION_RETURN_TOUCHDOWNS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_BLOCKED_KICKS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_SAFETIES);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_PUNT_RETURNS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_PUNT_RETURN_YARDS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_PUNT_RETURN_TOUCHDOWNS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_PUNT_RETURN_LONG);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_KICK_RETURNS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_KICK_RETURN_YARDS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_KICK_RETURN_TOUCHDOWNS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_KICK_RETURN_LONG);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_BLOCKED_KICK_RETURN_TOUCHDOWNS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_FIELD_GOAL_RETURN_TOUCHDOWNS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_FANTASY_POINTS_ALLOWED);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_QUARTERBACK_FANTASY_POINTS_ALLOWED);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_RUNNINGBACK_FANTASY_POINTS_ALLOWED);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_WIDE_RECEIVER_FANTASY_POINTS_ALLOWED_);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_TIGHT_END_FANTASY_POINTS_ALLOWED);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_KICKER_FANTASY_POINTS_ALLOWED);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_BLOCKED_KICK_RETURN_YARDS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_FIELD_GOAL_RETURN_YARDS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_QUARTERBACK_HITS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_TACKLES_FOR_LOSS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_DEFENSIVE_TOUCHDOWNS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_SPECIAL_TEAMS_TOUCHDOWNS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_IS_GAME_OVER);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_FANTASY_POINTS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_STADIUM);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_TEMPERATURE);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_HUMIDITY);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_WIND_SPEED);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_THIRD_DOWN_ATTEMPTS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_THIRD_DOWN_CONVERSIONS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_FOURTH_DOWN_ATTEMPTS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_FOURTH_DOWN_CONVERSIONS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_POINTS_ALLOWED_BY_DEFENSE_SPECIAL_TEAMS);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_FAN_DUEL_SALARY);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_DRAFT_KINGS_SALARY);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_FANTASY_DATA_SALARY);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_VICTIV_SALARY);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_TWO_POINT_CONVERSION_RETURNS );
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_FANTASY_POINTS_FAN_DUEL );
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_FANTASY_POINTS_DRAFT_KINGS );
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_OFFENSIVE_YARDS_ALLOWED);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_YAHOO_SALARY);
                $process_fantasy_defence_details( BoxScore\FantasyDefence\Property::KEY_PLAYER_ID);
                $this->assertEmpty( $cloned_currentFantasyDefence );
            }

            /** process data in AWAY_KICK_PUNT_RETURNS  */
            foreach($pStats[BoxScore\Property::KEY_AWAY_KICK_PUNT_RETURNS] as $currentKPR){

                $cloned_currentKPR = $currentKPR;

                /** we expect 21 keys in KPR */
                $this->assertCount( 21, $currentKPR );

                $process_kicking_details = function ( $pCurrentKPRKey ) use ( &$cloned_currentKPR )
                {
                    $this->assertArrayHasKey( $pCurrentKPRKey, $cloned_currentKPR );
                    unset( $cloned_currentKPR[$pCurrentKPRKey] );
                };

                $process_kicking_details( BoxScore\KickPuntReturns\Property::KEY_PLAYER_GAME_ID );
                $process_kicking_details( BoxScore\KickPuntReturns\Property::KEY_PLAYER_ID );
                $process_kicking_details( BoxScore\KickPuntReturns\Property::KEY_SHORT_NAME );
                $process_kicking_details( BoxScore\KickPuntReturns\Property::KEY_NAME );
                $process_kicking_details( BoxScore\KickPuntReturns\Property::KEY_TEAM );
                $process_kicking_details( BoxScore\KickPuntReturns\Property::KEY_NUMBER );
                $process_kicking_details( BoxScore\KickPuntReturns\Property::KEY_POSITION );
                $process_kicking_details( BoxScore\KickPuntReturns\Property::KEY_POSITION_CATEGORY );
                $process_kicking_details( BoxScore\KickPuntReturns\Property::KEY_FANTASY_POSITION );
                $process_kicking_details( BoxScore\KickPuntReturns\Property::KEY_FANTASY_POINTS );
                $process_kicking_details( BoxScore\KickPuntReturns\Property::KEY_UPDATED );
                $process_kicking_details( BoxScore\KickPuntReturns\Property::KEY_KICK_RETURN_LONG );
                $process_kicking_details( BoxScore\KickPuntReturns\Property::KEY_KICK_RETURN_TOUCHDOWNS );
                $process_kicking_details( BoxScore\KickPuntReturns\Property::KEY_KICK_RETURN_YARDS );
                $process_kicking_details( BoxScore\KickPuntReturns\Property::KEY_KICK_RETURN_YARDS_PER_ATTEMPT );
                $process_kicking_details( BoxScore\KickPuntReturns\Property::KEY_KICK_RETURNS );
                $process_kicking_details( BoxScore\KickPuntReturns\Property::KEY_PUNT_RETURN_LONG );
                $process_kicking_details( BoxScore\KickPuntReturns\Property::KEY_PUNT_RETURN_TOUCHDOWNS );
                $process_kicking_details( BoxScore\KickPuntReturns\Property::KEY_PUNT_RETURN_YARDS );
                $process_kicking_details( BoxScore\KickPuntReturns\Property::KEY_PUNT_RETURN_YARDS_PER_ATTEMPT );
                $process_kicking_details( BoxScore\KickPuntReturns\Property::KEY_PUNT_RETURNS );

                $this->assertEmpty( $cloned_currentKPR );
            }

            /** process data in HOME_KICK_PUNT_RETURNS  */
            foreach($pStats[BoxScore\Property::KEY_HOME_KICK_PUNT_RETURNS] as $currentKPR){

                $cloned_currentKPR = $currentKPR;

                /** we expect 21 keys in KPR */
                $this->assertCount( 21, $currentKPR );

                $process_kicking_details = function ( $pCurrentKPRKey ) use ( &$cloned_currentKPR )
                {
                    $this->assertArrayHasKey( $pCurrentKPRKey, $cloned_currentKPR );
                    unset( $cloned_currentKPR[$pCurrentKPRKey] );
                };

                $process_kicking_details( BoxScore\KickPuntReturns\Property::KEY_PLAYER_GAME_ID );
                $process_kicking_details( BoxScore\KickPuntReturns\Property::KEY_PLAYER_ID );
                $process_kicking_details( BoxScore\KickPuntReturns\Property::KEY_SHORT_NAME );
                $process_kicking_details( BoxScore\KickPuntReturns\Property::KEY_NAME );
                $process_kicking_details( BoxScore\KickPuntReturns\Property::KEY_TEAM );
                $process_kicking_details( BoxScore\KickPuntReturns\Property::KEY_NUMBER );
                $process_kicking_details( BoxScore\KickPuntReturns\Property::KEY_POSITION );
                $process_kicking_details( BoxScore\KickPuntReturns\Property::KEY_POSITION_CATEGORY );
                $process_kicking_details( BoxScore\KickPuntReturns\Property::KEY_FANTASY_POSITION );
                $process_kicking_details( BoxScore\KickPuntReturns\Property::KEY_FANTASY_POINTS );
                $process_kicking_details( BoxScore\KickPuntReturns\Property::KEY_UPDATED );
                $process_kicking_details( BoxScore\KickPuntReturns\Property::KEY_KICK_RETURN_LONG );
                $process_kicking_details( BoxScore\KickPuntReturns\Property::KEY_KICK_RETURN_TOUCHDOWNS );
                $process_kicking_details( BoxScore\KickPuntReturns\Property::KEY_KICK_RETURN_YARDS );
                $process_kicking_details( BoxScore\KickPuntReturns\Property::KEY_KICK_RETURN_YARDS_PER_ATTEMPT );
                $process_kicking_details( BoxScore\KickPuntReturns\Property::KEY_KICK_RETURNS );
                $process_kicking_details( BoxScore\KickPuntReturns\Property::KEY_PUNT_RETURN_LONG );
                $process_kicking_details( BoxScore\KickPuntReturns\Property::KEY_PUNT_RETURN_TOUCHDOWNS );
                $process_kicking_details( BoxScore\KickPuntReturns\Property::KEY_PUNT_RETURN_YARDS );
                $process_kicking_details( BoxScore\KickPuntReturns\Property::KEY_PUNT_RETURN_YARDS_PER_ATTEMPT );
                $process_kicking_details( BoxScore\KickPuntReturns\Property::KEY_PUNT_RETURNS );

                $this->assertEmpty( $cloned_currentKPR );
            }

            /** process data in AWAY_KICKING  */
            foreach($pStats[BoxScore\Property::KEY_AWAY_KICKING] as $currentKicking){

                $cloned_currentKicking = $currentKicking;

                /** we expect 17 keys in AWAY_KICKING */
                $this->assertCount( 17, $currentKicking );

                $process_kicking_details = function ( $pCurrentKickingKey ) use ( &$cloned_currentKicking )
                {
                    $this->assertArrayHasKey( $pCurrentKickingKey, $cloned_currentKicking );
                    unset( $cloned_currentKicking[$pCurrentKickingKey] );
                };

                $process_kicking_details( BoxScore\Kicking\Property::KEY_PLAYER_GAME_ID );
                $process_kicking_details( BoxScore\Kicking\Property::KEY_PLAYER_ID );
                $process_kicking_details( BoxScore\Kicking\Property::KEY_SHORT_NAME );
                $process_kicking_details( BoxScore\Kicking\Property::KEY_NAME );
                $process_kicking_details( BoxScore\Kicking\Property::KEY_TEAM );
                $process_kicking_details( BoxScore\Kicking\Property::KEY_NUMBER );
                $process_kicking_details( BoxScore\Kicking\Property::KEY_POSITION );
                $process_kicking_details( BoxScore\Kicking\Property::KEY_POSITION_CATEGORY );
                $process_kicking_details( BoxScore\Kicking\Property::KEY_FANTASY_POSITION );
                $process_kicking_details( BoxScore\Kicking\Property::KEY_FANTASY_POINTS );
                $process_kicking_details( BoxScore\Kicking\Property::KEY_UPDATED );
                $process_kicking_details( BoxScore\Kicking\Property::KEY_EXTRA_POINTS_ATTEMPTED );
                $process_kicking_details( BoxScore\Kicking\Property::KEY_EXTRA_POINTS_MADE );
                $process_kicking_details( BoxScore\Kicking\Property::KEY_FIELD_GOAL_PERCENTAGE );
                $process_kicking_details( BoxScore\Kicking\Property::KEY_KEY_FIELD_GOALS_ATTEMPTED );
                $process_kicking_details( BoxScore\Kicking\Property::KEY_KEY_FIELD_GOALS_LONGEST_MADE );
                $process_kicking_details( BoxScore\Kicking\Property::KEY_KEY_FIELD_GOALS_MADE );


                $this->assertEmpty( $cloned_currentKicking );
            }

            /** process data in HOME_KICKING  */
            foreach($pStats[BoxScore\Property::KEY_HOME_KICKING] as $currentKicking){

                $cloned_currentKicking = $currentKicking;

                /** we expect 17 keys in AWAY_KICKING */
                $this->assertCount( 17, $currentKicking );

                $process_kicking_details = function ( $pCurrentKickingKey ) use ( &$cloned_currentKicking )
                {
                    $this->assertArrayHasKey( $pCurrentKickingKey, $cloned_currentKicking );
                    unset( $cloned_currentKicking[$pCurrentKickingKey] );
                };

                $process_kicking_details( BoxScore\Kicking\Property::KEY_PLAYER_GAME_ID );
                $process_kicking_details( BoxScore\Kicking\Property::KEY_PLAYER_ID );
                $process_kicking_details( BoxScore\Kicking\Property::KEY_SHORT_NAME );
                $process_kicking_details( BoxScore\Kicking\Property::KEY_NAME );
                $process_kicking_details( BoxScore\Kicking\Property::KEY_TEAM );
                $process_kicking_details( BoxScore\Kicking\Property::KEY_NUMBER );
                $process_kicking_details( BoxScore\Kicking\Property::KEY_POSITION );
                $process_kicking_details( BoxScore\Kicking\Property::KEY_POSITION_CATEGORY );
                $process_kicking_details( BoxScore\Kicking\Property::KEY_FANTASY_POSITION );
                $process_kicking_details( BoxScore\Kicking\Property::KEY_FANTASY_POINTS );
                $process_kicking_details( BoxScore\Kicking\Property::KEY_UPDATED );
                $process_kicking_details( BoxScore\Kicking\Property::KEY_EXTRA_POINTS_ATTEMPTED );
                $process_kicking_details( BoxScore\Kicking\Property::KEY_EXTRA_POINTS_MADE );
                $process_kicking_details( BoxScore\Kicking\Property::KEY_FIELD_GOAL_PERCENTAGE );
                $process_kicking_details( BoxScore\Kicking\Property::KEY_KEY_FIELD_GOALS_ATTEMPTED );
                $process_kicking_details( BoxScore\Kicking\Property::KEY_KEY_FIELD_GOALS_LONGEST_MADE );
                $process_kicking_details( BoxScore\Kicking\Property::KEY_KEY_FIELD_GOALS_MADE );

                $this->assertEmpty( $cloned_currentKicking );
            }

            /** process data in AWAY_PUNTING  */
            foreach($pStats[BoxScore\Property::KEY_AWAY_PUNTING] as $currentPunting){

                $cloned_currentPunting = $currentPunting;

                /** we expect 16 keys in AWAY_PUNTING */
                $this->assertCount( 16, $currentPunting );

                $process_kicking_details = function ( $pCurrentPuntingKey ) use ( &$cloned_currentPunting )
                {
                    $this->assertArrayHasKey( $pCurrentPuntingKey, $cloned_currentPunting );
                    unset( $cloned_currentPunting[$pCurrentPuntingKey] );
                };

                $process_kicking_details( BoxScore\Punting\Property::KEY_PLAYER_GAME_ID );
                $process_kicking_details( BoxScore\Punting\Property::KEY_PLAYER_ID );
                $process_kicking_details( BoxScore\Punting\Property::KEY_SHORT_NAME );
                $process_kicking_details( BoxScore\Punting\Property::KEY_NAME );
                $process_kicking_details( BoxScore\Punting\Property::KEY_TEAM );
                $process_kicking_details( BoxScore\Punting\Property::KEY_NUMBER );
                $process_kicking_details( BoxScore\Punting\Property::KEY_POSITION );
                $process_kicking_details( BoxScore\Punting\Property::KEY_POSITION_CATEGORY );
                $process_kicking_details( BoxScore\Punting\Property::KEY_FANTASY_POSITION );
                $process_kicking_details( BoxScore\Punting\Property::KEY_FANTASY_POINTS );
                $process_kicking_details( BoxScore\Punting\Property::KEY_UPDATED );
                $process_kicking_details( BoxScore\Punting\Property::KEY_PUNT_AVERAGE );
                $process_kicking_details( BoxScore\Punting\Property::KEY_PUNT_INSIDE_20 );
                $process_kicking_details( BoxScore\Punting\Property::KEY_PUNT_TOUCHBACKS );
                $process_kicking_details( BoxScore\Punting\Property::KEY_PUNT_YARDS );
                $process_kicking_details( BoxScore\Punting\Property::KEY_PUNTS );

                $this->assertEmpty( $cloned_currentPunting );
            }

            /** process data in HOME_PUNTING  */
            foreach($pStats[BoxScore\Property::KEY_HOME_PUNTING] as $currentPunting){

                $cloned_currentPunting = $currentPunting;

                /** we expect 16 keys in HOME_PUNTING */
                $this->assertCount( 16, $currentPunting );

                $process_kicking_details = function ( $pCurrentPuntingKey ) use ( &$cloned_currentPunting )
                {
                    $this->assertArrayHasKey( $pCurrentPuntingKey, $cloned_currentPunting );
                    unset( $cloned_currentPunting[$pCurrentPuntingKey] );
                };

                $process_kicking_details( BoxScore\Punting\Property::KEY_PLAYER_GAME_ID );
                $process_kicking_details( BoxScore\Punting\Property::KEY_PLAYER_ID );
                $process_kicking_details( BoxScore\Punting\Property::KEY_SHORT_NAME );
                $process_kicking_details( BoxScore\Punting\Property::KEY_NAME );
                $process_kicking_details( BoxScore\Punting\Property::KEY_TEAM );
                $process_kicking_details( BoxScore\Punting\Property::KEY_NUMBER );
                $process_kicking_details( BoxScore\Punting\Property::KEY_POSITION );
                $process_kicking_details( BoxScore\Punting\Property::KEY_POSITION_CATEGORY );
                $process_kicking_details( BoxScore\Punting\Property::KEY_FANTASY_POSITION );
                $process_kicking_details( BoxScore\Punting\Property::KEY_FANTASY_POINTS );
                $process_kicking_details( BoxScore\Punting\Property::KEY_UPDATED );
                $process_kicking_details( BoxScore\Punting\Property::KEY_PUNT_AVERAGE );
                $process_kicking_details( BoxScore\Punting\Property::KEY_PUNT_INSIDE_20 );
                $process_kicking_details( BoxScore\Punting\Property::KEY_PUNT_TOUCHBACKS );
                $process_kicking_details( BoxScore\Punting\Property::KEY_PUNT_YARDS );
                $process_kicking_details( BoxScore\Punting\Property::KEY_PUNTS );

                $this->assertEmpty( $cloned_currentPunting );
            }

            /** process data in AWAY_RECEIVING  */
            foreach($pStats[BoxScore\Property::KEY_AWAY_RECEIVING] as $currentReceiving){

                $cloned_currentReceiving = $currentReceiving;

                /** we expect 21 keys in AWAY_RECEIVING */
                $this->assertCount( 21, $currentReceiving );

                $process_kicking_details = function ( $pCurrentReceivingKey ) use ( &$cloned_currentReceiving )
                {
                    $this->assertArrayHasKey( $pCurrentReceivingKey, $cloned_currentReceiving );
                    unset( $cloned_currentReceiving[$pCurrentReceivingKey] );
                };

                $process_kicking_details( BoxScore\Receiving\Property::KEY_PLAYER_GAME_ID );
                $process_kicking_details( BoxScore\Receiving\Property::KEY_PLAYER_ID );
                $process_kicking_details( BoxScore\Receiving\Property::KEY_SHORT_NAME );
                $process_kicking_details( BoxScore\Receiving\Property::KEY_NAME );
                $process_kicking_details( BoxScore\Receiving\Property::KEY_TEAM );
                $process_kicking_details( BoxScore\Receiving\Property::KEY_NUMBER );
                $process_kicking_details( BoxScore\Receiving\Property::KEY_POSITION );
                $process_kicking_details( BoxScore\Receiving\Property::KEY_POSITION_CATEGORY );
                $process_kicking_details( BoxScore\Receiving\Property::KEY_FANTASY_POSITION );
                $process_kicking_details( BoxScore\Receiving\Property::KEY_FANTASY_POINTS );
                $process_kicking_details( BoxScore\Receiving\Property::KEY_UPDATED );
                $process_kicking_details( BoxScore\Receiving\Property::KEY_FUMBLES_LOST );
                $process_kicking_details( BoxScore\Receiving\Property::KEY_RECEIVING_LONG );
                $process_kicking_details( BoxScore\Receiving\Property::KEY_RECEIVING_TARGETS );
                $process_kicking_details( BoxScore\Receiving\Property::KEY_RECEIVING_TOUCHDOWNS );
                $process_kicking_details( BoxScore\Receiving\Property::KEY_RECEIVING_YARDS );
                $process_kicking_details( BoxScore\Receiving\Property::KEY_RECEIVING_YARDS_PER_RECEPTION );
                $process_kicking_details( BoxScore\Receiving\Property::KEY_RECEIVING_YARDS_PER_TARGET );
                $process_kicking_details( BoxScore\Receiving\Property::KEY_RECEPTION_PERCENTAGE );
                $process_kicking_details( BoxScore\Receiving\Property::KEY_RECEPTIONS );
                $process_kicking_details( BoxScore\Receiving\Property::KEY_TWO_POINT_CONVERSION_RECEPTIONS );

                $this->assertEmpty( $cloned_currentReceiving );
            }

            /** process data in HOME_RECEIVING  */
            foreach($pStats[BoxScore\Property::KEY_HOME_RECEIVING] as $currentReceiving){

                $cloned_currentReceiving = $currentReceiving;

                /** we expect 21 keys in HOME_RECEIVING */
                $this->assertCount( 21, $currentReceiving );

                $process_kicking_details = function ( $pCurrentReceivingKey ) use ( &$cloned_currentReceiving )
                {
                    $this->assertArrayHasKey( $pCurrentReceivingKey, $cloned_currentReceiving );
                    unset( $cloned_currentReceiving[$pCurrentReceivingKey] );
                };

                $process_kicking_details( BoxScore\Receiving\Property::KEY_PLAYER_GAME_ID );
                $process_kicking_details( BoxScore\Receiving\Property::KEY_PLAYER_ID );
                $process_kicking_details( BoxScore\Receiving\Property::KEY_SHORT_NAME );
                $process_kicking_details( BoxScore\Receiving\Property::KEY_NAME );
                $process_kicking_details( BoxScore\Receiving\Property::KEY_TEAM );
                $process_kicking_details( BoxScore\Receiving\Property::KEY_NUMBER );
                $process_kicking_details( BoxScore\Receiving\Property::KEY_POSITION );
                $process_kicking_details( BoxScore\Receiving\Property::KEY_POSITION_CATEGORY );
                $process_kicking_details( BoxScore\Receiving\Property::KEY_FANTASY_POSITION );
                $process_kicking_details( BoxScore\Receiving\Property::KEY_FANTASY_POINTS );
                $process_kicking_details( BoxScore\Receiving\Property::KEY_UPDATED );
                $process_kicking_details( BoxScore\Receiving\Property::KEY_FUMBLES_LOST );
                $process_kicking_details( BoxScore\Receiving\Property::KEY_RECEIVING_LONG );
                $process_kicking_details( BoxScore\Receiving\Property::KEY_RECEIVING_TARGETS );
                $process_kicking_details( BoxScore\Receiving\Property::KEY_RECEIVING_TOUCHDOWNS );
                $process_kicking_details( BoxScore\Receiving\Property::KEY_RECEIVING_YARDS );
                $process_kicking_details( BoxScore\Receiving\Property::KEY_RECEIVING_YARDS_PER_RECEPTION );
                $process_kicking_details( BoxScore\Receiving\Property::KEY_RECEIVING_YARDS_PER_TARGET );
                $process_kicking_details( BoxScore\Receiving\Property::KEY_RECEPTION_PERCENTAGE );
                $process_kicking_details( BoxScore\Receiving\Property::KEY_RECEPTIONS );
                $process_kicking_details( BoxScore\Receiving\Property::KEY_TWO_POINT_CONVERSION_RECEPTIONS );

                $this->assertEmpty( $cloned_currentReceiving );
            }

            /** process data in AWAY_RUSHING  */
            foreach($pStats[BoxScore\Property::KEY_AWAY_RUSHING] as $currentRushing){

                $cloned_currentRushing = $currentRushing;

                /** we expect 18 keys in AWAY_RUSHING */
                $this->assertCount( 18, $currentRushing );

                $process_kicking_details = function ( $pCurrentRushingKey ) use ( &$cloned_currentRushing )
                {
                    $this->assertArrayHasKey( $pCurrentRushingKey, $cloned_currentRushing );
                    unset( $cloned_currentRushing[$pCurrentRushingKey] );
                };

                $process_kicking_details( BoxScore\Rushing\Property::KEY_PLAYER_GAME_ID );
                $process_kicking_details( BoxScore\Rushing\Property::KEY_PLAYER_ID );
                $process_kicking_details( BoxScore\Rushing\Property::KEY_SHORT_NAME );
                $process_kicking_details( BoxScore\Rushing\Property::KEY_NAME );
                $process_kicking_details( BoxScore\Rushing\Property::KEY_TEAM );
                $process_kicking_details( BoxScore\Rushing\Property::KEY_NUMBER );
                $process_kicking_details( BoxScore\Rushing\Property::KEY_POSITION );
                $process_kicking_details( BoxScore\Rushing\Property::KEY_POSITION_CATEGORY );
                $process_kicking_details( BoxScore\Rushing\Property::KEY_FANTASY_POSITION );
                $process_kicking_details( BoxScore\Rushing\Property::KEY_FANTASY_POINTS );
                $process_kicking_details( BoxScore\Rushing\Property::KEY_UPDATED );
                $process_kicking_details( BoxScore\Rushing\Property::KEY_FUMBLES_LOST );
                $process_kicking_details( BoxScore\Rushing\Property::KEY_RUSHING_ATTEMPTS );
                $process_kicking_details( BoxScore\Rushing\Property::KEY_RUSHING_LONG );
                $process_kicking_details( BoxScore\Rushing\Property::KEY_RUSHING_TOUCHDOWNS );
                $process_kicking_details( BoxScore\Rushing\Property::KEY_RUSHING_YARDS );
                $process_kicking_details( BoxScore\Rushing\Property::KEY_RUSHING_YARDS_PER_ATTEMPT );
                $process_kicking_details( BoxScore\Rushing\Property::KEY_TWO_POINT_CONVERSION_RUNS );

                $this->assertEmpty( $cloned_currentRushing );
            }

            /** process data in HOME_RUSHING  */
            foreach($pStats[BoxScore\Property::KEY_HOME_RUSHING] as $currentRushing){

                $cloned_currentRushing = $currentRushing;

                /** we expect 18 keys in HOME_RUSHING */
                $this->assertCount( 18, $currentRushing );

                $process_kicking_details = function ( $pCurrentRushingKey ) use ( &$cloned_currentRushing )
                {
                    $this->assertArrayHasKey( $pCurrentRushingKey, $cloned_currentRushing );
                    unset( $cloned_currentRushing[$pCurrentRushingKey] );
                };

                $process_kicking_details( BoxScore\Rushing\Property::KEY_PLAYER_GAME_ID );
                $process_kicking_details( BoxScore\Rushing\Property::KEY_PLAYER_ID );
                $process_kicking_details( BoxScore\Rushing\Property::KEY_SHORT_NAME );
                $process_kicking_details( BoxScore\Rushing\Property::KEY_NAME );
                $process_kicking_details( BoxScore\Rushing\Property::KEY_TEAM );
                $process_kicking_details( BoxScore\Rushing\Property::KEY_NUMBER );
                $process_kicking_details( BoxScore\Rushing\Property::KEY_POSITION );
                $process_kicking_details( BoxScore\Rushing\Property::KEY_POSITION_CATEGORY );
                $process_kicking_details( BoxScore\Rushing\Property::KEY_FANTASY_POSITION );
                $process_kicking_details( BoxScore\Rushing\Property::KEY_FANTASY_POINTS );
                $process_kicking_details( BoxScore\Rushing\Property::KEY_UPDATED );
                $process_kicking_details( BoxScore\Rushing\Property::KEY_FUMBLES_LOST );
                $process_kicking_details( BoxScore\Rushing\Property::KEY_RUSHING_ATTEMPTS );
                $process_kicking_details( BoxScore\Rushing\Property::KEY_RUSHING_LONG );
                $process_kicking_details( BoxScore\Rushing\Property::KEY_RUSHING_TOUCHDOWNS );
                $process_kicking_details( BoxScore\Rushing\Property::KEY_RUSHING_YARDS );
                $process_kicking_details( BoxScore\Rushing\Property::KEY_RUSHING_YARDS_PER_ATTEMPT );
                $process_kicking_details( BoxScore\Rushing\Property::KEY_TWO_POINT_CONVERSION_RUNS );

                $this->assertEmpty( $cloned_currentRushing );
            }

            /** process data in KEY_GAME  */
            if ( false == empty( $pStats[BoxScore\Property::KEY_GAME]) )
            {
                /** Get The FantasyDefence Array */
                $game = $pStats[BoxScore\Property::KEY_GAME];

                /** we expect 211 keys in the array*/
                $this->assertCount( 211, $game );

                /** clone the array */
                $cloned_currentGame = $game;

                /** Process the StadiumDetails */
                if ( false == empty( $pStats[BoxScore\FantasyDefence\Property::KEY_STADIUM]) )
                {
                    foreach($pStats[GameStatsByWeek\Property::KEY_STADIUM] as $currentStadium){
                        $cloned_currentStadium = $currentStadium;

                        /** we expect 7 keys in currentScoringDetail*/
                        $this->assertCount( 7, $currentStadium );

                        $process_stadium_details = function ( $pCurrentStadiumKey ) use ( &$cloned_currentStadium )
                        {
                            $this->assertArrayHasKey( $pCurrentStadiumKey, $cloned_currentStadium );
                            unset( $cloned_currentStadium[$pCurrentStadiumKey] );
                        };
                        /// process stadium keys
                        $process_stadium_details( Stadium\Property::KEY_CAPACITY);
                        $process_stadium_details( Stadium\Property::KEY_CITY);
                        $process_stadium_details( Stadium\Property::KEY_COUNTRY);
                        $process_stadium_details( Stadium\Property::KEY_NAME);
                        $process_stadium_details( Stadium\Property::KEY_PLAYING_SURFACE);
                        $process_stadium_details( Stadium\Property::KEY_STADIUM_ID);
                        $process_stadium_details( Stadium\Property::KEY_STATE);

                        $this->assertEmpty( $cloned_currentStadium );
                    }
                }

                $process_game_key = function ( $pCurrentGameKey ) use ( &$cloned_currentGame )
                {
                    $this->assertArrayHasKey( $pCurrentGameKey, $cloned_currentGame );
                    unset( $cloned_currentGame[$pCurrentGameKey] );
                };

                /** test all the keys */
                $process_game_key( GameStatsByWeek\Property::KEY_STADIUM_DETAILS );
                $process_game_key( GameStatsByWeek\Property::KEY_GAME_KEY );
                $process_game_key( GameStatsByWeek\Property::KEY_DATE );
                $process_game_key( GameStatsByWeek\Property::KEY_SEASON_TYPE );
                $process_game_key( GameStatsByWeek\Property::KEY_SEASON );
                $process_game_key( GameStatsByWeek\Property::KEY_WEEK );
                $process_game_key( GameStatsByWeek\Property::KEY_STADIUM );
                $process_game_key( GameStatsByWeek\Property::KEY_PLAYING_SURFACE );
                $process_game_key( GameStatsByWeek\Property::KEY_TEMPERATURE );
                $process_game_key( GameStatsByWeek\Property::KEY_HUMIDITY );
                $process_game_key( GameStatsByWeek\Property::KEY_WIND_SPEED );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_TEAM );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_TEAM );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_SCORE );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_SCORE );
                $process_game_key( GameStatsByWeek\Property::KEY_TOTAL_SCORE );
                $process_game_key( GameStatsByWeek\Property::KEY_OVER_UNDER );
                $process_game_key( GameStatsByWeek\Property::KEY_POINT_SPREAD );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_SCORE_QUARTER_FIRST );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_SCORE_QUARTER_SECOND );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_SCORE_QUARTER_THIRD );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_SCORE_QUARTER_FOURTH );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_SCORE_OVERTIME );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_SCORE_QUARTER_FIRST );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_SCORE_QUARTER_SECOND );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_SCORE_QUARTER_THIRD );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_SCORE_QUARTER_FOURTH );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_SCORE_OVERTIME );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_TIME_OF_POSSESSION );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_TIME_OF_POSSESSION );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_FIRST_DOWNS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_FIRST_DOWNS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_FIRST_DOWNS_BY_RUSHING );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_FIRST_DOWNS_BY_RUSHING );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_FIRST_DOWNS_BY_PASSING );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_FIRST_DOWNS_BY_PASSING );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_FIRST_DOWNS_BY_PENALTY );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_FIRST_DOWNS_BY_PENALTY );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_OFFENSIVE_PLAYS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_OFFENSIVE_PLAYS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_OFFENSIVE_YARDS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_OFFENSIVE_YARDS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_OFFENSIVE_YARDS_PER_PLAY );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_OFFENSIVE_YARDS_PER_PLAY );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_TOUCHDOWNS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_TOUCHDOWNS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_RUSHING_ATTEMPTS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_RUSHING_ATTEMPTS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_RUSHING_YARDS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_RUSHING_YARDS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_RUSHING_YARDS_PER_ATTEMPT );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_RUSHING_YARDS_PER_ATTEMPT );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_RUSHING_TOUCHDOWNS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_RUSHING_TOUCHDOWNS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_PASSING_ATTEMPTS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_PASSING_ATTEMPTS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_PASSING_COMPLETIONS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_PASSING_COMPLETIONS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_PASSING_YARDS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_PASSING_YARDS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_PASSING_TOUCHDOWNS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_PASSING_TOUCHDOWNS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_PASSING_INTERCEPTIONS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_PASSING_INTERCEPTIONS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_PASSING_YARDS_PER_ATTEMPT );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_PASSING_YARDS_PER_ATTEMPT );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_PASSING_YARDS_PER_COMPLETION );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_PASSING_YARDS_PER_COMPLETION );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_COMPLETION_PERCENTAGE );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_COMPLETION_PERCENTAGE );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_PASSER_RATING );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_PASSER_RATING );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_THIRD_DOWN_ATTEMPTS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_THIRD_DOWN_ATTEMPTS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_THIRD_DOWN_CONVERSIONS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_THIRD_DOWN_CONVERSIONS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_THIRD_DOWN_PERCENTAGE );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_THIRD_DOWN_PERCENTAGE );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_FOURTH_DOWN_ATTEMPTS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_FOURTH_DOWN_ATTEMPTS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_FOURTH_DOWN_CONVERSIONS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_FOURTH_DOWN_CONVERSIONS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_FOURTH_DOWN_PERCENTAGE );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_FOURTH_DOWN_PERCENTAGE );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_RED_ZONE_ATTEMPTS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_RED_ZONE_ATTEMPTS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_RED_ZONE_CONVERSIONS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_RED_ZONE_CONVERSIONS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_GOAL_TO_GO_ATTEMPTS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_GOAL_TO_GO_ATTEMPTS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_GOAL_TO_GO_CONVERSIONS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_GOAL_TO_GO_CONVERSIONS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_RETURN_YARDS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_RETURN_YARDS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_PENALTIES );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_PENALTIES );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_PENALTY_YARDS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_PENALTY_YARDS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_FUMBLES );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_FUMBLES );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_FUMBLES_LOST );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_FUMBLES_LOST );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_TIMES_SACKED );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_TIMES_SACKED );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_TIMES_SACKED_YARDS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_TIMES_SACKED_YARDS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_SAFETIES );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_SAFETIES );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_PUNTS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_PUNTS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_PUNT_YARDS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_PUNT_YARDS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_PUNT_AVERAGE );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_PUNT_AVERAGE );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_GIVEAWAYS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_GIVEAWAYS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_TAKEAWAYS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_TAKEAWAYS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_TURNOVER_DIFFERENTIAL );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_TURNOVER_DIFFERENTIAL );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_KICKOFFS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_KICKOFFS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_KICKOFFS_IN_END_ZONE );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_KICKOFFS_IN_END_ZONE );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_KICKOFF_TOUCHBACKS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_KICKOFF_TOUCHBACKS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_PUNTS_HAD_BLOCKED );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_PUNTS_HAD_BLOCKED );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_PUNT_NET_AVERAGE );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_PUNT_NET_AVERAGE );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_EXTRA_POINT_KICKING_ATTEMPTS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_EXTRA_POINT_KICKING_ATTEMPTS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_EXTRA_POINT_KICKING_CONVERSIONS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_EXTRA_POINT_KICKING_CONVERSIONS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_EXTRA_POINTS_HAD_BLOCKED );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_EXTRA_POINTS_HAD_BLOCKED );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_EXTRA_POINT_PASSING_ATTEMPTS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_EXTRA_POINT_PASSING_ATTEMPTS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_EXTRA_POINT_PASSING_CONVERSIONS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_EXTRA_POINT_PASSING_CONVERSIONS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_EXTRA_POINT_RUSHING_ATTEMPTS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_EXTRA_POINT_RUSHING_ATTEMPTS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_EXTRA_POINT_RUSHING_CONVERSIONS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_EXTRA_POINT_RUSHING_CONVERSIONS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_FIELD_GOAL_ATTEMPTS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_FIELD_GOAL_ATTEMPTS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_FIELD_GOALS_MADE );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_FIELD_GOALS_MADE );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_FIELD_GOALS_HAD_BLOCKED );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_FIELD_GOALS_HAD_BLOCKED );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_PUNT_RETURNS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_PUNT_RETURNS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_PUNT_RETURN_YARDS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_PUNT_RETURN_YARDS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_KICK_RETURNS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_KICK_RETURNS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_KICK_RETURN_YARDS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_KICK_RETURN_YARDS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_INTERCEPTION_RETURNS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_INTERCEPTION_RETURNS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_INTERCEPTION_RETURN_YARDS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_INTERCEPTION_RETURN_YARDS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_SOLO_TACKLES );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_ASSISTED_TACKLES );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_QUARTERBACK_HITS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_TACKLES_FOR_LOSS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_SACKS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_SACK_YARDS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_PASSES_DEFENDED );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_FUMBLES_FORCED );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_FUMBLES_RECOVERED );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_FUMBLE_RETURN_YARDS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_FUMBLE_RETURN_TOUCHDOWNS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_INTERCEPTION_RETURN_TOUCHDOWNS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_BLOCKED_KICKS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_PUNT_RETURN_TOUCHDOWNS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_PUNT_RETURN_LONG );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_KICK_RETURN_TOUCHDOWNS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_KICK_RETURN_LONG );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_BLOCKED_KICK_RETURN_YARDS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_BLOCKED_KICK_RETURN_TOUCHDOWNS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_FIELD_GOAL_RETURN_YARDS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_FIELD_GOAL_RETURN_TOUCHDOWNS );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_PUNT_NET_YARDS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_SOLO_TACKLES );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_ASSISTED_TACKLES );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_QUARTERBACK_HITS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_TACKLES_FOR_LOSS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_SACKS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_SACK_YARDS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_PASSES_DEFENDED );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_FUMBLES_FORCED );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_FUMBLES_RECOVERED );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_FUMBLE_RETURN_YARDS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_FUMBLE_RETURN_TOUCHDOWNS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_INTERCEPTION_RETURN_TOUCHDOWNS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_BLOCKED_KICKS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_PUNT_RETURN_TOUCHDOWNS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_PUNT_RETURN_LONG );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_KICK_RETURN_TOUCHDOWNS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_KICK_RETURN_LONG );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_BLOCKED_KICK_RETURN_YARDS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_BLOCKED_KICK_RETURN_TOUCHDOWNS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_FIELD_GOAL_RETURN_YARDS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_FIELD_GOAL_RETURN_TOUCHDOWNS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_PUNT_NET_YARDS );
                $process_game_key( GameStatsByWeek\Property::KEY_IS_GAME_OVER );
                $process_game_key( GameStatsByWeek\Property::KEY_GAME_ID );
                $process_game_key( GameStatsByWeek\Property::KEY_STADIUM_ID );
                $process_game_key( GameStatsByWeek\Property::KEY_AWAY_TWO_POINT_CONVERSION_RETURNS );
                $process_game_key( GameStatsByWeek\Property::KEY_HOME_TWO_POINT_CONVERSION_RETURNS );

                $this->assertEmpty( $cloned_currentGame );
            }

            /** process data in SCORE  */
            if ( false == empty( $pStats[BoxScore\Property::KEY_SCORE]) )
            {
                /** Get The FantasyDefence Array */
                $score = $pStats[BoxScore\Property::KEY_SCORE];

                /** we expect 43 keys in the array*/
                $this->assertCount( 43, $score );

                /** clone the array */
                $cloned_score = $score;

                /** Process the ScoringDetails */
                if ( false == empty( $pStats[Score\Property::KEY_STADIUM_DETAILS]) )
                {
                    foreach($pStats[Score\Property::KEY_STADIUM_DETAILS] as $currentStadium){
                        $cloned_currentStadium = $currentStadium;

                        /** we expect 7 keys in currentStadium */
                        $this->assertCount( 7, $currentStadium );

                        $process_stadium_details = function ( $pCurrentStadiumKey ) use ( &$cloned_currentStadium )
                        {
                            $this->assertArrayHasKey( $pCurrentStadiumKey, $cloned_currentStadium );
                            unset( $cloned_currentStadium[$pCurrentStadiumKey] );
                        };

                        $process_stadium_details( Stadium\Property::KEY_CAPACITY);
                        $process_stadium_details( Stadium\Property::KEY_CITY);
                        $process_stadium_details( Stadium\Property::KEY_COUNTRY);
                        $process_stadium_details( Stadium\Property::KEY_NAME);
                        $process_stadium_details( Stadium\Property::KEY_PLAYING_SURFACE);
                        $process_stadium_details( Stadium\Property::KEY_STADIUM_ID);
                        $process_stadium_details( Stadium\Property::KEY_STATE);

                        $this->assertEmpty( $cloned_currentStadium );

                    }

                }

                $process_score = function ( $pCurrentScore ) use ( &$cloned_score )
                {
                    $this->assertArrayHasKey( $pCurrentScore, $cloned_score );
                    unset( $cloned_score[$pCurrentScore] );
                };

                //remove the Keys
                $process_score( Score\Property::KEY_AWAY_SCORE);
                $process_score( Score\Property::KEY_AWAY_SCORE_OVERTIME);
                $process_score( Score\Property::KEY_AWAY_SCORE_QUARTER_1ST);
                $process_score( Score\Property::KEY_AWAY_SCORE_QUARTER_2ND);
                $process_score( Score\Property::KEY_AWAY_SCORE_QUARTER_3RD);
                $process_score( Score\Property::KEY_AWAY_SCORE_QUARTER_4TH);
                $process_score( Score\Property::KEY_AWAY_TEAM);
                $process_score( Score\Property::KEY_CHANNEL);
                $process_score( Score\Property::KEY_DATE);
                $process_score( Score\Property::KEY_DISTANCE);
                $process_score( Score\Property::KEY_DOWN);
                $process_score( Score\Property::KEY_DOWN_AND_DISTANCE);
                $process_score( Score\Property::KEY_GAME_KEY);
                $process_score( Score\Property::KEY_HAS_1ST_QUARTER_STARTED);
                $process_score( Score\Property::KEY_HAS_2ND_QUARTER_STARTED);
                $process_score( Score\Property::KEY_HAS_3RD_QUARTER_STARTED);
                $process_score( Score\Property::KEY_HAS_4TH_QUARTER_STARTED);
                $process_score( Score\Property::KEY_HAS_STARTED);
                $process_score( Score\Property::KEY_HOME_SCORE);
                $process_score( Score\Property::KEY_HOME_SCORE_OVERTIME);
                $process_score( Score\Property::KEY_HOME_SCORE_QUARTER_1ST);
                $process_score( Score\Property::KEY_HOME_SCORE_QUARTER_2ND);
                $process_score( Score\Property::KEY_HOME_SCORE_QUARTER_3RD);
                $process_score( Score\Property::KEY_HOME_SCORE_QUARTER_4TH);
                $process_score( Score\Property::KEY_HOME_TEAM);
                $process_score( Score\Property::KEY_IS_IN_PROGRESS);
                $process_score( Score\Property::KEY_IS_OVER);
                $process_score( Score\Property::KEY_IS_OVERTIME);
                $process_score( Score\Property::KEY_LAST_UPDATED);
                $process_score( Score\Property::KEY_OVER_UNDER);
                $process_score( Score\Property::KEY_POINT_SPREAD);
                $process_score( Score\Property::KEY_POSSESSION);
                $process_score( Score\Property::KEY_QUARTER);
                $process_score( Score\Property::KEY_QUARTER_DESCRIPTION);
                $process_score( Score\Property::KEY_RED_ZONE);
                $process_score( Score\Property::KEY_SEASON);
                $process_score( Score\Property::KEY_SEASON_TYPE);
                $process_score( Score\Property::KEY_STADIUM_DETAILS);
                $process_score( Score\Property::KEY_STADIUM_ID);
                $process_score( Score\Property::KEY_TIME_REMAINING);
                $process_score( Score\Property::KEY_WEEK);
                $process_score( Score\Property::KEY_YARD_LINE);
                $process_score( Score\Property::KEY_YARD_LINE_TERRITORY);

                $this->assertEmpty( $cloned_score );
            }

            /** process data in SCORING_DETAILS  */
            if ( false == empty( $pStats[BoxScore\Property::KEY_SCORING_DETAILS]) )
            {
                /** Get The FantasyDefence Array */
                $scoringDetails = $pStats[BoxScore\Property::KEY_SCORING_DETAILS];

                /** Process the ScoringDetails */
                /** actual scoring details are in arrays without keys!!! */
                foreach($scoringDetails as $currentScoringDetail){
                    $cloned_currentScoringDetail = $currentScoringDetail;
                    //var_dump($cloned_currentScoringDetail);

                    /** we expect 10 keys in currentScoringDetail */
                    $this->assertCount( 10, $currentScoringDetail );

                    $process_score_details = function ( $pCurrentScoringDetailKey ) use ( &$cloned_currentScoringDetail )
                    {
                        //var_dump($pCurrentScoringDetailKey, $cloned_currentScoringDetail);
                        $this->assertArrayHasKey( $pCurrentScoringDetailKey, $cloned_currentScoringDetail );
                        unset( $cloned_currentScoringDetail[$pCurrentScoringDetailKey] );
                    };

                    $process_score_details( BoxScore\ScoringDetails\Property::KEY_GAME_KEY);
                    $process_score_details( BoxScore\ScoringDetails\Property::KEY_SEASON_TYPE);
                    $process_score_details( BoxScore\ScoringDetails\Property::KEY_PLAYER_ID);
                    $process_score_details( BoxScore\ScoringDetails\Property::KEY_TEAM);
                    $process_score_details( BoxScore\ScoringDetails\Property::KEY_SEASON);
                    $process_score_details( BoxScore\ScoringDetails\Property::KEY_WEEK);
                    $process_score_details( BoxScore\ScoringDetails\Property::KEY_SCORING_TYPE);
                    $process_score_details( BoxScore\ScoringDetails\Property::KEY_LENGTH);
                    $process_score_details( BoxScore\ScoringDetails\Property::KEY_SCORING_DETAIL_ID);
                    $process_score_details( BoxScore\ScoringDetails\Property::KEY_PLAYER_GAME_ID);

                    $this->assertEmpty( $cloned_currentScoringDetail );
                }
            }

            /** process data in SCORING_PLAYS  */
            if ( false == empty( $pStats[BoxScore\Property::KEY_SCORING_PLAYS]) )
            {
                /** Get The FantasyDefence Array */
                $scoringPlays = $pStats[BoxScore\Property::KEY_SCORING_PLAYS];

                /** Process the ScoringPlays */
                /** actual scoring plays are in arrays without keys!!! */
                foreach($scoringPlays as $currentScoringPlay){
                    $cloned_currentScoringPlay = $currentScoringPlay;
                    //var_dump($cloned_currentScoringPlay);

                    /** we expect 15 keys in currentScoringPlay */
                    $this->assertCount( 15, $currentScoringPlay );

                    $process_score_plays = function ( $pCurrentScoringPlayKey ) use ( &$cloned_currentScoringPlay )
                    {
                        $this->assertArrayHasKey( $pCurrentScoringPlayKey, $cloned_currentScoringPlay );
                        unset( $cloned_currentScoringPlay[$pCurrentScoringPlayKey] );
                    };

                    $process_score_plays( BoxScore\ScoringPlays\Property::KEY_GAME_KEY);
                    $process_score_plays( BoxScore\ScoringPlays\Property::KEY_SEASON_TYPE);
                    $process_score_plays( BoxScore\ScoringPlays\Property::KEY_SCORING_PLAY_ID);
                    $process_score_plays( BoxScore\ScoringPlays\Property::KEY_SEASON);
                    $process_score_plays( BoxScore\ScoringPlays\Property::KEY_WEEK);
                    $process_score_plays( BoxScore\ScoringPlays\Property::KEY_AWAY_TEAM);
                    $process_score_plays( BoxScore\ScoringPlays\Property::KEY_HOME_TEAM);
                    $process_score_plays( BoxScore\ScoringPlays\Property::KEY_DATE);
                    $process_score_plays( BoxScore\ScoringPlays\Property::KEY_SEQUENCE);
                    $process_score_plays( BoxScore\ScoringPlays\Property::KEY_TEAM);
                    $process_score_plays( BoxScore\ScoringPlays\Property::KEY_QUARTER);
                    $process_score_plays( BoxScore\ScoringPlays\Property::KEY_TIME_REMAINING);
                    $process_score_plays( BoxScore\ScoringPlays\Property::KEY_PLAY_DESCRIPTION);
                    $process_score_plays( BoxScore\ScoringPlays\Property::KEY_AWAY_SCORE);
                    $process_score_plays( BoxScore\ScoringPlays\Property::KEY_HOME_SCORE);

                    $this->assertEmpty( $cloned_currentScoringPlay );
                }
            }
        };

        $stats = $result->toArray();
        array_walk( $stats, $check_box_score );
    }

    /**
     * Given: An invalid developer API key
     * When: API is queried for 2013REG, Week 17 BoxScores
     * Then: Expect a 401 response in the form of a Guzzle CommandClientException
     *
     * @group Integration
     * @small
     *
     * @expectedException \GuzzleHttp\Command\Exception\CommandClientException
     */
    public function testInvalidAPIKey()
    {
        $client = new DebugClient('invalid_api_key');

        /** @var \GuzzleHttp\Command\Model $result */
        $client->BoxScoresDelta(['Season' => '2013REG', 'Week' => '17', "Minutes" =>'60']);
    }
}
