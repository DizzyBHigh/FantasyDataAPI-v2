<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Test\Schedules;

use PHPUnit_Framework_TestCase;
use FantasyDataAPI\Test\DebugClient;

use FantasyDataAPI\Enum\Schedule;
use FantasyDataAPI\Enum\Stadium;

class IntegrationTest extends PHPUnit_Framework_TestCase
{

    /**
     * Given: A developer API key
     * When: API is queried for 2014REG Schedules
     * Then: Expect a 200 response with an array entries that each contain Schedule and Stadium info
     *
     * @group Integration
     * @group AllTests
     * @medium
     */
    public function testSuccessfulResponse()
    {
        $client = new DebugClient($_SERVER['FANTASY_DATA_API_KEY']);

        /** @var \GuzzleHttp\Command\Model $result */
        $result = $client->Schedules(['Season' => '2014REG']);

        $response = $client->mHistory->getLastResponse();

        $this->assertEquals('200', $response->getStatusCode());

        /** we expect more than zero :-P Schedules for 2014 */
        $this->assertNotCount( 0, $result );

        $check_team_keys = function ( $pSchedule )
        {
            /** we expect 21 keys */
            $this->assertCount( 21, $pSchedule );

            $cloned_array = $pSchedule;

            /** this function helps us assure that we're not missing any keys in the Enum list */
            $process_key = function ( $pKey ) use ( $pSchedule, &$cloned_array )
            {
                $this->assertArrayHasKey( $pKey, $pSchedule );
                unset( $cloned_array[$pKey] );
            };

            /** test all the keys */
            $process_key( Schedule\Property::KEY_AWAY_TEAM, $pSchedule );
            $process_key( Schedule\Property::KEY_CHANNEL, $pSchedule );
            $process_key( Schedule\Property::KEY_DATE, $pSchedule );
            $process_key( Schedule\Property::KEY_GAME_KEY, $pSchedule );
            $process_key( Schedule\Property::KEY_HOME_TEAM, $pSchedule );
            $process_key( Schedule\Property::KEY_OVER_UNDER, $pSchedule );
            $process_key( Schedule\Property::KEY_POINT_SPREAD, $pSchedule );
            $process_key( Schedule\Property::KEY_SEASON, $pSchedule );
            $process_key( Schedule\Property::KEY_SEASON_TYPE, $pSchedule );
            $process_key( Schedule\Property::KEY_STADIUM_DETAILS, $pSchedule );
            $process_key( Schedule\Property::KEY_STADIUM_ID, $pSchedule );
            $process_key( Schedule\Property::KEY_WEEK, $pSchedule );
            $process_key( Schedule\Property::KEY_GEO_LAT, $pSchedule );
            $process_key( Schedule\Property::KEY_GEO_LONG, $pSchedule );
            $process_key( Schedule\Property::KEY_FORECAST_TEMP_LOW, $pSchedule );
            $process_key( Schedule\Property::KEY_FORECAST_TEMP_HIGH, $pSchedule );
            $process_key( Schedule\Property::KEY_FORECAST_DESCRIPTION, $pSchedule );
            $process_key( Schedule\Property::KEY_FORECAST_WIND_CHILL, $pSchedule );
            $process_key( Schedule\Property::KEY_FORECAST_WIND_SPEED, $pSchedule );
            $process_key( Schedule\Property::KEY_AWAY_TEAM_MONEY_LINE, $pSchedule );
            $process_key( Schedule\Property::KEY_HOME_TEAM_MONEY_LINE, $pSchedule );

            //var_dump($cloned_array);
            $this->assertEmpty( $cloned_array );
        };

        $schedules = $result->toArray();

        array_walk( $schedules, $check_team_keys );
    }

    /**
     * Given: An invalid developer API key
     * When: API is queried for 2014 Schedules
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
        $client->Schedules(['Season' => '2014REG']);
    }
}
