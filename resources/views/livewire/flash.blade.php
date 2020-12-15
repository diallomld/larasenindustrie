<div x-data="{ open: false}" @flash-message.window="open=true; setTimeout(()=> open = false, 7000);">
    
    <div x-show="open" x-cloak class="border-2 mt-2 shadow {{ $type ? $colors[$type]:'+'}}">
        {{$message}}
    <div>
</div>
