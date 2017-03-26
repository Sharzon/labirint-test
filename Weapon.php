<?php

/**
 * Класс оружия.
 * Все свойства реализованы через магические методы
 *
 * @property integer $damage наносимый урон
 * @property integer $distance дальнобойность
 */
class Weapon extends Item
{
    protected $damage;
    protected $distance;

    public function __construct($name, $weight, $damage, $distance)
    {
        parent::__construct($name, $weight);

        $this->damage = $damage;
        $this->distance = $distance;
    }

    protected function getDamage()
    {
        return $this->damage;
    }

    protected function getDistance()
    {
        return $this->distance;
    }
}
