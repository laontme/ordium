<?php

namespace App\View\Components\Orders;

use DateTime;
use Illuminate\View\Component;

class Card extends Component
{
    public $short;
    public $order;
    public $date;
    public $hasLink;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($order, $short = true, $hasLink = true)
    {
        $this->short = $short;
        $this->hasLink = $hasLink;
        $this->order = $order;

        $tz = timezone_open("Europe/Moscow");

//        setlocale(LC_TIME, "ru");

        $this->date = DateTime::createFromFormat("Y-m-d H:i:s", $order->created_at, $tz)->format("F j, Y, g:i a");
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.orders.card');
    }
}
