<?php

namespace DCS\AddressComponent\PointBundle\Model;

use CrEOF\Spatial\PHP\Types\Geometry\Point;
use DCS\AddressBundle\Component\AddressComponent;

abstract class AddressPoint implements AddressPointInterface
{
    use AddressComponent;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var Point
     */
    protected $point;

    /**
     * @var array
     */
    protected $geoInfo;

    public function __construct()
    {
        $this->geoInfo = array();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPoint()
    {
        return $this->point;
    }

    public function setPoint(Point $point)
    {
        $this->point = $point;
        return $this;
    }

    public function getGeoInfo()
    {
        return $this->geoInfo;
    }

    public function setGeoInfo(array $geoInfo = null)
    {
        $this->geoInfo = $geoInfo;
        return $this;
    }
}