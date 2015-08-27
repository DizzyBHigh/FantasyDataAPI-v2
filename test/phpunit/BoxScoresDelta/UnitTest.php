<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Test\BoxScoresDelta;

use PHPUnit_Framework_TestCase;

use FantasyDataAPI\Test\MockClient;

use FantasyDataAPI\Enum\Score;
use FantasyDataAPI\Enum\Stadium;

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
     *   http://api.nfldata.apiphany.com/json/BoxScoresDelta/2013REG/17/60
     */
    public static function setUpBeforeClass()
    {
        static::$sClient = new MockClient($_SERVER['FANTASY_DATA_API_KEY']);

        /** \GuzzleHttp\Command\Model */
        static::$sClient->BoxScoresDelta(['Season' => '2013REG', 'Week' => '17', 'Minutes' => '60']);

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
     * When: API is queried for 2013REG, Week 17, Minutes 60 BoxScoresDelta
     * Then: Expect that the json format is placed in the URI
     *
     * @group Unit
     * @small
     */
    public function testFormatInURI()
    {
        /** key 4 should be the "format" based on URL structure
            http://api.nfldata.apiphany.com/nfl/v2/JSON/BoxScoresDelta/2013REG/60
         */
        $this->assertArrayHasKey(5, static::$sUrlFragments);
        $this->assertEquals( static::$sUrlFragments[5], 'json');
    }

    /**
     * Given: A developer API key
     * When: API is queried for 2013REG, Week 17, Minutes 60 BoxScoresDelta
     * Then: Expect that the BoxScoresDelta resource is placed in the URI
     *
     * @group Unit
     * @small
     */
    public function testResourceInURI()
    {
        /** key 5 should be the "resource" based on URL structure */
        $this->assertArrayHasKey(6, static::$sUrlFragments);
        $this->assertEquals( static::$sUrlFragments[6], 'BoxScoresDelta');
    }

    /**
     * Given: A developer API key
     * When: API is queried for 2013REG, Week 17, Minutes 60 BoxScoresDelta
     * Then: Expect that the Season is placed in the URI
     *
     * @group Unit
     * @small
     */
    public function testSeasonInURI()
    {
        /** key 6 should be the Season based on URL structure */
        $this->assertArrayHasKey(7, static::$sUrlFragments);
        $this->assertEquals( static::$sUrlFragments[7], '2013REG');
    }

    /**
     * Given: A developer API key
     * When: API is queried for 2013REG, Week 17, Minutes 60 BoxScoresDelta
     * Then: Expect that the Week is placed in the URI
     *
     * @group Unit
     * @small
     */
    public function testWeekInURI()
    {
        /** key 7 should be the Week based on URL structure */
        $this->assertArrayHasKey(8, static::$sUrlFragments);

        list($week) = explode('?', static::$sUrlFragments[8]);
        $this->assertEquals( $week, '17');
    }

    /**
     * Given: A developer API key
     * When: API is queried for 2013REG, Week 17, Minutes 60 BoxScoresDelta
     * Then: Expect that the Minutes is placed in the URI
     *
     * @group Unit
     * @small
     */
    public function testMinutesInURI()
    {
        /** key 7 should be the Minutes based on URL structure */
        $this->assertArrayHasKey(9, static::$sUrlFragments);

        list($minutes) = explode('?', static::$sUrlFragments[9]);
        $this->assertEquals( $minutes, '60');
    }
    /**
     * Given: A developer API key
     * When: API is queried for 2013REG, Week 17, Minutes 60 BoxScoresDelta
     * Then: Expect a 200 response
     *
     * @group Unit
     * @small
     */
    public function testSuccessfulResponse()
    {
        $this->assertEquals('200', static::$sResponse->getStatusCode());
    }
}
