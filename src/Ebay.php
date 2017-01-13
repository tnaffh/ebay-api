<?php
/**
 * Created by PhpStorm.
 * User: Tnaffh
 * Date: 12/01/2017
 * Time: 1:51 PM
 */

namespace Tnaffh\eBayAPI;

use GuzzleHttp\Client;

class Ebay
{
    protected $client;

    public function __construct(Client $client = null )
    {
        $this->client = $client;
    }

    /**
     * Test the package
     * @return string
     */
    public function hello(){
        return 'Hello, this is ebay!';
    }

}