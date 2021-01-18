
@php
    $ti = $title ?? "";
    $ty = $type ?? "text";
    $ph = $placeholder ?? "";
    $rq = $required ?? "false";
    $val = $value ?? "";
    $ids = $id ?? "";
    $pt = $pattern ?? "";
@endphp

<div {{ $attributes->merge(['class' => 'block text-sm mt-4']) }}>
    <label class="block text-sm font-medium text-gray-700">{{ $ti }}</label>
    <div class="mt-1">
        <input
        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
        placeholder="{{ $ph }}"
        {{-- required="{{ $rq }}" --}}
        type="{{ $ty }}" name="{{ $name }}"
        value="{{ $val }}"
        id="{{ $ids }}"
        @if(!empty($pt))
        pattern="{{ $pt }}"
        @endif
        required="{{ $rq }}"
        />
        @error($name)
        <span class="text-red-500 italic text-xs">
            {{ $message }}
        </span>
        @enderror
    </div>
</div>
