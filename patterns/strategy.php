<?php
/**
 * Created by PhpStorm.
 * User: sydorenkovd
 * Date: 09.09.17
 * Time: 18:18
 */
interface SortStrategy
{
    public function sort(array $dataset);
}

class BubbleSortStrategy implements SortStrategy
{
    public function sort(array $dataset)
    {
        echo "Sorting using bubble sort";

        // Do sorting
        return $dataset;
    }
}

class QuickSortStrategy implements SortStrategy
{
    public function sort(array $dataset)
    {
        echo "Sorting using quick sort";

        // Do sorting
        return $dataset;
    }
}

class Sorter
{
    protected $sorter;

    public function __construct(SortStrategy $sorter)
    {
        $this->sorter = $sorter;
    }

    public function sort(array $dataset)
    {
        return $this->sorter->sort($dataset);
    }
}
$dataset = [1, 5, 4, 3, 2, 8];

$sorter = new Sorter(new BubbleSortStrategy());
$sorter->sort($dataset); // Output : Пузырьковая сортировка

$sorter = new Sorter(new QuickSortStrategy());
$sorter->sort($dataset); // Output : Быстрая сортировка