<?php

namespace AppBundle\Classes;

use Doctrine\ORM as ORM;

class Filter
{
	private static $fields = ["items" => "i.id", "dataInicio" => "p.dataEntrega", "dataFim" => "p.dataEntrega"];

	public static function generateWhere(ORM\QueryBuilder $query, $data)
	{
		// TODO: Incluir em query os where condicionais com fields;
		// TODO: Definir como será definido o sinal de comparação.
		
		foreach (static::$fields as $field => $column) {
			$requestData = $data->get($field);

			if (!empty($requestData)) {
			}
		}

		return $query;
	}
}