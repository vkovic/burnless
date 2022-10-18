{{-- @formatter:off --}}
@php /** @var \App\Models\Action $action */ @endphp

<x-mail::message>
## {{ $action->data['title'] }}

{{ $action->data['content'] }}

@foreach(range(1, 5) as $i)
@php($params = ['name' => $action->name, 'score' => $i, 'module' => 'Score'])
<x-mail::button :url="route('action.submit', $params)">
{{ $i }}
</x-mail::button>
@endforeach

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
