@if (count($activity->changes['after']) == 1)
	{{ $activity->user->name }} updated the {{ key($activity->changes['after'])}} of a fence
@else
	{{ $activity->user->name }} updated a fence
@endif