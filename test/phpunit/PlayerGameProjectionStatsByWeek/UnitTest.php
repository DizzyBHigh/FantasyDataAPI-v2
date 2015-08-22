<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Test\PlayerGameProjectionStatsByWeek;

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
     *   http://api.nfldata.apiphany.com/developer/json/PlayerGameProjectionStatsByWeek/2013REG/17
     */
    public static function setUpBeforeClass()
    {
        static::$sClient = new MockClient($_SERVER['FANTASY_DATA_API_KEY']);

        /** \GuzzleHttp\Command\Model */
        static::$sClient->PlayerGameProjectionStatsByWeek(['Season' => '2013REG', 'Week' => '17']);

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
     * When: API is queried for 2013REG, Week 17, Team NE PlayerGameProjectionStatsByWeek
     * Then: Expect that the json format is placed in the URI
     *
     * @group ug
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
     * When: API is queried for 2013REG, Week 17, Team NE PlayerGameProjectionStatsByWeek
     * Then: Expect that the PlayerGameProjectionStatsByWeek resource is placed in the URI
     *
     * @group ug
     * @small
     */
    public function testResourceInURI()
    {
        /** key 6 should be the "resource" based on URL structure */
        $this->assertArrayHasKey(6, static::$sUrlFragments);
        $this->assertEquals( static::$sUrlFragments[6], 'PlayerGameProjectionStatsByWeek');
    }

    /**
     * Given: A developer API key
     * When: API is queried for 2013REG, Week 17, Team NE PlayerGameProjectionStatsByWeek
     * Then: Expect that the Season is placed in the URI
     *
     * @group ug
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
     * When: API is queried for 2013REG, Week 17, Team NE PlayerGameProjectionStatsByWeek
     * Then: Expect that the Week is placed in the URI
     *
     * @group ug
     * @small
     */
    public function testWeekInURI()
    {
        /** key 8 should be the Week based on URL structure */
        $this->assertArrayHasKey(8, static::$sUrlFragments);
        $this->assertEquals( static::$sUrlFragments[8], '17');
    }


    /**
     * Given: A developer API key
     * When: API is queried for 2013REG, Week 17, Team NE PlayerGameProjectionStatsByWeek
     * Then: Expect a 200 response
     *
     * @group ug
     * @small
     */
    public function testSuccessfulResponse()
    {
        $this->assertEquals('200', static::$sResponse->getStatusCode());
    }
}