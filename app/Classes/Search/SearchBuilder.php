<?php

namespace App\Classes\Search;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class SearchBuilder
{
    public function __construct(protected string $modelName, protected Request $request)
    {
    }

    public function filter(): Builder
    {
        return $this->applyFilters();
    }

    private function applyFilters(): Builder
    {
        $model = $this->getModel();

        $query = $model->newQuery();
        //filters is an array
        $filters = $this->getFilters();

        foreach ($filters as $filter) {
            //Recuperar la clase
            //Crear la clase de manera dinamica
            $filterClass = __NAMESPACE__ . '\\Filters\\' . $this->modelName . '\\' . $filter;

            if (class_exists($filterClass)) {
                $query = $filterClass::apply($query, $this->request);
            }
        }

        return $query;
    }

    private function getModel(): Model
    {
        return app('App\\Models\\' . $this->modelName);
    }

    /**
     * @return array<string>
     */
    private function getFilters(): array
    {
        $filtersName = [];

        $path = __DIR__ . '/Filters/' . $this->modelName;

        if (file_exists($path)) {
            //Escanear los filtros
            /** @var array $allFilters */
            $allFilters = scandir($path);
            //quita . y ..
            $filters = array_diff($allFilters, ['.', '..']);

            foreach ($filters as $filter) {
                //expresion regular para quitar extenciones de un documento
                //despues del punto reemplaza por vacio los 3 o 4 caracteres
                $filtersName[] = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filter);
            }
        }

        return $filtersName;
    }
}
