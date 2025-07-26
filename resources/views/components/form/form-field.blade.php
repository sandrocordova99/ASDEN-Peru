<div @isset($divClass) class="{{ $divClass }}" @endisset>

    @isset($label)
    <label for="{{ $for }}" class="block text-sm font-medium text-gray-700 mb-1">{{ $label }}</label>
    @endisset

    {{ $slot }}
    <div id="{{ $for }}-error" class="error-message text-red-500 text-sm mt-1 h-[20px]"></div>
</div>