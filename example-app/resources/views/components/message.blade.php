@props(['message'])
@if ($message)
    <div class="p-4 m-2 rounded bg-green-100">
        {{ $message }}
        <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
    </div>
@endif
