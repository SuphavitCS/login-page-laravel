<form action="{{ Route('register') }}" method="POST">
    @csrf
    <div><label for="name">Username: </label>
        <input type="text" id="name" name="name" required value="{{ old('name') }}">
    </div>
    <div> <label for="email">Email: </label>
        <input type="email" name="email" id="email" required value="{{old('email')}}">
    </div>
    <div> <label for="password">Password: </label>
        <input type="password" name="password" id="password" required>
    </div>

    <button>submit</button>
</form>