<div class="row">
    <div class="col-md-3">
        <input type="text" value="{{ $product->name ?? old('name') }}" class="form-control" id="name" placeholder="Nome" name="name">
        @if($errors->has('name'))
            <small class="text-danger">{{ $errors->first('name') }}</small>
        @endif
    </div>
    <div class="col-md-3">
        <input type="text" value="{{ $product->value ?? old('value') }}" name="value" id="value" class="form-control" placeholder="Preço. Ex: 11.11">
        @if($errors->has('value'))
            <small class="text-danger">{{ $errors->first('value') }}</small>
        @endif
    </div>
    <div class="col-md-3">
        <input type="text" value="{{ $product->description ?? old('description') }}" id="description" id="description" name="description" class="form-control" placeholder="Descrição">
        @if($errors->has('description'))
            <small class="text-danger">{{ $errors->first('description') }}</small>
        @endif
    </div>
</div>