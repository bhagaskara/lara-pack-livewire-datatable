<div>
    @if (
        $filter['type'] == 'text' ||
            $filter['type'] == 'number' ||
            $filter['type'] == 'date' ||
            $filter['type'] == 'datetime-local' ||
            $filter['type'] == 'time' ||
            $filter['type'] == 'email' ||
            $filter['type'] == 'tel')
        <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text bg-transparent border-right-0">
                    <svg width="14" height="14" fill="currentColor" viewBox="0 0 16 16" class="text-muted">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001l3.85 3.85a1 1 0 0 0 1.415-1.415l-3.85-3.85Zm-5.242.656a5 5 0 1 1 0-10.001 5 5 0 0 1 0 10Z" />
                    </svg>
                </span>
            </div>
            <input type="{{ $filter['type'] }}" class="form-control form-control-sm border-left-0"
                placeholder="{{ $filter['placeholder'] }}"
                wire:model.live.debounce.500="filterColumn.{{ $index }}.value" />
        </div>
    @elseif($filter['type'] == 'select' && is_array($filter['options']) && count($filter['options']) > 0)
        <select class="form-select form-select-sm"
            wire:model.live.debounce.500="filterColumn.{{ $index }}.value">
            <option value="">{{ $filter['placeholder'] }}</option>
            @foreach ($filter['options'] as $option)
                <option value="{{ $option['id'] }}">{{ $option['text'] }}</option>
            @endforeach
        </select>
    @elseif($filter['type'] == 'select2')
        <livewire:lara-pack.livewire-select2 class='form-select form-select-sm'
            wire:model.live='filterColumn.{{ $index }}.value' placeholder="{{ $filter['placeholder'] }}"
            :options="$filter['options']" :url="$filter['url']" :multiple="$filter['multiple']" :multipleSelection="$filter['multiple']" :key="'select2_' . $index" />
    @elseif($filter['type'] == 'date-range-picker')
        <livewire:lara-pack.livewire-date-range-picker class='form-control form-control-sm'
            wire:model.live='filterColumn.{{ $index }}.value' :key="'date-range-picker_' . $index" />
    @endif
</div>
