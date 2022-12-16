@props(['items', 'selected'])

@php
    $arr_items = json_decode($items);          
@endphp

<select {!! $attributes->merge(['class' => 'mt-1 border border-gray-300 rounded-md block w-full']) !!}>
    <option value = "-">-- Select Items --</option>
    @foreach ($arr_items as $item)
        @if ($item->id == $selected)
            <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
        @else
            <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endif        
    @endforeach
</select>
