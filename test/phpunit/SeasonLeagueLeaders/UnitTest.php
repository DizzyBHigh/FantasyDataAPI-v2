<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Test\SeasonLeagueLeaders;

use PHPUnit_Framework_TestCase;

use FantasyDataAPI\Test\MockClient;

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
     *   http://api.nfldata.apiphany.com/developer/json/SeasonLeagueLeaders/2013REG/NE?key=000aaaa0-a00a-0000-0a0a-aa0a00000000
     */
    public static function setUpBeforeClass()
    {
        static::$sClient = new MockClient($_SERVER['FANTASY_DATA_API_KEY']);

        /** \GuzzleHttp\Command\Model */
        static::$sClient->SeasonLeagueLeaders(['Season' => '2013REG', 'Position' => 'WR', 'Column' => 'FantasyPoints']);

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
     * When: API is queried for SeasonLeagueLeaders 2013REG, Position WR, Column FantasyPoints
     * Then: Expect that the json format is placed in the URI
     *
     * @group Unit
     * @small
     */
    public function testFormatInURI()
    {
        /** key 5 should be the "format" based on URL structure */
        $this->assertArrayHasKey(5, static::$sUrlFragments);
        $this->assertEquals( static::$sUrlFragments[5], 'json');
    }

    /**
     * Given: A developer API key
     * When: API is queried for SeasonLeagueLeaders 2013REG, Position WR, Column FantasyPoints
     * Then: Expect that the SeasonLeagueLeaders resource is placed in the URI
     *
     * @group Unit
     * @small
     */
    public function testResourceInURI()
    {
        /** key 6 should be the "resource" based on URL structure */
        $this->assertArrayHasKey(6, static::$sUrlFragments);
        $this->assertEquals( static::$sUrlFragments[6], 'SeasonLeagueLeaders');
    }

    /**
     * Given: A developer API key
     * When: API is queried for SeasonLeagueLeaders 2013REG, Position WR, Column FantasyPoints
     * Then: Expect that the Season is placed in the URI
     *
     * @group Unit
     * @small
     */
    public function testSeasonInURI()
    {
        /** key 7 should be the Season based on URL structure */
        $this->assertArrayHasKey(7, static::$sUrlFragments);
        $this->assertEquals( static::$sUrlFragments[7], '2013REG');
    }

    /**
     * Given: A developer API key
     * When: API is queried for SeasonLeagueLeaders 2013REG, Position WR, Column FantasyPoints
     * Then: Expect that the Position is placed in the URI
     *
     * @group Unit
     * @small
     */
    public function testPositionInURI()
    {
        /** key 8 should be the Team based on URL structure */
        $this->assertArrayHasKey(8, static::$sUrlFragments);
        $this->assertEquals( static::$sUrlFragments[8], 'WR');
    }

    /**
     * Given: A developer API key
     * When: API is queried for SeasonLeagueLeaders 2013REG, Position WR, Column FantasyPoints
     * Then: Expect that the Column is placed in the URI
     *
     * @group Unit
     * @small
     */
    public function testColumnInURI()
    {
        /** key 9 should be the Team based on URL structure */
        $this->assertArrayHasKey(9, static::$sUrlFragments);

        list($column) = explode('?', static::$sUrlFragments[9]);
        $this->assertEquals( $column, 'FantasyPoints');
    }

    /**
     * Given: A developer API key
     * When: API is queried for SeasonLeagueLeaders 2013REG, Position WR, Column FantasyPoints
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
