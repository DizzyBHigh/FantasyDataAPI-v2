<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Test\DailyFantasyPlayers;

use PHPUnit_Framework_TestCase;
use FantasyDataAPI\Test\DebugClient;

use FantasyDataAPI\Enum\DailyFantasyPlayers;

class IntegrationTest extends PHPUnit_Framework_TestCase
{

    /**
     * Given: A developer API key
     * When: API is queried for DailyFantasyPlayers
     * Then: Expect a 200 response with an array entries that contains the DailyFantasyPlayers details
     *
     * @group Integration
     * @medium
     */
    public function testSuccessfulResponse()
    {
        $client = new DebugClient($_SERVER['FANTASY_DATA_API_KEY']);

        /** @var \GuzzleHttp\Command\Model $result */
        $result = $client->DailyFantasyPlayers(['Date' => '2015-SEP-22']);

        $response = $client->mHistory->getLastResponse();

        $this->assertEquals('200', $response->getStatusCode());

        $check_game = function ( $pStadium )
        {
            /** we expect 18 stats */
            $this->assertCount( 18, $pStadium );

            $cloned_array = $pStadium;

            /** this function helps us assure that we're not missing any keys in the Enum list */
            $process_key = function ( $pKey ) use ( $pStadium, &$cloned_array )
            {
                $this->assertArrayHasKey( $pKey, $pStadium );
                unset( $cloned_array[$pKey] );
            };

            /** test all the keys */
            $process_key( DailyFantasyPlayers\Property::KEY_PLAYER_ID );
            $process_key( DailyFantasyPlayers\Property::KEY_DATE );
            $process_key( DailyFantasyPlayers\Property::KEY_SHORT_NAME );
            $process_key( DailyFantasyPlayers\Property::KEY_NAME );
            $process_key( DailyFantasyPlayers\Property::KEY_TEAM );
            $process_key( DailyFantasyPlayers\Property::KEY_OPPONENT );
            $process_key( DailyFantasyPlayers\Property::KEY_POSITION );
            $process_key( DailyFantasyPlayers\Property::KEY_SALARY );
            $process_key( DailyFantasyPlayers\Property::KEY_LAST_GAME_FANTASY_POINTS );
            $process_key( DailyFantasyPlayers\Property::KEY_PROJECTED_FANTASY_POINTS );
            $process_key( DailyFantasyPlayers\Property::KEY_OPPONENT_RANK );
            $process_key( DailyFantasyPlayers\Property::KEY_OPPONENT_POSITION_RANK );
            $process_key( DailyFantasyPlayers\Property::KEY_STATUS );
            $process_key( DailyFantasyPlayers\Property::KEY_STATUS_CODE );
            $process_key( DailyFantasyPlayers\Property::KEY_STATUS_COLOR );
            $process_key( DailyFantasyPlayers\Property::KEY_FAN_DUEL_SALARY );
            $process_key( DailyFantasyPlayers\Property::KEY_DRAFT_KINGS_SALARY );
            $process_key( DailyFantasyPlayers\Property::KEY_YAHOO_SALARY );

            $this->assertEmpty( $cloned_array );
        };

        $stats = $result->toArray();

        array_walk( $stats, $check_game );
    }

    /**
     * Given: An invalid developer API key
     * When: API is queried for DailyFantasyPlayers
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
        $client->DailyFantasyPlayers(['Date' => '2014-SEP']);
    }
}
