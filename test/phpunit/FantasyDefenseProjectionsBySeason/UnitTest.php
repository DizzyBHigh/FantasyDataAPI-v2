<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Test\FantasyDefenseProjectionsBySeason;

use PHPUnit_Framework_TestCase;

use FantasyDataAPI\Test\MockClient;

use FantasyDataAPI\Enum\FantasyDefenseProjectionsBySeason;

class UnitTest extends PHPUnit_Framework_TestCase
{
    /** @var MockClient */
    protected static $sClient;

    /** @var \GuzzleHttp\Message\Response */
    protected static $sResponse;

    protected static $sEffectiveUrl;
    protected static $sUrlFragments;

    /**
     * Set up our test fixture.
     *
     * Expect a service URL something like this:
     *   http://api.nfldata.apiphany.com/nfl/v2/JSON/FantasyDefenseProjectionsBySeason/2013REG
     */
    public static function setUpBeforeClass()
    {
        static::$sClient = new MockClient($_SERVER['FANTASY_DATA_API_KEY']);

        /** \GuzzleHttp\Command\Model */
        static::$sClient->FantasyDefenseProjectionsBySeason(['Season' => '2014REG']);

        static::$sResponse = static::$sClient->mHistory->getLastResponse();
        static::$sEffectiveUrl = static::$sResponse->getEffectiveUrl();
        static::$sUrlFragments = explode('/', static::$sEffectiveUrl);
    }

    public static function tearDownAfterClass()
    {
        static::$sClient = null;
        static::$sResponse = null;
        static::$sEffectiveUrl = null;
        static::$sUrlFragments = null;
    }


    /**
     * Given: A developer API key
     * When: API is queried for FantasyDefenseProjectionsBySeason, Season 2013REG
     * Then: Expect that the json format is placed in the URI
     *
     * @group Unit
     * @small
     */
    public function testFormatInURI()
    {
        /** key 4 should be the "format" based on URL structure */
        $this->assertArrayHasKey(5, static::$sUrlFragments);
        $this->assertEquals( static::$sUrlFragments[5], 'json');
    }

    /**
     * Given: A developer API key
     * When: API is queried for FantasyDefenseProjectionsBySeason, Season 2013REG
     * Then: Expect that the FantasyDefenseProjectionsBySeason resource is placed in the URI
     *
     * @group Unit
     * @small
     */
    public function testResourceInURI()
    {
        /** key 5 should be the "resource" based on URL structure */
        $this->assertArrayHasKey(6, static::$sUrlFragments);
        $this->assertEquals( static::$sUrlFragments[6], 'FantasyDefenseProjectionsBySeason');
    }

    /**
     * Given: A developer API key
     * When: API is queried for FantasyDefenseBySeason, Season 2013REG
     * Then: Expect that the Season is placed in the URI
     *
     * @group Unit
     * @small
     */
    public function testSeasonInURI()
    {
        /** key 6 should be the Season based on URL structure */
        $this->assertArrayHasKey(7, static::$sUrlFragments);

        list($season) = explode('?', static::$sUrlFragments[7]);
        $this->assertEquals( $season, '2014REG');
    }

    /**
     * Given: A developer API key
     * When: API is queried for FantasyDefenseBySeason, Season 2013REG
     * Then: Expect a 200 response with an array of player game stats
     *
     * @group Unit
     * @small
     */
    public function testSuccessfulResponse()
    {
        $this->assertEquals('200', static::$sResponse->getStatusCode());
    }

}
