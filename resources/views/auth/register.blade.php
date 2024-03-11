<form method="POST" action="{{ route('register') }}">
    @csrf

    <div>
        <label for="name">Name</label>
        <input id="name" type="text" name="name" required autofocus>
    </div>

    <div>
        <label for="email">Email</label>
        <input id="email" type="email" name="email" required>
    </div>

    <div>
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required autocomplete="new-password">
    </div>

    <div>
        <label for="password_confirmation">Confirm Password</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required>
    </div>

    <div>
        <label for="category">Category</label>
        <select name="category_id" id="category">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="role">Role</label>
        <select name="role" id="role">
            <option value="reader">Reader</option>
            <option value="editor">Editor</option>
            <option value="writer">Writer</option>
        </select>
    </div>

    <div>
        <button type="submit">Register</button>
    </div>
</form>
