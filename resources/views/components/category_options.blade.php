@forelse ($categories as $category)
    <option value="{{ $category->id }}" {{ $selected == $category->id ? 'selected' : '' }}>
        {{ $category->name }}</option>
@empty
@endforelse
