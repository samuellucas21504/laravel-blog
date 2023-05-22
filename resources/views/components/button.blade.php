@php
    $classString = "text-xl " . $class
@endphp

<button class="{{$classString}}" type="{{$type ?? "submit"}}">
    {{$slot}}
</button>
