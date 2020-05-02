<?php

/**
 * React PHP Boiler Plate Api
 * @author timothy brown
 * @date 2020-04-21
 */

namespace App\Http\Events;

use Vader\Core\Container;

/**
 * Class UseTheForce
 * @package App\Core\Events
 */
class UseTheForce extends BaseEvent implements Event
{
    public function fire()
    {
        $requestParams = $this->request->getParams();

        switch ($requestParams['action']) {
            case 'mind-control':
                $message = 'These are not the driods you\'re looking for....';
                break;
            case 'physical-force':
                $message = 'Now, young Skywalker, you will die!';
                break;
            default:
                $message = 'May the force be with you';
        }

        return response([
            'message' => $message
        ]);
    }
}
