<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Test\ScoresByWeek;

use PHPUnit_Framework_TestCase;
use FantasyDataAPI\Test\DebugClient;

use FantasyDataAPI\Enum\Score;
use FantasyDataAPI\Enum\Stadium;

class IntegrationTest extends PHPUnit_Framework_TestCase
{

    /**
     * Given: A developer API key
     * When: API is queried for 2013, Week 17 ScoresByWeek
     * Then: Expect a 200 response with an array entries that each contain Scores and Stadium info
     *
     * @group Integration
     * @group AllTests
     * @medium
     */
    public function testSuccessfulResponse()
    {
        $client = new DebugClient($_SERVER['FANTASY_DATA_API_KEY']);

        /** @var \GuzzleHttp\Command\Model $result */
        $result = $client->ScoresByWeek(['Season' => '2013REG', 'Week' => '17']);

        $response = $client->mHistory->getLastResponse();

        $this->assertEquals('200', $response->getStatusCode());

        /** we expect more than zero :-P ScoresByWeek for 2013, Week 17 */
        $this->assertNotCount( 0, $result );

        $check_score_keys = function ( $pScore )
        {
            /** we expect 52 keys */
            $this->assertCount( 52, $pScore );

            $cloned_array = $pScore;

            /** this function helps us assure that we're not missing any keys in the Enum list */
            $process_key = function ( $pKey ) use ( $pScore, &$cloned_array )
            {
                $this->assertArrayHasKey( $pKey, $pScore );
                unset( $cloned_array[$pKey] );
            };
            /** test all the keys */
            $process_key(Score\Property::KEY_AWAY_SCORE);
            $process_key(Score\Property::KEY_AWAY_SCORE);
            $process_key(Score\Property::KEY_AWAY_SCORE_OVERTIME);
            $process_key(Score\Property::KEY_AWAY_SCORE_QUARTER_1ST);
            $process_key(Score\Property::KEY_AWAY_SCORE_QUARTER_2ND);
            $process_key(Score\Property::KEY_AWAY_SCORE_QUARTER_3RD);
            $process_key(Score\Property::KEY_AWAY_SCORE_QUARTER_4TH);
            $process_key(Score\Property::KEY_AWAY_TEAM);
            $process_key(Score\Property::KEY_CHANNEL);
            $process_key(Score\Property::KEY_DATE);
            $process_key(Score\Property::KEY_DISTANCE);
            $process_key(Score\Property::KEY_DOWN);
            $process_key(Score\Property::KEY_DOWN_AND_DISTANCE);
            $process_key(Score\Property::KEY_GAME_KEY);
            $process_key(Score\Property::KEY_HAS_1ST_QUARTER_STARTED);
            $process_key(Score\Property::KEY_HAS_2ND_QUARTER_STARTED);
            $process_key(Score\Property::KEY_HAS_3RD_QUARTER_STARTED);
            $process_key(Score\Property::KEY_HAS_4TH_QUARTER_STARTED);
            $process_key(Score\Property::KEY_HAS_STARTED);
            $process_key(Score\Property::KEY_HOME_SCORE);
            $process_key(Score\Property::KEY_HOME_SCORE_OVERTIME);
            $process_key(Score\Property::KEY_HOME_SCORE_QUARTER_1ST);
            $process_key(Score\Property::KEY_HOME_SCORE_QUARTER_2ND);
            $process_key(Score\Property::KEY_HOME_SCORE_QUARTER_3RD);
            $process_key(Score\Property::KEY_HOME_SCORE_QUARTER_4TH);
            $process_key(Score\Property::KEY_HOME_TEAM);
            $process_key(Score\Property::KEY_IS_IN_PROGRESS);
            $process_key(Score\Property::KEY_IS_OVER);
            $process_key(Score\Property::KEY_IS_OVERTIME);
            $process_key(Score\Property::KEY_LAST_UPDATED);
            $process_key(Score\Property::KEY_OVER_UNDER);
            $process_key(Score\Property::KEY_POINT_SPREAD);
            $process_key(Score\Property::KEY_POSSESSION);
            $process_key(Score\Property::KEY_QUARTER);
            $process_key(Score\Property::KEY_QUARTER_DESCRIPTION);
            $process_key(Score\Property::KEY_RED_ZONE);
            $process_key(Score\Property::KEY_SEASON);
            $process_key(Score\Property::KEY_SEASON_TYPE);
            $process_key(Score\Property::KEY_STADIUM_DETAILS);
            $process_key(Score\Property::KEY_STADIUM_ID);
            $process_key(Score\Property::KEY_TIME_REMAINING);
            $process_key(Score\Property::KEY_WEEK);
            $process_key(Score\Property::KEY_YARD_LINE);
            $process_key(Score\Property::KEY_YARD_LINE_TERRITORY);
            $process_key(Score\Property::KEY_GEO_LAT);
            $process_key(Score\Property::KEY_GEO_LONG);
            $process_key(Score\Property::KEY_FORECAST_TEMP_LOW);
            $process_key(Score\Property::KEY_FORECAST_TEMP_HIGH);
            $process_key(Score\Property::KEY_FORECAST_DESCRIPTION);
            $process_key(Score\Property::KEY_FORECAST_WIND_CHILL);
            $process_key(Score\Property::KEY_FORECAST_WIND_SPEED);
            $process_key(Score\Property::KEY_AWAY_TEAM_MONEY_LINE);
            $process_key(Score\Property::KEY_HOME_TEAM_MONEY_LINE);



            /** we expect 9 keys */
            $this->assertCount( 9, $pScore[Score\Property::KEY_STADIUM_DETAILS] );

            $stadium_array = $pScore[Score\Property::KEY_STADIUM_DETAILS];
            $cloned_stadium_array = $stadium_array;
            /** this function helps us assure that we're not missing any keys in the Enum list */

            $process_stadium_key = function ( $pKey ) use ( $stadium_array, &$cloned_stadium_array )
            {
                $this->assertArrayHasKey( $pKey, $stadium_array );
                unset( $cloned_stadium_array[$pKey] );
            };
            /** test all the properties */
            $process_stadium_key(Stadium\Property::KEY_CAPACITY);
            $process_stadium_key(Stadium\Property::KEY_CITY);
            $process_stadium_key(Stadium\Property::KEY_COUNTRY);
            $process_stadium_key(Stadium\Property::KEY_NAME);
            $process_stadium_key(Stadium\Property::KEY_PLAYING_SURFACE);
            $process_stadium_key(Stadium\Property::KEY_STADIUM_ID);
            $process_stadium_key(Stadium\Property::KEY_STATE);
            $process_stadium_key(Stadium\Property::KEY_GEO_LAT);
            $process_stadium_key(Stadium\Property::KEY_GEO_LONG);

            $this->assertEmpty( $cloned_stadium_array );
            $this->assertEmpty( $cloned_array );
        };

        $schedules = $result->toArray();

        array_walk( $schedules, $check_score_keys );
    }

    /**
     * Given: An invalid developer API key
     * When: API is queried for 2013, Week 17 ScoresByWeek
     * Then: Expect a 401 response in the form of a Guzzle CommandClientException
     *
     * @group Integration
     * @group AllTests
     * @small
     *
     * @expectedException \GuzzleHttp\Command\Exception\CommandClientException
     */
    public function testInvalidAPIKey()
    {
        $client = new DebugClient('invalid_api_key');

        /** @var \GuzzleHttp\Command\Model $result */
        $client->ScoresByWeek(['Season' => '2013REG', 'Week' => '17']);
    }
}
