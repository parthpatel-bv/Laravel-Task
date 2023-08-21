<x-mail::message>

Hi, you have just changed the status of a Chapter.

Chapter ID: {{ $chapter->id }}
Chapter Name: {{ $chapter->chapter }}
Status: {{ $chapter->status ? 'Active' : 'Inactive' }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
