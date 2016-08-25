<?php

namespace Peg\Bundles\ApiBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * Class LocationEvent
 *
 * @package Peg\Bundles\ApiBundle
 *
 * @MongoDB\Document(repositoryClass="Peg\Bundles\ApiBundle\Repository\Doctrine\ODM\LocationEventRepository")
 */
class LocationEvent extends Event
{

    /**
     * @var string
     *
     * @MongoDB\Field(type="string")
     */
    private $location;

    /**
     * @var Comment
     *
     * @MongoDB\ReferenceMany(targetDocument="Comment")
     */
    protected $comment;

    protected function __construct(
        string $description,
        string $location
    ) {
        parent::__construct($description);
        $this->location = $location;
    }

    public static function updateLocation(
        string $description,
        string $location
    ) : LocationEvent
    {
        return new self($description, $location);
    }

    public function getLocation() : string
    {
        return $this->location;
    }

}
