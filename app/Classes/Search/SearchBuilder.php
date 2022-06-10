<?php

namespace App\Classes\Search;

use Illuminate\Http\Request;

class SearchBuilder
{
    protected $modelName;

    protected $request;

    public function __construct($modelName, Request $request)
    {
        $this->modelName = $modelName;

        $this->request = $request;
    }

    public function filter()
    {
        $query = $this->applyFilters();

        return $query;
    }

    private function applyFilters()
    {
        $model = $this->getModel();

        $query = $model->newQuery();
        //filters is a array
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

    private function getModel()
    {
        try {
            return app('App\Models\\' . $this->modelName);
        } catch (\Exception $e) {
            abort(500);
        }
    }

    //recupera los filtros
    private function getFilters()
    {
        $filtersName = [];

        $path = __DIR__ . '/Filters/' . $this->modelName;

        if (file_exists($path)) {
            //Escanear los filtros
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
