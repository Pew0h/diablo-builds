<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://lh3.googleusercontent.com/fJHhsE6XmKrR26RPgYiww59GJqIzSFn00yXKcdMNHxHYvZFyD7q6ARa0oVbBqoxBCA=s300" class="logo" alt="Laravel Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
