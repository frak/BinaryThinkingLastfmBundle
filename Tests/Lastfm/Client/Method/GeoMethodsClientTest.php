<?php

namespace BinaryThinking\LastfmBundle\Tests\Lastfm\Client\Method;

/**
 * TagMethodsClientTest
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
        $this->assertNotEmpty($events, "Events not retrieved");
    }
//
//    public function testGetTopArtists()
//    {
//        $this->stubCallMethod('MockTagGetTopArtistsResponse');
//
//        $artists = $this->client->getTopArtists('Death Metal');
//        $this->assertNotEmpty($artists, 'artist are not retrieved');
//
//        $firstArtist = reset($artists);
//        $this->assertInstanceOf('BinaryThinking\LastfmBundle\Lastfm\Model\Artist',
//                $firstArtist, 'artist is wrong instance');
//        $this->assertEquals('Cannibal Corpse', $firstArtist->getName(), 'wrong name of artist');
//    }
//
//    public function testGetTopAlbums()
//    {
//        $this->stubCallMethod('MockTagGetTopAlbumsResponse');
//
//        $albums = $this->client->getTopAlbums('Death Metal');
//        $this->assertNotEmpty($albums, 'albums are not retrieved');
//
//        $firstAlbum = reset($albums);
//        $this->assertInstanceOf('BinaryThinking\LastfmBundle\Lastfm\Model\Album',
//                $firstAlbum, 'album is wrong instance');
//        $this->assertEquals('Scream Bloody Gore', $firstAlbum->getName(), 'wrong name of album');
//    }
//
//    public function testGetTopTracks()
//    {
//        $this->stubCallMethod('MockTagGetTopTracksResponse');
//
//        $tracks = $this->client->getTopTracks('Death Metal');
//        $this->assertNotEmpty($tracks, 'tracks are not retrieved');
//
//        $firstTrack = reset($tracks);
//        $this->assertInstanceOf('BinaryThinking\LastfmBundle\Lastfm\Model\Track',
//                $firstTrack, 'track is wrong instance');
//        $this->assertEquals('Suicide Machine', $firstTrack->getName(), 'wrong name of track');
//    }
//
//    public function testGetInfo()
//    {
//        $this->stubCallMethod('MockTagGetInfoResponse');
//
//        $tag = $this->client->getInfo('Death Metal');
//        $this->assertNotEmpty($tag, 'tag info not retrieved');
//
//        $this->assertInstanceOf('BinaryThinking\LastfmBundle\Lastfm\Model\Tag',
//                $tag, 'tag is wrong instance');
//        $this->assertEquals(64861, $tag->getReach(), 'wrong reach of tag');
//    }
//
//    public function testGetSimilar()
//    {
//        $this->stubCallMethod('MockTagGetSimilarResponse');
//
//        $tags = $this->client->getSimilar('Death Metal');
//        $this->assertNotEmpty($tags, 'similar tags not retrieved');
//
//        $firstTag = reset($tags);
//        $this->assertInstanceOf('BinaryThinking\LastfmBundle\Lastfm\Model\Tag',
//                $firstTag, 'tag is wrong instance');
//        $this->assertEquals('brutal death metal', $firstTag->getName(), 'wrong name of tag');
//    }
//
//    public function testGetTopTags()
//    {
//        $this->stubCallMethod('MockTagGetTopTagsResponse');
//
//        $tags = $this->client->getTopTags();
//        $this->assertNotEmpty($tags, 'top tags not retrieved');
//
//        $firstTag = reset($tags);
//        $this->assertInstanceOf('BinaryThinking\LastfmBundle\Lastfm\Model\Tag',
//                $firstTag, 'tag is wrong instance');
//        $this->assertEquals('rock', $firstTag->getName(), 'wrong name of tag');
//    }
//
//    public function testSearch()
//    {
//        $this->stubCallMethod('MockTagSearchResponse');
//
//        $tags = $this->client->search('Death Metal');
//        $this->assertNotEmpty($tags, 'tags not retrieved');
//
//        $firstTag = reset($tags);
//        $this->assertInstanceOf('BinaryThinking\LastfmBundle\Lastfm\Model\Tag',
//                $firstTag, 'tag is wrong instance');
//        $this->assertEquals('metal', $firstTag->getName(), 'wrong name of tag');
//    }
//
//    public function testGetWeeklyArtistChart()
//    {
//        $this->stubCallMethod('MockTagGetWeeklyArtistChartResponse');
//
//        $artists = $this->client->getWeeklyArtistChart('Death Metal');
//        $this->assertNotEmpty($artists, 'artists not retrieved');
//
//        $firstArtist = reset($artists);
//        $this->assertInstanceOf('BinaryThinking\LastfmBundle\Lastfm\Model\Artist',
//                $firstArtist, 'artist is wrong instance');
//        $this->assertEquals('Gojira', $firstArtist->getName(), 'wrong name of artist');
//        $this->assertEquals(84280000, $firstArtist->getWeight(), 'wrong weight of artist in chart');
//    }
//
//    public function testGetWeeklyChartList()
//    {
//        $this->stubCallMethod('MockTagGetWeeklyChartListResponse');
//
//        $charts = $this->client->getWeeklyChartList('Death Metal');
//        $this->assertNotEmpty($charts, 'charts not retrieved');
//
//        $firstChart = reset($charts);
//        $this->assertInstanceOf('BinaryThinking\LastfmBundle\Lastfm\Model\Chart',
//                $firstChart, 'artist is wrong instance');
//        $this->assertEquals(1211716800, $firstChart->getFrom(), 'wrong from date');
//        $this->assertEquals(1212321600, $firstChart->getTo(), 'wrong to date');
//    }

}
