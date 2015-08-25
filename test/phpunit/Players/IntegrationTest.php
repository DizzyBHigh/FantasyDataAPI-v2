<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Test\Integration;

use PHPUnit_Framework_TestCase;
use FantasyDataAPI\Test\DebugClient;

use FantasyDataAPI\Enum\Players;
use FantasyDataAPI\Enum\PlayerNews;
use FantasyDataAPI\Enum\PlayerSeason;

class PlayersTest extends PHPUnit_Framework_TestCase
{

    /**
     * Given: A developer API key
     * When: API is queried for Players
     * Then: Expect a 200 response with an array entries that each contain Players
     *
     * @group Integration
     * @medium
     */
    public function testActivePlayersSuccessfulResponse()
    {
        $client = new DebugClient($_SERVER['FANTASY_DATA_API_KEY']);

        /** @var \GuzzleHttp\Command\Model $result */
        $result = $client->Players([]);

        $response = $client->mHistory->getLastResponse();

        $this->assertEquals('200', $response->getStatusCode());

        /** we expect a non-empty array of players */
        $this->assertNotEmpty( $result );

        $check_players = function ( $pPlayers )
        {
            /** we expect 41 stats */
            $this->assertCount( 41, $pPlayers );

            $cloned_array = $pPlayers;

            /** this function helps us assure that we're not missing any keys in the Enum list */
            $process_key = function ( $pKey ) use ( $pPlayers, &$cloned_array )
            {
                $this->assertArrayHasKey( $pKey, $pPlayers );
                unset( $cloned_array[$pKey] );
            };

            /** test all the keys */
            $process_key( Players\Property::KEY_ACTIVE );
            $process_key( Players\Property::KEY_AGE );
            $process_key( Players\Property::KEY_AVERAGE_DRAFT_POSITION );
            $process_key( Players\Property::KEY_BIRTH_DATE );
            $process_key( Players\Property::KEY_BIRTH_DATE_STRING );
            $process_key( Players\Property::KEY_BYE_WEEK );
            $process_key( Players\Property::KEY_COLLEGE );
            $process_key( Players\Property::KEY_COLLEGE_DRAFT_PICK );
            $process_key( Players\Property::KEY_COLLEGE_DRAFT_ROUND );
            $process_key( Players\Property::KEY_COLLEGE_DRAFT_TEAM );
            $process_key( Players\Property::KEY_COLLEGE_DRAFT_YEAR );
            $process_key( Players\Property::KEY_CURRENT_STATUS );
            $process_key( Players\Property::KEY_CURRENT_TEAM );
            $process_key( Players\Property::KEY_DEPTH_DISPLAY_ORDER );
            $process_key( Players\Property::KEY_DEPTH_ORDER );
            $process_key( Players\Property::KEY_DEPTH_POSITION );
            $process_key( Players\Property::KEY_DEPTH_POSITION_CATEGORY );
            $process_key( Players\Property::KEY_EXPERIENCE );
            $process_key( Players\Property::KEY_EXPERIENCE_STRING );
            $process_key( Players\Property::KEY_FANTASY_POSITION );
            $process_key( Players\Property::KEY_FIRST_NAME );
            $process_key( Players\Property::KEY_HEIGHT );
            $process_key( Players\Property::KEY_HEIGHT_FEET );
            $process_key( Players\Property::KEY_HEIGHT_INCHES );
            // not in this feed: $process_key( Players\Property::KEY_INJURY_STATUS );
            $process_key( Players\Property::KEY_IS_UNDRAFTED_FREE_AGENT );
            $process_key( Players\Property::KEY_LAST_NAME );
            // not in this feed: $process_key( Players\Property::KEY_LATEST_NEWS );
            $process_key( Players\Property::KEY_NAME );
            $process_key( Players\Property::KEY_NUMBER );
            $process_key( Players\Property::KEY_PHOTO_URL );
            $process_key( Players\Property::KEY_PLAYER_ID );
            // not in this feed: $process_key( Players\Property::KEY_PLAYER_SEASON );
            $process_key( Players\Property::KEY_POSITION );
            $process_key( Players\Property::KEY_POSITION_CATEGORY );
            $process_key( Players\Property::KEY_SHORT_NAME );
            $process_key( Players\Property::KEY_STATUS );
            $process_key( Players\Property::KEY_TEAM );
            $process_key( Players\Property::KEY_UPCOMING_GAME_OPPONENT );
            $process_key( Players\Property::KEY_UPCOMING_GAME_WEEK );
            $process_key( Players\Property::KEY_UPCOMING_OPPONENT_POSITION_RANK );
            $process_key( Players\Property::KEY_UPCOMING_OPPONENT_RANK );
            $process_key( Players\Property::KEY_WEIGHT );
            $process_key( Players\Property::KEY_UPCOMING_SALARY );

            $this->assertEmpty( $cloned_array );
        };

        $stats = $result->toArray();

        array_walk( $stats, $check_players );
    }

    /**
     * Given: An invalid developer API key
     * When: API is queried for Players
     * Then: Expect a 401 response in the form of a Guzzle CommandClientException
     *
     * @group Integration
     * @small
     *
     * @expectedException \GuzzleHttp\Command\Exception\CommandClientException
     */
    public function testActivePlayersInvalidAPIKey()
    {
        $client = new DebugClient('invalid_api_key');

        /** @var \GuzzleHttp\Command\Model $result */
        $client->Players([]);
    }
}
