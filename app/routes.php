<?php
/**
 * Routes
 *
 * Examples *
 *
 * @example $routes->post('/products', new CreateProduct($products));
 * @example $routes->get('/products/{id:\d+}', new GetProductById($products));
 * @example $routes->put('/products/{id:\d+}', new UpdateProduct($products));
 * @example $routes->get('/orders', new GetAllOrders($orders));
 * @example $routes->post('/orders', new Controller($orders, $products));
 * @example $routes->get('/orders/{id:\d+}', new GetOrderById($orders));
 * @example $routes->delete('/orders/{id:\d+}', new DeleteOrder($orders));
 */

//Who-am-i
$routes->get('/who-am-i', function (){
    return new React\Http\Response(
        200,
        array('Content-Type: application/json'),
        json_encode([
            'error' => false,
            'message' => 'Hello World!'
        ])
    );
});

$routes->get('/ping', function (){
    return new React\Http\Response(
        200,
        array('Content-Type: application/json'),
        json_encode([
            'message' => 'Pong'
        ])
    );
});

//Event
$routes->get('/event/{name}', function ($request, $name) {
    $eventHandler = new App\Core\EventHandler($name);
    $handler = $eventHandler->getHandler();
    if($handler) {
        $handler->execute();
        $response = $handler->getResponse();
    }
    return new \React\Http\Response(
        200,
        array('Content-Type: application/json'),
        json_encode($response)
    );
});