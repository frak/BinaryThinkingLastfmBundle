<?php
/**
 * GeoMethodsClient.php
 *
 * User: mikey
 * Date: 07/06/2013
 * Time: 16:49
 */

namespace BinaryThinking\LastfmBundle\Lastfm\Client\Method;

use BinaryThinking\LastfmBundle\Lastfm\Client\LastfmAPIClient;
use BinaryThinking\LastfmBundle\Lastfm\Model\Event;

/**
 * GeoMethodsClient
 */
class GeoMethodsClient extends LastfmAPIClient
{
    /**
     * Fetch events for a specific area
     *
     * @param string $location      Where to search by name
     * @param string $distance      The geographical range of the search in kilometres
     * @param string $long          Longitude to search for
     * @param string $lat           Latitude to search for
     * @param string $page          Page of results to return
     * @param string $tag           Tags to include with the search
     * @param int    $festivalsOnly Whether or not to only retrieve festivals
     * @param string $limit         Page size
     *
     * @return array
     */
    public function getEvents(
        $location = null,
        $distance = null,
        $long = null,
        $lat = null,
        $page = null,
        $tag = null,
        $festivalsOnly = 0,
        $limit = null
    ) {
        $params = array(
            'method'        => 'geo.getEvents',
            'location'      => $location,
            'distance'      => $distance,
            'long'          => $long,
            'lat'           => $lat,
            'page'          => $page,
            'tag'           => $tag,
            'festivalsonly' => $festivalsOnly,
            'limit'         => $limit,
            'format'        => 'json',
        );

        $response = $this->call($params);

        $events = array();
        if (!empty($response->events->event)) {
            foreach ($response->events->event as $event) {
                $events[] = Event::createFromJson($event);
            }
        }

        $out = array(
            'data' => $events,
            'meta' => $response->events->{"@attr"}
        );

        return $out;
    }
}
