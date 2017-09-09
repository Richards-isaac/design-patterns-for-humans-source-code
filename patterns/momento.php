<?php
/**
 * Created by PhpStorm.
 * User: sydorenkovd
 * Date: 09.09.17
 * Time: 16:47
 */
// хранитель
class EditorMemento
{
    protected $content;

    public function __construct($content)
    {
        $this->content = $content;
    }

    public function getContent()
    {
        return $this->content;
    }
}
class Editor
{
    protected $content = '';

    public function type($words)
    {
        $this->content = $this->content . ' ' . $words;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function save()
    {
        return new EditorMemento($this->content);
    }

    public function restore(EditorMemento $memento)
    {
        $this->content = $memento->getContent();
        return $this;
    }
}

$editor = new Editor();

// Пишем что-нибудь
$editor->type('This is the first sentence.');
$editor->type('This is second.');

// Сохранение состояния в: This is the first sentence. This is second.
$saved = $editor->save();

// Пишем ещё
$editor->type('And this is third.');

// Output: Содержимое до сохранения
echo $editor->getContent(); // This is the first sentence. This is second. And this is third.

// Восстанавливаем последнее сохранённое состояние
$editor->restore($saved);
echo  "<br>";
echo $editor->getContent(); // This is the first sentence. This is second.

$editor->type(' And this forth');
echo $editor->getContent();
$savedTwo = $editor->save();
echo $savedTwo->getContent();

echo $editor->restore($saved)->getContent();