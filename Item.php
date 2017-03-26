<?php

/**
 * Общий класс предмета.
 * Все свойства реализованы через магические методы
 *
 * @property integer $weigth вес предмета
 * @property string $name название
 */
class Item
{
    protected $weight;
    protected $name;

    public function __construct($name, $weight)
    {
        $this->name = $name;
        $this->weight = $weight;
    }

    /**
     * Магический метод ищет геттеры.
     * В случае неудачи выбрасывается исключение
     *
     * @return результат работы геттера
     */
    public function __get($name)
    {
        $getter_name = 'get'.ucfirst($name);
        $setter_name = 'set'.ucfirst($name);

        if (method_exists($this, $getter_name)) {
            return $this->$getter_name();
        } elseif (method_exists($this, $setter_name)) {
            throw new Exception("Свойство $name только для записи");
        } else {
            throw new Exception("Не существует свойства $name");
        }
    }

    /**
     * Магический метод проверяет наличие геттеров и сеттеров.
     *
     * @return boolean наличие соответствующего геттера или сеттера
     */
    public function __isset($name)
    {
        $getter_name = 'get'.ucfirst($name);
        $setter_name = 'set'.ucfirst($name);

        return method_exists($this, $getter_name) ||
               method_exists($this, $setter_name);
    }

    /**
     * Магический метод ищет сеттеры.
     * В случае неудачи выбрасывается исключение
     *
     * @return результат работы сеттеры
     */
    public function __set($name, $value)
    {
        $getter_name = 'get'.ucfirst($name);
        $setter_name = 'set'.ucfirst($name);

        if (method_exists($this, $setter_name)) {
            $this->$setter_name($value);
        } elseif (method_exists($this, $getter_name)) {
            throw new Exception("Свойство $name только для чтения");
        } else {
            throw new Exception("Не существует свойства $name");
        }
    }

    protected function getName()
    {
        return $this->name;
    }

    protected function getWeight()
    {
        return $this->weight;
    }
}
