<?php

return [
    /**
     * ディレクトリ
     */
    'directories' => [
        'app/Http/Livewire',
        'resources/views/livewire',
    ],

    /**
     * コピーファイル
     */
    'copies' => [
        __DiR__ . '/../Stubs/ZipCodeAutoFillForm.php.stub' => app_path('Http/Livewire/') . 'ZipCodeAutoFillForm.php',
        __DiR__ . '/../Stubs/zip-code-auto-fill-form.blade.php.stub' => base_path('resources/views/livewire/') . 'zip-code-auto-fill-form.blade.php',
    ],
];
