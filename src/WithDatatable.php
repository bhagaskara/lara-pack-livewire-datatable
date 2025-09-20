<?php

namespace LaraPack\LivewireDatatable;

use Livewire\WithPagination;
use Livewire\Attributes\On;

trait WithDatatable
{
    use WithPagination;

    public $lengthOptions = [10, 25, 50, 100];
    public $length = 10;
    public $sortBy = '';
    public $sortDirection = 'asc';
    public $loading = true;

    // Config : Filter
    public $search;
    public $filterGlobal = [];
    public $filterColumn = [];

    // Config : Header
    public $summary = [];

    // Config : View
    public $showKeywordFilter = true;
    public $showSelectPageLength = true;
    public $showTotalData = true;
    public $showTotalDataPosition = 'bottom';
    public $showTotalDataClass = '';
    public $textWrap = false;

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
        $this->textWrap = config('livewire-datatable.table_content_text_wrap');

        $this->datatableMount();

        $columns = $this->datatableColumns();
        foreach ($columns as $indexCol => $col) {
            // Init : Sort 
            if ((!isset($col['sortable']) || $col['sortable']) && empty($this->sortBy)) {
                $this->sortBy = $col['key'];
            }

            // Init : Filter
            if (!isset($col['searchable']) || $col['searchable']) {
                // Init Filter : Global
                if (isset($col['key'])) {
                    $this->filterGlobal[] = $col['key'];
                }

                // Init Filter : Columns
                if (isset($col['filter'])) {
                    if (is_array($col['filter'])) {
                        if ((!isset($col['key']) || empty($col['key'])) && (!isset($col['filter']['query']) || !is_callable($col['filter']['query']))) {
                            continue;
                        }

                        $this->filterColumn[$indexCol] = [
                            'type' => $col['filter']['type'],
                            'value' => $col['filter']['value'] ?? null,
                            'placeholder' => $col['filter']['placeholder'] ?? 'Cari...',
                            'key' => $col['key'] ?? null,
                            'query' => isset($col['filter']['query']) ? true : false,

                            // Select / Select2
                            'options' => $col['filter']['options'] ?? [],
                            'url' => $col['filter']['url'] ?? '',
                            'multiple' => $col['filter']['multiple'] ?? false,
                        ];
                    } else {
                        if (!isset($col['key'])) {
                            continue;
                        }

                        $this->filterColumn[$indexCol] = [
                            'type' => $col['filter'],
                            'value' => '',
                            'placeholder' => 'Cari...',
                            'key' => $col['key'],
                            'query' => false,

                            // Select / Select2
                            'options' => [],
                            'url' => '',
                            'multiple' => false,
                        ];
                    }
                }
            }

            // Init : Summary
            if (isset($col['summary']) && is_callable($col['summary'])) {
                $this->summary[$indexCol] = null;
            }
        }

        $this->datatableSummary();
    }

    /*
    | DATATABLE: ABSTRACT / OVERIDE
    */
    abstract public function datatableColumns(): array;
    abstract public function datatableQuery();
    public function datatableMount() {}

    /*
    | DATATABLE: VIEW
    */
    public function datatableView(): string
    {
        if (config('livewire-datatable.theme') == 'bootstrap4') {
            return 'lara-pack.livewire-datatable::table-bootstrap4';
        } else {
            return 'lara-pack.livewire-datatable::table-bootstrap5';
        }
    }

    /*
    | DATATABLE: SUMMARY
    */
    public function datatableSummary()
    {
        if (count($this->summary) == 0) {
            return;
        }

        $query = $this->datatableProcessedQuery();
        $columns = $this->datatableColumns();
        foreach ($this->summary as $indexCol => $value) {
            $this->summary[$indexCol] = call_user_func($columns[$indexCol]['summary'], (clone $query));
        }
    }

    /*
    | DATATABLE: FILTER
    */
    public function updatedFilterColumn()
    {
        $this->datatableSummary();
    }

    public function updatingSearch()
    {
        $this->resetPage();
        $this->datatableSummary();
    }

    public function updatingLength()
    {
        $this->resetPage();
    }

    #[On('datatable-add-filter')]
    public function datatableAddFilter($filter)
    {
        foreach ($filter as $key => $value) {
            $this->$key = $value;
        }
        $this->datatableSummary();
    }

    /*
    | DATATABLE: QUERY DATA
    */
    public function datatableData()
    {
        return $this->datatablePaginate($this->datatableProcessedQuery());
    }

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
        $query = $this->datatableQuery();

        // Filter : Global
        $query->when($this->search, function ($query) {
            $query->where(function ($query) {
                foreach ($this->filterGlobal as $key) {
                    $query->orWhere($key, config('livewire-datatable.query_wildcard_operator'), "%{$this->search}%");
                }
            });
        });

        // Filter : Column
        $query->when(count($this->filterColumn), function ($query) {
            $query->where(function ($query) {
                $datatableColumns = $this->datatableColumns();
                foreach ($this->filterColumn as $index => $filter) {
                    if ($filter['query']) {
                        $query->where(function ($query) use ($datatableColumns, $index, $filter) {
                            call_user_func($datatableColumns[$index]['filter']['query'], $query, $filter['value']);
                        });
                    } else {
                        if ($filter['type'] == 'select2') {
                            // Filter: Select2
                            if ($filter['value'] === null || !isset($filter['value']['id']) || empty($filter['value']['id'])) {
                                continue;
                            }
                            $query->where($filter['key'], $filter['value']['id']);
                        } else {
                            // Filter: Text and Others
                            if ($filter['value'] === null || $filter['value'] === '') {
                                continue;
                            }
                            if ($filter['type'] == 'text') {
                                $query->where($filter['key'], config('livewire-datatable.query_wildcard_operator'), "%{$filter['value']}%");
                            } else {
                                $query->where($filter['key'], $filter['value']);
                            }
                        }
                    }
                }
            });
        });

        // Sort
        $query->when($this->sortBy, function ($query) {
            $query->orderBy($this->sortBy, $this->sortDirection);
        });

        return $query;
    }

    /*
    | DATATABLE: LISTENER
    */
    #[On('datatable-refresh')]
    public function datatableRefresh() {}
}
