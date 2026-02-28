<div {{ $poll ? 'wire:poll.' . $poll . 's' : '' }} class="relative">
    {{-- EXPORT DATA --}}
    @if (isset($showExport) && $showExport)
        <div class="flex items-center mb-4 space-x-2">
            <div class="flex-none">
                <label class="text-sm font-medium text-gray-700">Export Data:</label>
            </div>
            <div class="flex-none">
                <button
                    class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-green-700 bg-green-100 border border-transparent rounded hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                    wire:click="datatableExport('excel')">
                    <svg width="16px" height="16px" viewBox="0 0 32 32" fill="#000000" class="mr-2">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <defs>
                                <linearGradient id="a" x1="4.494" y1="-2092.086" x2="13.832"
                                    y2="-2075.914" gradientTransform="translate(0 2100)" gradientUnits="userSpaceOnUse">
                                    <stop offset="0" stop-color="#18884f"></stop>
                                    <stop offset="0.5" stop-color="#117e43"></stop>
                                    <stop offset="1" stop-color="#0b6631"></stop>
                                </linearGradient>
                            </defs>
                            <title>file_type_excel</title>
                            <path
                                d="M19.581,15.35,8.512,13.4V27.809A1.192,1.192,0,0,0,9.705,29h19.1A1.192,1.192,0,0,0,30,27.809h0V22.5Z"
                                style="fill:#185c37"></path>
                            <path
                                d="M19.581,3H9.705A1.192,1.192,0,0,0,8.512,4.191h0V9.5L19.581,16l5.861,1.95L30,16V9.5Z"
                                style="fill:#21a366"></path>
                            <path d="M8.512,9.5H19.581V16H8.512Z" style="fill:#107c41"></path>
                            <path
                                d="M16.434,8.2H8.512V24.45h7.922a1.2,1.2,0,0,0,1.194-1.191V9.391A1.2,1.2,0,0,0,16.434,8.2Z"
                                style="opacity:0.10000000149011612;isolation:isolate"></path>
                            <path
                                d="M15.783,8.85H8.512V25.1h7.271a1.2,1.2,0,0,0,1.194-1.191V10.041A1.2,1.2,0,0,0,15.783,8.85Z"
                                style="opacity:0.20000000298023224;isolation:isolate"></path>
                            <path
                                d="M15.783,8.85H8.512V23.8h7.271a1.2,1.2,0,0,0,1.194-1.191V10.041A1.2,1.2,0,0,0,15.783,8.85Z"
                                style="opacity:0.20000000298023224;isolation:isolate"></path>
                            <path
                                d="M15.132,8.85H8.512V23.8h6.62a1.2,1.2,0,0,0,1.194-1.191V10.041A1.2,1.2,0,0,0,15.132,8.85Z"
                                style="opacity:0.20000000298023224;isolation:isolate"></path>
                            <path
                                d="M3.194,8.85H15.132a1.193,1.193,0,0,1,1.194,1.191V21.959a1.193,1.193,0,0,1-1.194,1.191H3.194A1.192,1.192,0,0,1,2,21.959V10.041A1.192,1.192,0,0,1,3.194,8.85Z"
                                style="fill:url(#a)"></path>
                            <path
                                d="M5.7,19.873l2.511-3.884-2.3-3.862H7.758L9.013,14.6c.116.234.2.408.238.524h.017c.082-.188.169-.369.26-.546l1.342-2.447h1.7l-2.359,3.84,2.419,3.905H10.821l-1.45-2.711A2.355,2.355,0,0,1,9.2,16.8H9.176a1.688,1.688,0,0,1-.168.351L7.515,19.873Z"
                                style="fill:#fff"></path>
                            <path d="M28.806,3H19.581V9.5H30V4.191A1.192,1.192,0,0,0,28.806,3Z" style="fill:#33c481">
                            </path>
                            <path d="M19.581,16H30v6.5H19.581Z" style="fill:#107c41"></path>
                        </g>
                    </svg>
                    Export Excel
                </button>
            </div>
            <div class="flex-none">
                <button
                    class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-red-700 bg-red-100 border border-transparent rounded hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                    wire:click="datatableExport('pdf')">
                    <svg viewBox="0 0 512 512" xml:space="preserve" width="16px" height="16px" fill="#000000"
                        class="mr-2">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <g>
                                <polygon style="fill:#B12A27;"
                                    points="475.435,117.825 475.435,512 47.791,512 47.791,0.002 357.613,0.002 412.491,54.881 ">
                                </polygon>
                                <rect x="36.565" y="34.295" style="fill:#F2F2F2;" width="205.097" height="91.768">
                                </rect>
                                <g>
                                    <g>
                                        <path style="fill:#B12A27;"
                                            d="M110.132,64.379c-0.905-2.186-2.111-4.146-3.769-5.804c-1.658-1.658-3.694-3.015-6.031-3.92 c-2.412-0.98-5.126-1.432-8.141-1.432H69.651v58.195h11.383V89.481h11.157c3.015,0,5.729-0.452,8.141-1.432 c2.337-0.905,4.372-2.261,6.031-3.92c1.659-1.658,2.865-3.543,3.769-5.804c0.829-2.186,1.282-4.523,1.282-6.935 C111.413,68.902,110.961,66.565,110.132,64.379z M97.844,77.118c-1.508,1.432-3.618,2.186-6.181,2.186H81.034V63.323h10.629 c2.563,0,4.674,0.754,6.181,2.261c1.432,1.432,2.186,3.392,2.186,5.804C100.031,73.726,99.277,75.686,97.844,77.118z">
                                        </path>
                                        <path style="fill:#B12A27;"
                                            d="M164.558,75.761c-0.075-2.035-0.151-3.844-0.377-5.503c-0.226-1.659-0.603-3.166-1.131-4.598 c-0.528-1.357-1.206-2.714-2.111-3.92c-2.035-2.94-4.523-5.126-7.312-6.483c-2.865-1.357-6.257-2.035-10.252-2.035h-20.956 v58.195h20.956c3.995,0,7.387-0.678,10.252-2.035c2.789-1.357,5.277-3.543,7.312-6.483c0.905-1.206,1.583-2.563,2.111-3.92 c0.528-1.432,0.905-2.94,1.131-4.598c0.226-1.658,0.301-3.468,0.377-5.503c0.075-1.96,0.075-4.146,0.075-6.558 C164.633,79.908,164.633,77.721,164.558,75.761z M153.175,88.2c0,1.734-0.151,3.091-0.302,4.297 c-0.151,1.131-0.377,2.186-0.678,2.94c-0.301,0.829-0.754,1.583-1.281,2.261c-1.885,2.412-4.749,3.543-8.518,3.543h-8.669V63.323 h8.669c3.769,0,6.634,1.206,8.518,3.618c0.528,0.678,0.98,1.357,1.281,2.186s0.528,1.809,0.678,3.015 c0.151,1.131,0.302,2.563,0.302,4.221c0.075,1.659,0.075,3.694,0.075,5.955C153.251,84.581,153.251,86.541,153.175,88.2z">
                                        </path>
                                        <path style="fill:#B12A27;"
                                            d="M213.18,63.323V53.222h-38.37v58.195h11.383V87.823h22.992V77.646h-22.992V63.323H213.18z">
                                        </path>
                                    </g>
                                    <g>
                                        <path style="fill:#B12A27;"
                                            d="M110.132,64.379c-0.905-2.186-2.111-4.146-3.769-5.804c-1.658-1.658-3.694-3.015-6.031-3.92 c-2.412-0.98-5.126-1.432-8.141-1.432H69.651v58.195h11.383V89.481h11.157c3.015,0,5.729-0.452,8.141-1.432 c2.337-0.905,4.372-2.261,6.031-3.92c1.659-1.658,2.865-3.543,3.769-5.804c0.829-2.186,1.282-4.523,1.282-6.935 C111.413,68.902,110.961,66.565,110.132,64.379z M97.844,77.118c-1.508,1.432-3.618,2.186-6.181,2.186H81.034V63.323h10.629 c2.563,0,4.674,0.754,6.181,2.261c1.432,1.432,2.186,3.392,2.186,5.804C100.031,73.726,99.277,75.686,97.844,77.118z">
                                        </path>
                                    </g>
                                </g>
                                <polygon style="opacity:0.08;fill:#040000;"
                                    points="475.435,117.825 475.435,512 47.791,512 47.791,419.581 247.705,219.667 259.54,207.832 266.098,201.273 277.029,190.343 289.995,177.377 412.491,54.881 ">
                                </polygon>
                                <polygon style="fill:#771B1B;" points="475.435,117.836 357.599,117.836 357.599,0 ">
                                </polygon>
                                <g>
                                    <path style="fill:#F2F2F2;"
                                        d="M414.376,370.658c-2.488-4.372-5.88-8.518-10.101-12.287c-3.467-3.166-7.538-6.106-12.137-8.82 c-18.544-10.93-45.003-16.207-80.961-16.207h-3.618c-1.96-1.809-3.995-3.618-6.106-5.503 c-13.644-12.287-24.499-25.63-32.942-40.48c16.584-36.561,24.499-69.126,23.519-96.867c-0.151-4.674-0.829-9.046-2.035-13.117 c-1.809-6.558-4.824-12.363-9.046-17.112c-0.075-0.075-0.075-0.075-0.151-0.151c-6.709-7.538-16.056-11.835-25.555-11.835 c-9.574,0-18.393,4.146-24.801,11.76c-6.332,7.538-9.724,17.866-9.875,30.002c-0.226,18.544,1.281,36.108,4.448,52.315 c0.301,1.282,0.528,2.563,0.829,3.844c3.166,14.7,7.84,28.645,13.87,41.611c-7.086,14.398-14.247,26.836-19.223,35.279 c-3.769,6.408-7.915,13.117-12.212,19.826c-19.373,3.468-35.807,7.689-50.129,12.966c-19.373,7.011-34.902,16.056-46.059,26.836 c-7.237,6.935-12.137,14.323-14.549,22.012c-2.563,7.915-2.412,15.83,0.452,22.916c2.638,6.558,7.387,12.061,13.72,15.83 c1.508,0.905,3.091,1.658,4.749,2.337c4.825,1.96,10.101,3.015,15.604,3.015c12.74,0,25.856-5.503,36.937-15.378 c20.655-18.469,41.988-48.169,54.577-66.94c10.327-1.583,21.559-2.94,34.224-4.297c14.926-1.508,28.118-2.412,40.104-2.865 c3.694,3.317,7.237,6.483,10.629,9.498c18.846,16.81,33.168,28.947,46.134,37.465c0,0.075,0.075,0.075,0.151,0.075 c5.126,3.392,10.026,6.181,14.926,8.443c5.503,2.563,11.081,3.92,16.81,3.92c7.237,0,14.021-2.186,19.675-6.181 c5.729-4.146,9.875-10.101,11.76-16.81C420.18,387.694,418.899,378.724,414.376,370.658z M247.705,219.667 c-1.055-9.348-1.508-19.072-1.357-29.324c0.151-9.724,3.694-16.283,8.895-16.283c3.92,0,8.066,3.543,9.95,10.327 c0.528,2.035,0.905,4.372,0.98,7.01c0.151,3.166,0.075,6.483-0.075,9.875c-0.452,9.574-2.111,19.75-4.975,30.681 c-1.734,7.011-3.995,14.323-6.784,21.936C251.173,243.186,248.911,231.803,247.705,219.667z M121.967,418.073 c-1.282-3.166,0.151-9.272,7.991-16.81c11.986-11.458,30.756-20.504,56.914-27.364c-4.975,6.784-9.875,12.966-14.624,18.619 c-7.237,8.744-14.172,16.132-20.429,21.71c-5.352,4.824-11.232,7.84-16.81,8.594c-0.98,0.151-1.96,0.226-2.94,0.226 C127.168,423.049,123.173,421.089,121.967,418.073z M242.428,337.942l0.528-0.829l-0.829,0.151 c0.151-0.377,0.377-0.754,0.603-1.055c3.166-5.352,7.161-12.212,11.458-20.127l0.377,0.829l0.98-2.035 c3.166,4.523,6.634,8.971,10.252,13.267c1.734,2.035,3.543,3.995,5.352,5.955l-1.206,0.075l1.055,0.98 c-3.091,0.226-6.332,0.528-9.574,0.829c-2.035,0.226-4.146,0.377-6.257,0.603C250.796,337.037,246.499,337.49,242.428,337.942z M369.297,384.98c-8.971-5.729-18.996-13.795-31.359-24.575c17.564,1.809,31.359,5.654,41.159,11.383 c4.297,2.488,7.538,5.051,9.724,7.538c3.618,3.844,4.9,7.312,4.221,9.649c-0.603,2.337-3.241,3.92-6.483,3.92 c-1.885,0-3.844-0.452-5.88-1.432c-3.468-1.658-7.086-3.694-10.93-6.181C369.598,385.282,369.448,385.131,369.297,384.98z">
                                    </path>
                                </g>
                            </g>
                        </g>
                    </svg>
                    Export PDF
                </button>
            </div>
        </div>
        <hr class="my-4 border-gray-200">
    @endif

    {{-- DATATABLE --}}
    <div class="flex flex-col sm:flex-row justify-between mb-4 space-y-3 sm:space-y-0 text-sm">
        @if ($showSelectPageLength)
            <div class="flex items-center">
                <select wire:model.live="length"
                    class="block w-20 py-1.5 pl-3 pr-8 text-sm text-gray-900 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 bg-gray-50">
                    @foreach ($lengthOptions as $item)
                        <option value="{{ $item }}">{{ $item }}</option>
                    @endforeach
                </select>
                <label class='ml-3 font-semibold text-gray-700 whitespace-nowrap'>Baris Per Lembar</label>
            </div>
        @endif
        @if ($showKeywordFilter)
            <div class="flex items-center w-full sm:w-64">
                <label class='mr-3 font-semibold text-gray-700 whitespace-nowrap'>Pencarian:</label>
                <input wire:model.live.debounce.300ms="search" type="text"
                    class="block w-full px-3 py-1.5 text-sm text-gray-900 border border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500 bg-gray-50">
            </div>
        @endif
    </div>

    @if ($showTotalData && $showTotalDataPosition == 'top')
        <div class="text-sm font-medium text-gray-700 mb-2 {{ $showTotalDataClass }}">Total Data:
            {{ number_format($data->total()) }}</div>
    @endif

    <div class="relative">
        <div wire:loading>
            <div class="absolute inset-0 z-20">
                <div class="w-full h-full bg-gray-400 opacity-20 rounded shadow-sm"></div>
            </div>
            <div class="absolute z-30 px-4 py-2 bg-white rounded shadow-md"
                style="top: 50%;left: 50%;transform: translate(-50%, -50%);">
                <div class="flex items-center text-sm font-medium text-gray-800">
                    <svg class="w-4 h-4 mr-2 text-gray-800 animate-spin" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                    Loading...
                </div>
            </div>
        </div>

        {{-- DESKTOP VIEW : TABLE --}}
        <div
            class="hidden md:block overflow-x-auto overflow-y-auto border border-gray-200 rounded max-h-[600px] shadow-sm">
            <table
                class="w-full text-sm text-left text-gray-700 border-collapse {{ $textWrap ? 'whitespace-normal' : 'whitespace-nowrap' }}">
                <thead class="sticky top-0 z-10 bg-white">
                    {{-- ROW : FILTER --}}
                    @if (count($filterColumn))
                        <tr class="border-b border-gray-200 bg-gray-50">
                            @foreach ($columns as $index => $col)
                                @if (isset($filterColumn[$index]))
                                    <th wire:key="filter-desktop-{{ $index }}"
                                        class="p-2 border-r border-gray-200 last:border-r-0 font-normal min-w-[150px]">
                                        @include('lara-pack.livewire-datatable::filter-tailwind', [
                                            'index' => $index,
                                            'filter' => $filterColumn[$index],
                                        ])
                                    </th>
                                @else
                                    <th wire:key="filter-desktop-empty-{{ $index }}"
                                        class="p-2 border-r border-gray-200 last:border-r-0 min-w-[150px]"></th>
                                @endif
                            @endforeach
                        </tr>
                    @endif

                    {{-- ROW : HEADER --}}
                    <tr class="shadow-[0_1px_0_0_#e5e7eb]">
                        @foreach ($columns as $index => $col)
                            @php
                                $header_style = '';
                                if (isset($col['header_style'])) {
                                    $header_style = is_callable($col['header_style'])
                                        ? call_user_func($col['header_style'])
                                        : $col['header_style'];
                                    $header_style = "style='{$header_style}'";
                                }

                                $header_class = '';
                                if (isset($col['header_class'])) {
                                    $header_class = is_callable($col['header_class'])
                                        ? call_user_func($col['header_class'])
                                        : $col['header_class'];
                                    $header_class = "class='{$header_class}'";
                                }
                            @endphp
                            <th {!! $header_class !!} {!! $header_style !!}
                                wire:key='datatable_header_{{ $index }}'
                                class="px-3 py-2 border-r border-gray-200 bg-gray-100 last:border-r-0 whitespace-nowrap">
                                @if (!isset($col['sortable']) || $col['sortable'])
                                    @php
                                        $isSortKey = $col['key'] == $sortBy;
                                        $isSortAscending = $sortDirection == 'asc';
                                    @endphp
                                    <button type="button"
                                        class='w-full flex items-center justify-between text-left focus:outline-none'
                                        wire:click="datatableSort('{{ $col['key'] }}')">
                                        <div class="flex items-center justify-between w-full font-bold">
                                            <div class='pr-2'>
                                                {!! $col['name'] !!}
                                            </div>
                                            <div class="flex-none">
                                                @if ($isSortKey)
                                                    @if ($isSortAscending)
                                                        <svg fill="#000000" height="12px" width="12px"
                                                            viewBox="0 0 301.219 301.219" xml:space="preserve">
                                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                stroke-linejoin="round"></g>
                                                            <g id="SVGRepo_iconCarrier">
                                                                <g>
                                                                    <path
                                                                        d="M149.365,262.736H10c-5.523,0-10,4.477-10,10v10c0,5.523,4.477,10,10,10h139.365c5.522,0,10-4.477,10-10v-10 C159.365,267.213,154.888,262.736,149.365,262.736z">
                                                                    </path>
                                                                    <path
                                                                        d="M10,229.736h120.586c5.522,0,10-4.477,10-10v-10c0-5.523-4.478-10-10-10H10c-5.523,0-10,4.477-10,10v10 C0,225.259,4.477,229.736,10,229.736z">
                                                                    </path>
                                                                    <path
                                                                        d="M10,166.736h101.805c5.522,0,10-4.477,10-10v-10c0-5.523-4.478-10-10-10H10c-5.523,0-10,4.477-10,10v10 C0,162.259,4.477,166.736,10,166.736z">
                                                                    </path>
                                                                    <path
                                                                        d="M10,96.736h83.025c5.522,0,10-4.477,10-10v-10c0-5.523-4.478-10-10-10H10c-5.523,0-10,4.477-10,10v10 C0,92.259,4.477,96.736,10,96.736z">
                                                                    </path>
                                                                    <path
                                                                        d="M10,33.736h64.244c5.522,0,10-4.477,10-10v-10c0-5.523-4.478-10-10-10H10c-5.523,0-10,4.477-10,10v10 C0,29.259,4.477,33.736,10,33.736z">
                                                                    </path>
                                                                    <path
                                                                        d="M298.29,216.877l-7.07-7.071c-1.875-1.875-4.419-2.929-7.071-2.929c-2.652,0-5.195,1.054-7.071,2.929l-34.394,34.393 V18.736c0-5.523-4.477-10-10-10h-10c-5.522,0-10,4.477-10,10v225.462l-34.394-34.393c-1.876-1.876-4.419-2.929-7.071-2.929 c-2.652,0-5.196,1.054-7.071,2.929l-7.07,7.071c-3.905,3.905-3.905,10.237,0,14.142l63.535,63.536 c1.876,1.875,4.419,2.929,7.071,2.929c2.652,0,5.195-1.054,7.071-2.929l63.535-63.536 C302.195,227.113,302.195,220.782,298.29,216.877z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    @else
                                                        <svg fill="#000000" height="12px" width="12px"
                                                            viewBox="0 0 301.219 301.219" xml:space="preserve">
                                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                stroke-linejoin="round"></g>
                                                            <g id="SVGRepo_iconCarrier">
                                                                <g>
                                                                    <path
                                                                        d="M159.365,23.736v-10c0-5.523-4.477-10-10-10H10c-5.523,0-10,4.477-10,10v10c0,5.523,4.477,10,10,10h139.365 C154.888,33.736,159.365,29.259,159.365,23.736z">
                                                                    </path>
                                                                    <path
                                                                        d="M130.586,66.736H10c-5.523,0-10,4.477-10,10v10c0,5.523,4.477,10,10,10h120.586c5.523,0,10-4.477,10-10v-10 C140.586,71.213,136.109,66.736,130.586,66.736z">
                                                                    </path>
                                                                    <path
                                                                        d="M111.805,129.736H10c-5.523,0-10,4.477-10,10v10c0,5.523,4.477,10,10,10h101.805c5.523,0,10-4.477,10-10v-10 C121.805,134.213,117.328,129.736,111.805,129.736z">
                                                                    </path>
                                                                    <path
                                                                        d="M93.025,199.736H10c-5.523,0-10,4.477-10,10v10c0,5.523,4.477,10,10,10h83.025c5.522,0,10-4.477,10-10v-10 C103.025,204.213,98.548,199.736,93.025,199.736z">
                                                                    </path>
                                                                    <path
                                                                        d="M74.244,262.736H10c-5.523,0-10,4.477-10,10v10c0,5.523,4.477,10,10,10h64.244c5.522,0,10-4.477,10-10v-10 C84.244,267.213,79.767,262.736,74.244,262.736z">
                                                                    </path>
                                                                    <path
                                                                        d="M298.29,216.877l-7.071-7.071c-1.875-1.875-4.419-2.929-7.071-2.929c-2.652,0-5.196,1.054-7.072,2.929l-34.393,34.393 V18.736c0-5.523-4.477-10-10-10h-10c-5.523,0-10,4.477-10,10v225.462l-34.393-34.393c-1.876-1.875-4.419-2.929-7.071-2.929 c-2.652,0-5.196,1.054-7.071,2.929l-7.072,7.071c-3.904,3.905-3.904,10.237,0,14.142l63.536,63.536 c1.953,1.953,4.512,2.929,7.071,2.929c2.559,0,5.119-0.976,7.071-2.929l63.536-63.536 C302.195,227.113,302.195,220.781,298.29,216.877z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    @endif
                                                @else
                                                    <svg fill="#D1D5DB" height="12px" width="12px"
                                                        viewBox="0 0 301.219 301.219" xml:space="preserve">
                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                            stroke-linejoin="round"></g>
                                                        <g id="SVGRepo_iconCarrier">
                                                            <g>
                                                                <path
                                                                    d="M149.365,262.736H10c-5.523,0-10,4.477-10,10v10c0,5.523,4.477,10,10,10h139.365c5.522,0,10-4.477,10-10v-10 C159.365,267.213,154.888,262.736,149.365,262.736z">
                                                                </path>
                                                                <path
                                                                    d="M10,229.736h120.586c5.522,0,10-4.477,10-10v-10c0-5.523-4.478-10-10-10H10c-5.523,0-10,4.477-10,10v10 C0,225.259,4.477,229.736,10,229.736z">
                                                                </path>
                                                                <path
                                                                    d="M10,166.736h101.805c5.522,0,10-4.477,10-10v-10c0-5.523-4.478-10-10-10H10c-5.523,0-10,4.477-10,10v10 C0,162.259,4.477,166.736,10,166.736z">
                                                                </path>
                                                                <path
                                                                    d="M10,96.736h83.025c5.522,0,10-4.477,10-10v-10c0-5.523-4.478-10-10-10H10c-5.523,0-10,4.477-10,10v10 C0,92.259,4.477,96.736,10,96.736z">
                                                                </path>
                                                                <path
                                                                    d="M10,33.736h64.244c5.522,0,10-4.477,10-10v-10c0-5.523-4.478-10-10-10H10c-5.523,0-10,4.477-10,10v10 C0,29.259,4.477,33.736,10,33.736z">
                                                                </path>
                                                                <path
                                                                    d="M298.29,216.877l-7.07-7.071c-1.875-1.875-4.419-2.929-7.071-2.929c-2.652,0-5.195,1.054-7.071,2.929l-34.394,34.393 V18.736c0-5.523-4.477-10-10-10h-10c-5.522,0-10,4.477-10,10v225.462l-34.394-34.393c-1.876-1.876-4.419-2.929-7.071-2.929 c-2.652,0-5.196,1.054-7.071,2.929l-7.07,7.071c-3.905,3.905-3.905,10.237,0,14.142l63.535,63.536 c1.876,1.875,4.419,2.929,7.071,2.929c2.652,0,5.195-1.054,7.071-2.929l63.535-63.536 C302.195,227.113,302.195,220.782,298.29,216.877z">
                                                                </path>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                @endif
                                            </div>
                                        </div>
                                    </button>
                                @else
                                    <div class="font-bold text-center">
                                        {!! $col['name'] !!}
                                    </div>
                                @endif
                            </th>
                        @endforeach
                    </tr>

                    {{-- ROW : HEADER SUMMARY --}}
                    @if (count($summary))
                        <tr class="bg-gray-50 border-b border-gray-200">
                            @foreach ($columns as $index => $col)
                                @if (isset($summary[$index]))
                                    <th wire:key="summary-desktop-{{ $index }}"
                                        class="px-3 py-2 italic font-semibold border-r border-gray-200 last:border-r-0 text-gray-900">
                                        {!! $summary[$index] !!}</th>
                                @else
                                    <th wire:key="summary-desktop-empty-{{ $index }}"
                                        class="px-3 py-2 border-r border-gray-200 last:border-r-0"></th>
                                @endif
                            @endforeach
                        </tr>
                    @endif
                </thead>
                <tbody class="bg-white">
                    @forelse ($data as $index => $item)
                        <tr wire:key="{{ uniqid('row-') }}" class="border-b border-gray-200 hover:bg-gray-50">
                            @foreach ($columns as $col)
                                @php
                                    $cell_style = '';
                                    if (isset($col['cell_style'])) {
                                        $cell_style = is_callable($col['cell_style'])
                                            ? call_user_func($col['cell_style'], $item, $index)
                                            : $col['cell_style'];
                                        $cell_style = "style='{$cell_style}'";
                                    }

                                    $cell_class = '';
                                    if (isset($col['cell_class'])) {
                                        $cell_class = is_callable($col['cell_class'])
                                            ? call_user_func($col['cell_class'], $item, $index)
                                            : $col['cell_class'];
                                        $cell_class = "class='{$cell_class}'";
                                    }
                                @endphp

                                @if (isset($col['render']) && is_callable($col['render']))
                                    <td {!! $cell_class !!} {!! $cell_style !!}
                                        class="px-3 py-2 border-r border-gray-200 last:border-r-0">
                                        {!! call_user_func($col['render'], $item, $index) !!}
                                    </td>
                                @elseif (isset($col['key']))
                                    <td {!! $cell_class !!} {!! $cell_style !!}
                                        class="px-3 py-2 border-r border-gray-200 last:border-r-0">
                                        {{ $item->{$col['key']} }}
                                    </td>
                                @endif
                            @endforeach
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ count($columns) }}"
                                class="px-3 py-4 text-center text-gray-500 italic border-b border-gray-200">
                                Tidak ada data yang ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- MOBILE VIEW : CARDS --}}
        <div class="block md:hidden space-y-4 mt-4">
            {{-- MOBILE FILTER --}}
            @if (count($filterColumn))
                <div x-data="{ openFilter: false }" class="mb-4">
                    <button @click="openFilter = !openFilter" type="button"
                        class="w-full flex justify-center items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded hover:bg-gray-50 shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="mr-2" viewBox="0 0 16 16">
                            <path
                                d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2z" />
                        </svg>
                        Filter Data
                    </button>
                    <div x-show="openFilter" x-transition style="display: none;"
                        class="mt-2 p-4 bg-white border border-gray-200 rounded-lg shadow-sm">
                        @foreach ($columns as $index => $col)
                            @if (isset($filterColumn[$index]))
                                <div wire:key="filter-mobile-{{ $index }}" class="mb-3 last:mb-0">
                                    <label
                                        class="block text-sm font-semibold text-gray-700 mb-1">{!! strip_tags($col['name']) !!}</label>
                                    @include('lara-pack.livewire-datatable::filter-tailwind', [
                                        'index' => $index,
                                        'filter' => $filterColumn[$index],
                                    ])
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- MOBILE CONTROLS (SORT & PAGINATION) --}}
            <div class="space-y-3 mb-4">
                <div class="flex space-x-2">
                    <div class="w-2/3">
                        <select wire:model.live="sortBy"
                            class="block w-full py-2 pl-3 pr-8 text-sm text-gray-900 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 bg-gray-50 shadow-sm">
                            <option value="">Urutkan Berdasarkan...</option>
                            @foreach ($columns as $col)
                                @if (!isset($col['sortable']) || $col['sortable'])
                                    @if (isset($col['key']))
                                        <option value="{{ $col['key'] }}">{!! strip_tags($col['name']) !!}</option>
                                    @endif
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="w-1/3">
                        <select wire:model.live="sortDirection"
                            class="block w-full py-2 pl-3 pr-8 text-sm text-gray-900 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 bg-gray-50 shadow-sm">
                            <option value="asc">A-Z</option>
                            <option value="desc">Z-A</option>
                        </select>
                    </div>
                </div>
                <div>
                    @if (method_exists($data, 'links'))
                        {{ $data->links() }}
                    @endif
                </div>
            </div>
            @forelse ($data as $index => $item)
                <div wire:key="{{ uniqid('card-') }}"
                    class="p-0 bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden">
                    <div class="space-y-2 p-4">
                        @php
                            $actionColumn = null;
                            $regularColumns = [];
                            foreach ($columns as $col) {
                                $colNameLower = strtolower(strip_tags($col['name']));
                                if (
                                    $colNameLower === 'aksi' ||
                                    $colNameLower === 'action' ||
                                    $colNameLower === 'tindakan'
                                ) {
                                    $actionColumn = $col;
                                } else {
                                    $regularColumns[] = $col;
                                }
                            }
                        @endphp

                        @foreach ($regularColumns as $col)
                            @php
                                $cell_style = '';
                                if (isset($col['cell_style'])) {
                                    $cell_style = is_callable($col['cell_style'])
                                        ? call_user_func($col['cell_style'], $item, $index)
                                        : $col['cell_style'];
                                    $cell_style = "style='{$cell_style}'";
                                }

                                $cell_class = '';
                                if (isset($col['cell_class'])) {
                                    $cell_class = is_callable($col['cell_class'])
                                        ? call_user_func($col['cell_class'], $item, $index)
                                        : $col['cell_class'];
                                    $cell_class = "class='{$cell_class}'";
                                }
                            @endphp
                            <div class="py-2 border-b border-gray-100 last:border-b-0">
                                <label
                                    class="block text-[10px] font-bold text-gray-500 uppercase tracking-wider mb-1">{!! $col['name'] !!}</label>
                                <div class="text-sm text-gray-900 break-words overflow-x-auto {!! str_replace("class='", '', str_replace("'", '', $cell_class)) !!}"
                                    {!! $cell_style !!} style="-webkit-overflow-scrolling: touch;">
                                    @if (isset($col['render']) && is_callable($col['render']))
                                        {!! call_user_func($col['render'], $item, $index) !!}
                                    @elseif (isset($col['key']))
                                        {{ $item->{$col['key']} }}
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if ($actionColumn)
                        @php
                            $cell_class = '';
                            if (isset($actionColumn['cell_class'])) {
                                $cell_class = is_callable($actionColumn['cell_class'])
                                    ? call_user_func($actionColumn['cell_class'], $item, $index)
                                    : $actionColumn['cell_class'];
                            }
                        @endphp
                        <div
                            class="bg-gray-50 border-t border-gray-200 p-3 flex flex-col gap-2 {!! str_replace("class='", '', str_replace("'", '', $cell_class)) !!}">
                            @if (isset($actionColumn['render']) && is_callable($actionColumn['render']))
                                {!! call_user_func($actionColumn['render'], $item, $index) !!}
                            @elseif (isset($actionColumn['key']))
                                {{ $item->{$actionColumn['key']} }}
                            @endif
                        </div>
                    @endif
                </div>
            @empty
                <div class="p-4 text-center text-gray-500 italic bg-white border border-gray-200 rounded-lg shadow-sm">
                    Tidak ada data yang ditemukan.
                </div>
            @endforelse
        </div>
    </div>

    <div class="flex flex-col sm:flex-row justify-between items-center mt-4">
        <div class="mb-3 sm:mb-0">
            @if ($showTotalData && $showTotalDataPosition == 'bottom')
                <div class="text-sm font-medium text-gray-700 {{ $showTotalDataClass }}">Total Data:
                    {{ number_format($data->total()) }}</div>
            @endif
        </div>
        <div>
            @if (method_exists($data, 'links'))
                {{ $data->links() }}
            @endif
        </div>
    </div>
</div>
