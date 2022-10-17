{{-- @formatter:off --}}
@php /** @var \App\Models\Action $action */ @endphp

<x-mail::message>
## {{ $action->data['title'] }}

{{ $action->data['content'] }}

{{-- No button --}}
@php($params = ['name' => $action->name, 'score' => $action->data['no'], 'module' => 'YesNo'])
<x-mail::button :url="route('module.submit-action', $params)">
No
</x-mail::button>
{{--/ No button --}}

{{-- Yes button --}}
@php($params = ['name' => $action->name, 'score' => $action->data['yes'], 'module' => 'YesNo'])
<x-mail::button :url="route('module.submit-action', $params)">
Yes
</x-mail::button>
{{--/ Yes button --}}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
