<?php

namespace App\Traits;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

trait Filterable
{
    protected string $sortBy;
    protected string $sortOrder;
    protected string $search;
    protected array $searchableFields;
    protected array $pivotSearch = [];
    protected array $filterableFields = [];
    protected array $filters = [];

    /**
     * Check if the request object has sortable or searchable parameers
     * @param Request $request
     * @param string $defaultSort Default field for sorting
     *
     * @return void
     */
    public function checkFiltersAndSort(Request $request, string $defaultSort): void
    {
        $this->sortBy = $request->query('sortBy', $defaultSort);
        $this->sortOrder = $request->query('sortOrder', 'asc');
        $this->search = $request->query('search', '');
        $this->pageItems = $request->query('pageItems', config('global.paginator.defaultItemsPerPage'));

        if (!in_array($this->sortOrder, ['asc', 'desc'])) {
            throw new Exception(__('Invalid sort order parameter'));
        }

        foreach ($this->filterableFields as $field) {
            if ($request->has($field)) {
                $this->filters[$field] = $request->query($field, null);
            }
        }
    }


    /**
     * Apply filters to the query builder of a Model
     * @param Builder $model
     *
     */
    public function applyFilters(Builder $model)
    {
        foreach ($this->filters as $key => $filter) {
            $model = $model->where($key, $filter);
        }

        if ($this->search != '') {
            if (count($this->searchableFields) == 1) {
                $model = $model->where($this->searchableFields[0], 'like', '%' . $this->search . '%');
            } elseif (count($this->searchableFields) > 1) {
                $model = $model->where(function ($q) {
                    foreach ($this->searchableFields as $field) {
                        $q->orWhere($field, 'like', '%' . $this->search . '%');
                    }
                });
            }

            if (count($this->pivotSearch) > 0) {
                foreach ($this->pivotSearch as $pivot => $field) {
                    $model = $model->orWhereHas($pivot, function ($query) use ($field) {
                        $query->where($field, 'like', '%' . $field . '%');
                    });
                }
            }
        }

        $model = $model->orderBy($this->sortBy, $this->sortOrder)
            ->paginate($this->pageItems)
            ->withQueryString();

        return $model;
    }
}
