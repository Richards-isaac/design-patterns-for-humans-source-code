<?php
/**
 * Created by PhpStorm.
 * User: sydorenkovd
 * Date: 13.10.17
 * Time: 17:32
 * Open/Closed Principle (OCP)
 */
interface Adapter
{
    public function request(string $url): Promise;
}

class Promise {
    private $data = [
        '/first' => [
            'usd' => 200
        ],
        '/second' => [
            'usd' => 150
        ]
    ];
    public $value;

    public function __construct(string $url)
    {
        if(array_key_exists($url, $this->data)) {
            $this->value = $this->data[$url];
        }

    }
}


class AjaxAdapter implements Adapter
{
    public function request(string $url): Promise
    {
       return new Promise($url);
    }
}

class NodeAdapter implements Adapter
{
    public function request(string $url): Promise
    {
        // request and return promise
    }
}

class HttpRequester
{
    private $adapter;

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function fetch(string $url): Promise
    {
        return $this->adapter->request($url);
    }
}
$http = new HttpRequester(new AjaxAdapter());
echo $http->fetch('/first')->value['usd'];