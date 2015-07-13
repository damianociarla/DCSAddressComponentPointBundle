<?php

namespace DCS\AddressComponent\PointBundle\Model;

use CrEOF\Spatial\PHP\Types\Geometry\Point;
use DCS\AddressBundle\Component\AddressComponentInterface;

interface AddressPointInterface extends AddressComponentInterface
{
    /**
     * Get id
     *
     * @return int
     */
    public function getId();

    /**
     * Get point
     *
     * @return Point
     */
    public function getPoint();

    /**
     * Set point
     *
     * @param Point $point
     * @return AddressPointInterface
     */
    public function setPoint(Point $point);

    /**
     * Get geoInfo
     *
     * @return array
     */
    public function getGeoInfo();

    /**
     * Set geoInfo
     *
     * @param array|null $geoInfo
     * @return AddressPoint
     */
    public function setGeoInfo(array $geoInfo = null);
}