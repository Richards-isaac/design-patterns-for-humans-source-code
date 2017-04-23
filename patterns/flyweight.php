<?php
/**
 * Created by PhpStorm.
 * User: sydorenkovd
 * Date: 23.04.17
 * Time: 22:24
 */
// Приспособленец — то, что будет закешировано.
// Типы чая здесь — приспособленцы.
class KarakTea
{
}

// Действует как фабрика и экономит чай
class TeaMaker
{
    protected $availableTea = [];

    public function make($preference)
    {
        if (empty($this->availableTea[$preference])) {
            $this->availableTea[$preference] = new KarakTea();
        }

        return $this->availableTea[$preference];
    }
}

class TeaShop
{
    public $orders;
    protected $teaMaker;

    public function __construct(TeaMaker $teaMaker)
    {
        $this->teaMaker = $teaMaker;
    }

    public function takeOrder(string $teaType, int $table)
    {
        $this->orders[$table] = $this->teaMaker->make($teaType);
    }

    public function serve()
    {
        foreach ($this->orders as $table => $tea) {
            echo "Serving tea to table# " . $table;
        }
    }
}

$teaMaker = new TeaMaker();
$shop = new TeaShop($teaMaker);

$shop->takeOrder('less sugar', 1);
$shop->takeOrder('more milk', 2);
$shop->takeOrder('without sugar', 5);

$shop->serve();
echo "<pre>";
var_dump($shop->orders);
// Serving tea to table# 1
// Serving tea to table# 2
// Serving tea to table# 5