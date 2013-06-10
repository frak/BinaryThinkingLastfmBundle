<?php

namespace BinaryThinking\LastfmBundle\Tests\Lastfm\Client\Method;

/**
 * GeoMethodsClientTest
 *
 * @author Michael Davey <m.davey.bsc@gmail.com>
 */
class GeoMethodsClientTest extends MethodsClientTestCase
{
    /**
     * @todo Put it in the parent
     * @var string Because someone was too lazy to put it in the parent
     */
    public $context;

    public function setUp()
    {
        $this->context = 'Geo';
        parent::setUp();
    }

    public function testGetEvents()
    {
        $this->stubCallMethod('MockGeoGetEventsResponse');

        $events = $this->client->getEvents('Belgium');
        $meta = $events['meta'];
        $events = $events['data'];
        $this->assertNotEmpty($events, 'Events not retrieved');
        $this->assertEquals(1000, $meta->total, 'Wrong number of search results retrieved');

        $firstEvent = reset($events);
        $this->assertInstanceOf(
            'BinaryThinking\LastfmBundle\Lastfm\Model\Event',
            $firstEvent,
            'Event is wrong instance'
        );
        $this->assertEquals('Lucinda Williams', $firstEvent->getTitle(), 'Wrong event title');
    }
}
