<label for="name" class="peer">
    <input type="text" class="border rounded valid:outline-amber-300 px-5 text-sm py-3 placeholder:text-gray-800 w-full peer-focus:outline-red-700 invalid:outline-red-700 @error('name') border-red-700 @else border-gray-300 @enderror" placeholder="Enter Username" name="name" id="name" value="{{ old('name') ?? $user->name }}">
    @error('name')
        <span class="text-xs text-red-600 mb-2">{{ $message }}</span>
    @enderror
</label>

<label for="email" class="peer">
    <input type="email" class="border rounded valid:outline-amber-300 px-5 text-sm py-3 placeholder:text-gray-800 w-full peer-focus:outline-red-700 invalid:outline-red-700 @error('email') border-red-700 @else border-gray-300 @enderror" placeholder="Enter Working email address" name="email" id="email" value="{{ old('email') ?? $user->email }}">
    @error('email')
        <span class="text-xs text-red-600 mb-2">{{ $message }}</span>
    @enderror
</label>


<label for="password" class="peer">
    <input type="password" class="border rounded valid:outline-amber-300 px-5 text-sm py-3 placeholder:text-gray-800 w-full peer-focus:outline-red-700 invalid:outline-red-700 @error('email') border-red-700 @else border-gray-300 @enderror" placeholder="Enter Working email address" name="password" id="password">

    <small class="text-xs text-slate-500">
        Password must be at least 8 characters long <br>
        at least one letter, one special character and one number
    </small>
    @error('password')
        <span class="text-xs text-red-600 mb-2">{{ $message }}</span>
    @enderror
</label>
@csrf