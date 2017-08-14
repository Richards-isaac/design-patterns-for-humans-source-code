<?php
/**
 * Created by PhpStorm.
 * User: sydorenkovd
 * Date: 14.08.17
 * Time: 16:58
 */
interface ChatRoomMediator
{
    public function showMessage(User $user, $message);
    public function deleteMessage(User $user, $message);
}

// Посредник
class ChatRoom implements ChatRoomMediator
{
    public function showMessage(User $user, $message)
    {
        $time = date('M d, y H:i');
        $sender = $user->getName();

        echo $time . '[' . $sender . ']:' . $message;
        echo "<br>";
    }
    public function deleteMessage(User $user, $message) {
        echo 'Deleted: ' . date('M d, y H:i') . $message . ' by ' . '[' . $user->getName() . ']';
        echo "<br>";
    }
}
class User {
    protected $name;
    protected $chatMediator;

    public function __construct( $name, ChatRoomMediator $chatMediator) {
        $this->name = $name;
        $this->chatMediator = $chatMediator;
    }

    public function getName() {
        return $this->name;
    }

    public function send($message) {
        $this->chatMediator->showMessage($this, $message);
    }
    public function delete($message) {
        $this->chatMediator->deleteMessage($this, $message);
    }
}
$mediator = new ChatRoom();

$john = new User('John Doe', $mediator);
$jane = new User('Jane Doe', $mediator);

$john->send('Hi there!');
$jane->send('Hey!');
$jane->delete('Hey!');
// Выходной вид
// Feb 14, 10:58 [John]: Hi there!
// Feb 14, 10:58 [Jane]: Hey!