<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Test\FantasyPlayersByADP;

use PHPUnit_Framework_TestCase;
use FantasyDataAPI\Test\DebugClient;

use FantasyDataAPI\Enum\FantasyPlayersByADP;

class IntegrationTest extends PHPUnit_Framework_TestCase
{

    /**
     * Given: A developer API key
     * When: API is queried for FantasyPlayersByADP
     * Then: Expect a 200 response with an array entries that contains the FantasyPlayersByADP details
     *
     * @group Integration
     * @medium
     */
    public function testSuccessfulResponse()
    {
        $client = new DebugClient($_SERVER['FANTASY_DATA_API_KEY']);

        /** @var \GuzzleHttp\Command\Model $result */
        $result = $client->FantasyPlayersByADP([]);

        $response = $client->mHistory->getLastResponse();

        $this->assertEquals('200', $response->getStatusCode());

        $check_game = function ( $pStadium )
        {
            /** we expect 10 stats */
            $this->assertCount( 10, $pStadium );

            $cloned_array = $pStadium;

            /** this function helps us assure that we're not missing any keys in the Enum list */
            $process_key = function ( $pKey ) use ( $pStadium, &$cloned_array )
            {
                $this->assertArrayHasKey( $pKey, $pStadium );
                unset( $cloned_array[$pKey] );
            };

            /** test all the keys */
            $process_key( FantasyPlayersByADP\Property::KEY_AVERAGE_DRAFT_POSITION );
            $process_key( FantasyPlayersByADP\Property::KEY_AVERAGE_DRAFT_POSITION_PPR );
            $process_key( FantasyPlayersByADP\Property::KEY_BYE_WEEK );
            $process_key( FantasyPlayersByADP\Property::KEY_FANTASY_PLAYER_KEY );
            $process_key( FantasyPlayersByADP\Property::KEY_LAST_SEASON_FANTASY_POINTS );
            $process_key( FantasyPlayersByADP\Property::KEY_NAME );
            $process_key( FantasyPlayersByADP\Property::KEY_PLAYER_ID );
            $process_key( FantasyPlayersByADP\Property::KEY_POSITION );
            $process_key( FantasyPlayersByADP\Property::KEY_PROJECTED_FANTASY_POINTS );
            $process_key( FantasyPlayersByADP\Property::KEY_TEAM );

            $this->assertEmpty( $cloned_array );
        };

        $stats = $result->toArray();

        array_walk( $stats, $check_game );
    }

    /**
     * Given: An invalid developer API key
     * When: API is queried for FantasyPlayersByADP
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
        $client->FantasyPlayersByADP([]);
    }
}
