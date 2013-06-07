<?php

namespace BinaryThinking\LastfmBundle\Tests\Lastfm\Client\Method;

/**
 * MethodsClientTestCase
 *
 * @author Karol Sójko <karolsojko@gmail.com>
 */
abstract class MethodsClientTestCase extends \PHPUnit_Framework_TestCase
{
    protected $apiKey = 'test';

    protected $apiSecret = 'testSecret';

    protected $client;

    protected $context;

    public function setUp()
    {
        parent::setUp();
        $this->client = $this->getMock(
            'BinaryThinking\LastfmBundle\Lastfm\Client\Method\\' .
            $this->context . 'MethodsClient',
            array('call'),
            array($this->apiKey, $this->apiSecret)
        );
    }

    protected function stubCallMethod($mockResponseName)
    {
        libxml_use_internal_errors(true);
        $path     = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'Mock' . DIRECTORY_SEPARATOR . $this->context .
            DIRECTORY_SEPARATOR . $mockResponseName;
        $xmlPath  = $path . '.xml';
        $jsonPath = $path . '.json';

        if (file_exists($xmlPath)) {
            $mockResponse = simplexml_load_file($xmlPath);
        } else {
            $mockResponse = json_decode(file_get_contents($jsonPath));
        }

        $this->client->expects($this->any())
            ->method('call')
            ->will($this->returnValue($mockResponse));
    }
}
