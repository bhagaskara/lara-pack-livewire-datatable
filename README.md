# Lara-Pack Livewire Datatable

A powerful, highly responsive, and feature-rich Datatable component built for Laravel Livewire. This package allows you to quickly build robust data tables with global search, column-specific filters, sorting, Excel/PDF exports, and an adaptive mobile-friendly card layout.

Compatible with **Bootstrap 4**, **Bootstrap 5**, and **Tailwind CSS**.

## Installation

You can install the package via composer:

```bash
composer require lara-pack/livewire-datatable
```

The package will automatically register its service provider.

## Dependencies

This package relies on several underlying libraries:

- `livewire/livewire` (^3.0 || ^4.0)
- `lara-pack/livewire-select2`
- `lara-pack/livewire-date-range-picker`
- `barryvdh/laravel-dompdf` (for PDF export)
- `maatwebsite/excel` (for Excel export)

## Usage

To create a datatable, use the `WithDatatable` trait in your Livewire component. You need to implement three required methods:

1. `datatableData()`: Return the Eloquent query or paginated data.
2. `datatableColumns()`: Return the structure and configuration of the columns.
3. `datatableView()`: Return the path to the chosen table layout.

### Basic Example

```php
namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use LaraPack\LivewireDatatable\WithDatatable;

class UsersTable extends Component
{
    use WithDatatable;

    public function datatableData()
    {
        // Return your Eloquent Query base (the trait handles paginate automatically)
        return User::query();
    }

    public function datatableColumns()
    {
        return [
            [
                'name' => 'Name',
                'key' => 'name',
                'sortable' => true,
                'searchable' => true,
                'filter' => 'text', // Generates a text filter above column
            ],
            [
                'name' => 'Email',
                'key' => 'email',
                'sortable' => true,
                'filter' => 'email',
            ],
            [
                'name' => 'Status',
                'key' => 'status',
                'sortable' => false,
                'filter' => [
                    'type' => 'select',
                    'options' => [
                        ['id' => 'active', 'text' => 'Active'],
                        ['id' => 'inactive', 'text' => 'Inactive'],
                    ]
                ],
                'render' => function ($item) {
                    return $item->status == 'active' ? 'Active' : 'Inactive';
                }
            ],
            [
                'name' => 'Action', // Will map nicely to the mobile card layout's footer
                'sortable' => false,
                'searchable' => false,
                'render' => function ($item) {
                    return '<button class="btn btn-sm btn-primary">Edit</button>';
                }
            ]
        ];
    }

    public function datatableView()
    {
        // Choose based on your CSS framework.
        // Available preset layouts:
        // - 'lara-pack.livewire-datatable::table-bootstrap5'
        // - 'lara-pack.livewire-datatable::table-bootstrap4'
        // - 'lara-pack.livewire-datatable::table-tailwind'

        return 'lara-pack.livewire-datatable::table-bootstrap5';
    }
}
```

## Features

### Advanced Column Filters

You can apply different input filter interfaces per column. The built-in types include:

- `text`, `number`, `email`, `date`, `datetime-local`, `time`, `tel`
- `select` (Native array options)
- `select2` (Leverages `lara-pack/livewire-select2` for AJAX searching)
- `date-range-picker` (Leverages `lara-pack/livewire-date-range-picker`)

```php
'filter' => [
    'type' => 'select2',
    'url' => route('api.roles.search'),
    'multiple' => false,
]
```

### Mobile Card View Layout

The table is fully responsive out-of-the-box. On small viewports (like mobile phones), the table visually transforms into a clean stacked "Card" layout.

- Top-level pagination handles mobile interaction flawlessly.
- Action column buttons (column names containing "Aksi", "Action", or "Tindakan") automatically remap to the card footer with proper styling.
- Expanding column filter menus are nicely integrated inside a dedicated toggleable button.

### Component Properties Configuration

Override public properties in your component to customize table behavior:

```php
public $lengthOptions = [10, 25, 50, 100]; // Pagination dropdown choices
public $length = 10; // Default limit
public $showKeywordFilter = true; // Show/Hide global search bar
public $showSelectPageLength = true; // Show/Hide pagination limit dropdown
```

## Authors

- **Bhagaskara** - bhagaskaraliancer@gmail.com

## License

This project is licensed under the MIT License.
