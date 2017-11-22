<?php
/**
 * Created by PhpStorm.
 * User: cleme
 * Date: 21.11.2017
 * Time: 19:39
 */

namespace Mediatrix;


use Ratchet\Wamp\Exception;

class Ini
{
    private $FILE = "../Mediatrix.json";

    /**
     * Ini constructor.
     * @param $app
     */
    public function __construct($app)
    {
        $this->iniMe($app);
    }

    /**
     * @param $app
     */
    public function iniMe($app){
        $ini = file_get_contents($this->FILE);
        $ini = json_decode($ini,true);

        print_r($ini);

    }

}