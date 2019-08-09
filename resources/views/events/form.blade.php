@csrf

<div class="mb-4">
	<label class="text-sm mb-2 block" for="title">Title</label>
	<div class="control">
		<input 
		type="text" 
		class="bg-transparent border border-grey-light rounded p-2 text-xs w-full" 
		name="title" 
		placeholder="My Awesome Event"
		required
		value="{{ $event->title }}">
	</div>
</div>
<div class="mb-4">
	<label class="text-sm mb-2 block" for="description">Description</label>
	<div>
		<textarea 
		name="description"
		rows="10"
		class="textarea bg-transparent border border-grey-light rounded p-2 text-xs w-full"
		placeholder="I'm a really good event"
		required>{{ $event->description }}</textarea>
	</div>
</div>
<div>
	<div>
		<button type="submit" class="w-full bg-brand-green text-white text-base px-4 py-2 rounded shadow hover:bg-teal-700
focus:outline-none focus:shadow-outline">{{ $buttonText }}</button>
	</div>
</div>

@if ($errors->any())
	<div class="field mt-6">
	@foreach ($errors->all() as $error)
		<li class="text-sm text-red-500">{{ $error }}</li>
	@endforeach
	</div>
@endif	

