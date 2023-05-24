@php
    $class_str = $class ?? '';
    $classText = 'rounded placeholder-gray-600 p-2 w-full text-stone-950 outline-0 focus:border-blue-600 ' . $class_str;
@endphp


<input type={{$type}} placeholder={{"$placeholder"}} name={{$name}} id={{$id ?? $name}} class="{{$classText}}" value="{{$value ?? ''}}"/>
