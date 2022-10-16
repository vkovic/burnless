<x-mail::message>
## {{ $title }}

{{ $content }}

@foreach(range(1, 5) as $i)
@php($params = ['type' => $type, 'score' => $i, 'module' => 'score'])
<x-mail::button :url="route('module.submit', $params)">
{{ $i }}
</x-mail::button>
@endforeach

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
