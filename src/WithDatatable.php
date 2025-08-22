<?php

namespace LaraPack\LivewireDatatable;

use Livewire\WithPagination;
use Livewire\Attributes\On;

trait WithDatatable
{
    use WithPagination;

    public $lengthOptions = [10, 25, 50, 100];
    public $length = 10;
    public $search;
    public $sortBy = '';
    public $sortDirection = 'asc';
    public $loading = true;
    public $showKeywordFilter = true;
    public $showSelectPageLength = true;
    public $showTotalData = true;

    abstract public function datatableColumns(): array;
    abstract public function datatableQuery();
    public function datatableMount() {}

    public function datatableView(): string
    {
        if (config('livewire-datatable.theme') == 'bootstrap4') {
            return 'lara-pack.livewire-datatable::table-bootstrap4';
        } else {
            return 'lara-pack.livewire-datatable::table-bootstrap5';
        }
    }

    public function render()
    {
        return view($this->datatableView(), [
            'data' => $this->datatableData(),
            'columns' => $this->datatableColumns(),
        ]);
    }

    public function mount()
    {
        $this->paginationTheme = config('livewire-datatable.pagination_theme');

        $columns = $this->datatableColumns();
        if ('' == $this->sortBy && count($columns) > 0) {
            foreach ($columns as $col) {
                if (!isset($col['sortable']) || $col['sortable']) {
                    $this->sortBy = $col['key'];
                    break;
                }
            }
        }

        $this->datatableMount();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    #[On('datatable-add-filter')]
    public function datatableAddFilter($filter)
    {
        foreach ($filter as $key => $value) {
            $this->$key = $value;
        }
    }

    #[On('datatable-refresh')]
    public function datatableRefresh() {}

    public function datatablePaginate($query)
    {
        return $query->paginate($this->length);
    }

    public function datatableSort($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = 'asc' === $this->sortDirection
                ? 'desc'
                : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortBy = $field;
    }

    public function datatableProcessedQuery()
    {
        $columns = $this->datatableColumns();
        $query = $this->datatableQuery();
        $search = $this->search;
        $sortBy = $this->sortBy;
        $sortDirection = $this->sortDirection;

        $query->when($search, function ($query) use ($search, $columns) {
            $query->where(function ($query) use ($columns, $search) {
                foreach ($columns as $col) {
                    if (
                        isset($col['key'])
                        && (!isset($col['searchable']) || (isset($col['searchable']) && $col['searchable']))
                    ) {
                        $query->orWhere($col['key'], config('livewire-datatable.query_wildcard_operator'), "%$search%");
                    }
                }
            });
        });

        $query->when($sortBy, function ($query) use ($sortBy, $sortDirection) {
            $query->orderBy($sortBy, $sortDirection);
        });

        return $query;
    }

    public function datatableData()
    {
        return $this->datatablePaginate($this->datatableProcessedQuery());
    }
}
