<div class="row">
    <div class="col-md-3">
        <input type="text" value="{{ $client->name ?? old('name') }}" class="form-control" id="name" placeholder="Nome" name="name">
        @if($errors->has('name'))
            <small class="text-danger">{{ $errors->first('name') }}</small>
        @endif
    </div>
    <div class="col-md-3">
        <input type="email" value="{{ $client->email ?? old('email') }}" name="email" id="email" class="form-control" placeholder="Email">
        @if($errors->has('email'))
            <small class="text-danger">{{ $errors->first('email') }}</small>
        @endif
    </div>
    <div class="col-md-3">
        <input type="text" value="{{ $client->phone ?? old('phone') }}" id="phone" id="phone" name="phone" class="form-control" placeholder="Telefone">
        @if($errors->has('phone'))
            <small class="text-danger">{{ $errors->first('phone') }}</small>
        @endif
    </div>
</div>