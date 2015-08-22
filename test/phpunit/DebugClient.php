<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */
namespace FantasyDataAPI\Test;

use FantasyDataAPI\Client;
use GuzzleHttp\Subscriber\History;

/**
 * Class DebugClient
 * @package FantasyDataAPI\Mock
 *
 * This Client is meant to set up the Subscriber History listener. This
 * can then be used to retrieve the service response which is useful for
 * building Mocks.
 *
 * This client should not be used in production.
 */
class DebugClient extends Client
{
    /**
     * @var History $mHistory
     */
    public $mHistory;

    /**
     * @param array $pOptions
     *
     * @return \GuzzleHttp\Client
     */
    protected function CreateHttpClient($pOptions=[])
    {
        $client = parent::CreateHttpClient($pOptions);

        $this->mHistory = new History();
        $client->getEmitter()->attach($this->mHistory);

        return $client;
    }
} 