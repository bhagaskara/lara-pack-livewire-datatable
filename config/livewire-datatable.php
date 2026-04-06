<?php

return [
    'theme' => 'bootstrap5', // bootstrap4 , bootstrap5, tailwind
    'table_content_text_wrap' => false,
    'query_wildcard_operator' => env('QUERY_WILDCARD_OPERATOR', 'LIKE'),
    'mobile_responsive' => true, // true: tampilan otomatis berubah ke card pada layar kecil, false: selalu tampilkan tabel
];
