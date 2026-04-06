@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-emerald-500']) }}>
    {{ $value ?? $slot }}
</label>
