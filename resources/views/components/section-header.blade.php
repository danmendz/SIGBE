@props(['title'])

<h2 {{ $attributes->merge(['class' => 'text-2xl font-bold text-green-600 mb-4 border-l-4 border-green-600 pl-3']) }}>
    {{ $title }}
</h2>
