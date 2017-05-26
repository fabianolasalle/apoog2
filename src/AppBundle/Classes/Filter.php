<?php

namespace AppBundle\Classes;

use Doctrine\ORM as ORM;

class Filter
{
	public $name;
	public $condition;
	public $value;

	public function __construct($name, $condition, $value)
	{
		$this->name = $name;
		$this->condition = $condition;
		$this->value = $value;
	}

	// private static $fields = ["items" => "i.id", "dataInicio" => "p.dataEntrega", "dataFim" => "p.dataEntrega"];

	// public static function generateWhere(ORM\QueryBuilder $query, $data)
	// {
	// 	// TODO: Incluir em query os where condicionais com fields;
	// 	// TODO: Definir como será definido o sinal de comparação.
		
	// 	foreach (static::$fields as $field => $column) {
	// 		$requestData = $data->get($field);

	// 		var_dump($requestData);
	// 		die;

	// 		if (!empty($requestData)) {

	// 		}
	// 	}

	// 	return $query;
	// }
}