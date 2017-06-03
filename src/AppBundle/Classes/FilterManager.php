<?php

namespace AppBundle\Classes;

use Doctrine\ORM as ORM;

class FilterManager
{
    private $filters = array();

    public function __construct($filters = array())
    {
        foreach ($filters as $filter) {
            if (!$filter instanceof Filter) {
                throw new \UnexpectedValueException("Filter is not a AppBundle\Classes\Filter class");
            }

            $this->filters[$filter->name] = $filter;
        }
    }

    public function addFilter(Filter $filter)
    {
        if (isset($this->filters[$filter->name])) {
            throw new \InvalidArgumentException("{$filter->name} already exists. Use setFilter to overwrite");
        }
        $this->filters[$filter->name] = $filter;
    }

    public function setFilter(Filter $filter)
    {
        $this->filters[$filter->name] = $filter;
    }


    public function applyFilters($query)
    {
        $where = [];
        foreach ($this->filters as $filter) {
            $where[] = "{$filter->condition} (:filter{$filter->name})";
            $query->setParameter("filter{$filter->name}", $filter->value);
        }

        $query->where(implode(" AND ", $where));

        return $query;
    }

    // TODO
    public function applyFilter($query, $filterName)
    {

    }
}
