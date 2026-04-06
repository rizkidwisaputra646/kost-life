@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-2 border-emerald-500 bg-white text-black focus:border-emerald-500 focus:ring-0 rounded-xl shadow-sm transition-all duration-200']) }}>