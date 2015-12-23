<?php
/**
 * Created by PhpStorm.
 * User: chacal
 * Date: 07/11/15
 * Time: 10:12
 */

namespace CodeCommerce;


class Cart
{

    private $items;

    public function __construct()
    {
        $this->items = [];
    }


    public function add($id, $name, $price)
    {
        $this->items += [
            $id => [
                'qtd' => isset($this->items[$id]['qtd']) ? $this->items[$id]['qtd']++ : 1,
                'price' => $price,
                'name' => $name,
            ]
        ];
        return $this->items;
    }


    public function remove($id)
    {
        unset($this->items[$id]);
    }


    public function all()
    {
        return $this->items;
    }


    public function getTotal()
    {
        $total = 0;
        foreach ($this->items as $items) {
            $total += $items['qtd'] * $items['price'];
        }
        return $total;
    }


    public function update($id, $qtd)
    {
        if ($qtd > 0) {
            $this->items[$id]['qtd'] = $qtd;
        } else {
            $this->remove($id);
        }
    }

    public function clear()
    {
        $this->items = [];
    }






}