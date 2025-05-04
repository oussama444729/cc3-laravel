<h3>Authentification</h3>

<form method="POST" action="{{ route('login') }}">
       @csrf
       <div class="mb-3">
           <label  class="form-label">Login</label>
           <input type="text" name="login" class="form-control" value="{{ old('login')}}" required>
           @if ($errors->has('login'))
               <div class="alert alert-danger">
                    {{ $errors->first('login') }}
               </div>
           @endif
       </div>
       <div class="mb-3">
        <label  class="form-label">Mot de pass</label>
        <input type="password" name="password" class="form-control">
    </div>
    <div>
        <button class="btn btn-primary"> Se connectre</button>
    </div>
</form>