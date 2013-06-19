<?php

namespace BinaryThinking\LastfmBundle\Lastfm\Model;

use BinaryThinking\LastfmBundle\Lastfm\Model\Tag;

/**
 * Artist
 *
 * @author Karol Sójko <karolsojko@gmail.com>
 */
class Artist implements LastfmModelInterface
{
    protected $name;

    protected $mbid;

    protected $url;

    protected $images;

    protected $streamable;

    protected $listeners;

    protected $playCount;

    protected $similar = array();

    protected $tags = array();

    protected $bio = array();

    protected $weight;

    public static function createFromResponse(\SimpleXMLElement $response)
    {
        $artist = new Artist();
        $artist->setName((string)$response->name);
        $artist->setMbid((string)$response->mbid);
        $artist->setUrl((string)$response->url);

        $images = array();
        if (!empty($response->image)) {
            foreach ($response->image as $image) {
                $imageAttributes = $image->attributes();
                if (!empty($imageAttributes->size)) {
                    $images[(string)$imageAttributes->size] = (string)$image;
                }
            }
        }
        $artist->setImages($images);

        $artist->setStreamable((int)$response->streamable);

        if (!empty($response->stats)) {
            $artist->setListeners((int)$response->stats->listeners);
            $artist->setPlayCount((int)$response->stats->playcount);
        } elseif (isset($response->listeners)) {
            $artist->setListeners((int)$response->listeners);
        }

        $similar = array();
        if (!empty($response->similar->artist)) {
            foreach ($response->similar->artist as $similarArtistXML) {
                $similarArtist = self::createFromResponse($similarArtistXML);
                if (!empty($similarArtist)) {
                    $similar[$similarArtist->getName()] = $similarArtist;
                }
            }
        }
        $artist->setSimilar($similar);

        $tags = array();
        if (!empty($response->tags->tag)) {
            foreach ($response->tags->tag as $tag) {
                $tags[] = Tag::createFromResponse($tag);
            }
        }
        $artist->setTags($tags);

        $bio = array();
        if (!empty($response->bio)) {
            $bio['published'] = (string)$response->bio->published;
            $bio['summary']   = (string)$response->bio->summary;
            $bio['content']   = (string)$response->bio->content;
        }
        $artist->setBio($bio);

        $artist->setWeight((int)$response->weight);

        return $artist;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public static function createFromJson(\stdClass $artistData)
    {
        $artist = new Artist();
        $artist->setName($artistData->name);
        if (isset($artistData->mbid)) {
            $artist->setMbid($artistData->mbid);
        }
        $artist->setUrl($artistData->url);

        $images = array();
        foreach ($artistData->image as $image) {
            if (!empty($image->size)) {
                $images[$image->size] = $image->{"#text"};
            }
        }
        $artist->setImages($images);

        if (isset($artistData->streamable)) {
            $artist->setStreamable($artistData->streamable);
        }

        if (!empty($artistData->stats)) {
            $artist->setListeners($artistData->stats->listeners);
            $artist->setPlayCount($artistData->stats->playcount);
        } elseif (isset($artistData->listeners)) {
            $artist->setListeners($artistData->listeners);
        }

        $similar = array();
        if (!empty($artistData->similar->artist)) {
            if (is_array($artistData->similar->artist)) {
                foreach ($artistData->similar->artist as $similarArtist) {
                    $similarArtist = self::createFromJson($similarArtist);
                    if (!empty($similarArtist)) {
                        $similar[$similarArtist->getName()] = $similarArtist;
                    }
                }
            } else {
                $similarArtist = self::createFromJson($artistData->similar->artist);
                if (!empty($similarArtist)) {
                    $similar[$similarArtist->getName()] = $similarArtist;
                }
            }
        }
        $artist->setSimilar($similar);

        $tags = array();
        if (!empty($artistData->tags->tag)) {
            if (is_array($artistData->tags->tag)) {
                foreach ($artistData->tags->tag as $tag) {
                    $tags[] = Tag::createFromJson($tag);
                }
            } else {
                $tags[] = Tag::createFromJson($artistData->tags->tag);
            }
        }
        $artist->setTags($tags);

        $bio = array();
        if (!empty($artistData->bio)) {
            $bio['published'] = (string)$artistData->bio->published;
            $bio['summary']   = (string)$artistData->bio->summary;
            $bio['content']   = (string)$artistData->bio->content;
        }
        $artist->setBio($bio);

        return $artist;
    }

    public function getMbid()
    {
        return $this->mbid;
    }

    public function setMbid($mbid)
    {
        $this->mbid = $mbid;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getImages()
    {
        return $this->images;
    }

    public function setImages($images)
    {
        $this->images = $images;
    }

    public function getStreamable()
    {
        return $this->streamable;
    }

    public function setStreamable($streamable)
    {
        $this->streamable = $streamable;
    }

    public function getListeners()
    {
        return $this->listeners;
    }

    public function setListeners($listeners)
    {
        $this->listeners = $listeners;
    }

    public function getPlayCount()
    {
        return $this->playCount;
    }

    public function setPlayCount($playCount)
    {
        $this->playCount = $playCount;
    }

    public function getSimilar()
    {
        return $this->similar;
    }

    public function setSimilar($similar)
    {
        $this->similar = $similar;
    }

    public function getTags()
    {
        return $this->tags;
    }

    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    public function getBio()
    {
        return $this->bio;
    }

    public function setBio($bio)
    {
        $this->bio = $bio;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }
}
