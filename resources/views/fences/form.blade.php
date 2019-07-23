@csrf

<div class="field mb-6">
	<label class="label text-sm mb-2 block" for="tag">Tag</label>
	<div class="control">
		<input 
		type="text" 
		class="input bg-transparent border border-grey-light rounded p-2 text-xs w-full" 
		name="tag" 
		placeholder="Town Square"
		required
		value="{{ $fence->tag }}">
	</div>
</div>
<div class="field mb-6">
	<label class="label text-sm mb-2 block" for="latitude">Latitude</label>
	<div class="control">
		<input 
		type="text" 
		class="input bg-transparent border border-grey-light rounded p-2 text-xs w-full" 
		name="latitude" 
		placeholder="51.509865"
		required
		value="{{ $fence->latitude }}">
	</div>
</div>
<div class="field mb-6">
	<label class="label text-sm mb-2 block" for="longitude">Longitude</label>
	<div class="control">
		<input 
		type="text" 
		class="input bg-transparent border border-grey-light rounded p-2 text-xs w-full" 
		name="longitude" 
		placeholder="-0.118092"
		required
		value="{{ $fence->longitude }}">
	</div>
</div>
<div class="field">
	<div class="control">
		<button type="submit" class="btn-blue mr-2">{{ $buttonText }}</button>
		<a href="{{ $event->path() }}">Cancel</a>
	</div>
</div>

@if ($errors->any())
	<div class="field mt-6">
	@foreach ($errors->all() as $error)
		<li class="text-sm text-red-500">{{ $error }}</li>
	@endforeach
	</div>
@endif	