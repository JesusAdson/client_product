<div class="row">
    <div class="col-md-5">
        <label><strong>Selecione um ou mais produtos</strong></label><br/>
        <select class="form-control" name="products[]" id="products" multiple="multiple">
            @foreach($products as $product)
                <option value="{{ $product['id'] }}">{{ $product['name'] }}</option>
            @endforeach
          </select>
    </div>
</div>