<?php
/**
 * Created by PhpStorm.
 * User: mason
 * Date: 2/15/2018
 * Time: 1:10 PM
 */

class PremiumMember extends Member
{
    private static $_outdoor_interests = array('hiking', 'biking', 'swimming', 'collecting', 'walking', 'climbing');
    private static $_indoor_interests = array('tv', 'movies', 'cooking', 'puzzles', 'reading', 'playing cards', 'board games', 'video games');

    private $interests = [];

    /**
     * PremiumMember constructor.
     */
    public function __construct($fname, $lname, $age, $gender, $phone)
    {
        parent::__construct($fname, $lname, $age, $gender, $phone);
    }

    public static function getOutdoor(){
        return PremiumMember::$_outdoor_interests;
    }

    public static function getIndoor(){
        return PremiumMember::$_indoor_interests;
    }

    /**
     * @return array
     */
    public function getInterests()
    {
        return $this->interests;
    }

    /**
     * @param array $interests
     */
    public function setInterests($interests)
    {
        $this->interests = $interests;
    }
}