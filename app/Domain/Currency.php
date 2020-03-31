<?php
namespace App\Domain;

class Currency
{
    private $id;
    private $name;
    private $rate;
    private $date;

    public function __construct($id, $name, $rate, \DateTimeImmutable $date)
    {
        $this->setId($id);
        $this->setName($name);
        $this->setRate($rate);
        $this->setDate($date);
    }

    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getName() { return $this->name; }
    public function setName($name) { $this->name = $name; }

    public function getRate() { return $this->rate; }
    public function setRate($rate) { $this->rate = $rate; }

    public function getDate() { return $this->date; }
    public function setDate($date) { $this->date = $date; }
    public function getDateFormated($format = "d.m.Y") { return $this->date->format($format); }
}

?>