<label for="title" class="peer">
    <input type="text" class="border rounded valid:outline-amber-300 px-5 text-sm py-3 placeholder:text-gray-800 w-full peer-focus:outline-red-700 invalid:outline-red-700 @error('title') border-red-700 @else border-gray-300 @enderror" placeholder="Enter Posts title" name="title" id="title" value="{{ old('title') ?? $post->title }}">
    @error('title')
        <span class="text-xs text-red-600 mb-2">{{ $message }}</span>
    @enderror
</label>

<label for="slug" class="peer">
    <input readonly type="text" class="border @error('slug') border-red-700 @else border-gray-300 @enderror rounded valid:outline-amber-300 px-5 text-sm py-3 placeholder:text-gray-800 w-full peer-focus:outline-red-700 invalid:outline-red-700" placeholder="Start Tying the posts title" name="slug" id="slug" value="{{ old('slug') ?? $post->slug }}">

    @error('slug')
        <span class="text-xs text-red-600 mb-2">{{ $message }}</span>
    @enderror
</label>

<label for="status" class="peer">

    <select class="border @error('status') border-red-700 @else border-gray-300 @enderror rounded valid:outline-amber-300 px-5 text-sm py-3 placeholder:text-gray-800 w-full peer-focus:outline-red-700 invalid:outline-red-700" placeholder="Enter Posts title" name="status" id="status">
        <option value="" disabled>Please Select an Option</option>
        <option @if($post->status !== null && strtolower($post->status) === 'published') selected @endif value="published">Published</option>
        <option @if($post->status !== null && strtolower($post->status) === 'drafts') selected @endif value="drafts">Drafts</option>
    </select>

    @error('status')
        <span class="text-xs text-red-600 mb-2">{{ $message }}</span>
    @enderror
    
</label>

<label for="excerpt" class="peer">
    <textarea rows="8" cols="10" class="border @error('excerpt') border-red-700 @else border-gray-300 @enderror rounded  px-5 text-sm py-3 placeholder:text-gray-800 w-full valid:outline-amber-300 peer-focus:outline-red-700 invalid:outline-red-600" placeholder="Enter Excerpt" name="excerpt" id="excerpt">{{ old('excerpt') ?? $post->excerpt }}</textarea>

    @error('excerpt')
        <span class="text-xs text-red-600 mb-2">{{ $message }}</span>
    @enderror
</label>
<label for="body" class="peer">
    <textarea rows="13" cols="10" class="border @error('body') border-red-700 @else border-gray-300 @enderror rounded  px-5 text-sm py-3 placeholder:text-gray-800 w-full valid:outline-amber-300 peer-focus:outline-red-700 invalid:outline-red-600" placeholder="Enter Body" name="body" id="body">{{ old('body') ?? $post->body }}</textarea>

    @error('body')
        <span class="text-xs text-red-600 mb-2">{{ $message }}</span>
    @enderror
</label>

<label for="image">
    <input type="file" class="file:bg-blue-600  @error('image') border-red-700 @else border-gray-300 @enderror file:text-white file:font-Poppins file:rounded-lg file:px-4 file:text-sm file:py-3 file:cursor-pointer" name="image" id="image">

    @error('image')
        <span class="text-xs text-red-600 mb-2">{{ $message }}</span>
    @enderror
</label>


@csrf

