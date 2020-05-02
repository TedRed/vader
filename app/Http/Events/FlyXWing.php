<?php

namespace App\Http\Events;

/**
 * Class FlyXWing
 * @package App\Core\Events
 */
class FlyXWing extends BaseEvent implements Event
{

    public function fire()
    {
        $requestParams = $this->request->getParams();

        $configApp = config('app');

        switch ($requestParams['command']) {
            case 'all-wings-report-in':
                $message = 'Red 10 : Red Ten standing by.....  Red 7 :  Red Seven standing by.... ' .
                    'Biggs : Red Three standing by.';
                break;
            case 'lock-s-foils-in-attack-position':
                $message = 'Gold Two : The guns - they\'ve stopped!...' .
                    'Gold Five: Stabilize your rear deflectors... Watch for enemy fighters.....' .
                    'Gold Leader : They\'re coming in! Three marks at 2-10!';
                break;
            default:
                $message = 'I copy, Gold Leader.' . print_r($configApp, true);
        }

        return response([
            'message' => $message
        ]);
    }
}
