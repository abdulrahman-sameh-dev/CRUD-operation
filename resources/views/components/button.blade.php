{{-- resources/views/components/button.blade.php --}}
@props([
    'variant' => 'default',
    'size' => 'default',
    'href' => null {{-- Add href prop with a null default --}}
])

@php
    $baseClasses = 'inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50';
    
    $variants = [
        'default'     => 'bg-slate-900 text-slate-50 shadow hover:bg-slate-950 dark:bg-slate-50 dark:text-slate-900 dark:hover:bg-slate-50/90',
        'destructive' => 'bg-red-500 text-slate-50 shadow-sm hover:bg-red-600 dark:bg-red-900 dark:text-slate-50 dark:hover:bg-red-900',
        'outline'     => 'border border-slate-200 bg-transparent shadow-sm hover:bg-slate-100 hover:text-slate-900 dark:border-slate-800 dark:hover:bg-slate-800 dark:hover:text-slate-50',
        'secondary'   => 'bg-slate-100 text-slate-900 shadow-sm hover:bg-slate-200 dark:bg-slate-800 dark:text-slate-50 dark:hover:bg-slate-800/80',
        'ghost'       => 'hover:bg-slate-100 hover:text-slate-900 dark:hover:bg-slate-800 dark:hover:text-slate-50',
        'link'        => 'text-slate-900 underline-offset-4 hover:underline dark:text-slate-50',
    ];

    $sizes = [
        'default' => 'h-9 px-4 py-2',
        'sm'      => 'h-8 rounded-md px-3 text-xs',
        'lg'      => 'h-10 rounded-md px-8',
        'icon'    => 'h-9 w-9',
    ];

    $classes = $baseClasses . ' ' . ($variants[$variant] ?? $variants['default']) . ' ' . ($sizes[$size] ?? $sizes['default']);
@endphp

{{-- Conditionally render an <a> tag or a <button> tag --}}
@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif




