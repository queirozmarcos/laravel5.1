<?php

namespace CodeCommerce;

class Cart
{
	// Métodos da classe :
	//
	// add - adicionar ao carrinho
	// remove - remover do carrinho
	// all - pegar todos os itens do carrinho
	// getTotal - valor total do carrinho
	
	private $items;
	
	public function __construct()
	{
		$this->items = [];
	}
	
	public function add ($id, $name, $price)
	{
		// id -> qtd, price, name
		
		$this->items += [
		  $id => [
		    'qtd' => isset($this->items[$id]['qtd']) ? $this->items[$id]['qtd']++ : 1,
			'price' => $price,
			'name' => $name
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
		
		foreach($this->items as $items)
		{
			$total += $items['qtd'] * $items['price'];
		}
		
//		return $total;
		return number_format($total, 2, ',', '.');
	}
	
    public function setQtd($id, $qtd)
    {
        if($qtd > 0){
            $this->items[$id]['qtd'] = $qtd;
        }
    }
}
