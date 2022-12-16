<label for="name" class="peer">
    <input type="text" class="border rounded valid:outline-amber-300 px-5 text-sm py-3 placeholder:text-gray-800 w-full peer-focus:outline-red-700 invalid:outline-red-700 @error('name') border-red-700 @else border-gray-300 @enderror" placeholder="Enter Username" name="name" id="name" value="{{ old('name') ?? $user->name }}">
    @error('name')
        <span class="text-xs text-red-600 mb-2">{{ $message }}</span>
    @enderror
</label>

@csrf