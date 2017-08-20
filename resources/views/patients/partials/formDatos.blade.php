<div class="form-group"><label class="col-sm-2 control-label">Nombre</label>
    <div class="col-sm-10"><input type="text" name="name" class="form-control" value="{{ old('name', $patient->name) }}"></div>
</div>
<div class="form-group"><label class="col-sm-2 control-label">Edad</label>
    <div class="col-sm-10"><input type="number" name="age" class="form-control" value="{{ old('age', $patient->age) }}"></div>
</div>
<div class="form-group"><label class="col-sm-2 control-label">Telefono</label>
    <div class="col-sm-10"><input type="text" name="phone" class="form-control" value="{{ old('phone', $patient->phone ) }}" ></div>
</div>
<div class="form-group"><label class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10"><input type="email" name="email" class="form-control" value="{{ old('email', $patient->email )  }}"></div>
</div>
<div class="form-group"><label class="col-sm-2 control-label">Peso</label>
    <div class="col-sm-10">
        <div class="input-group">
            <input type="number" class="form-control" name="weight" value="{{ old('weight',$patient->getWeight()) }}">
            <span class="input-group-addon">Kg</span>
        </div>
    </div>
</div>
<div class="form-group"><label class="col-sm-2 control-label">Altura</label>
    <div class="col-sm-10">
        <div class="input-group">
            <input type="number" class="form-control" name="height" value="{{ old('height', $patient->getHeight()) }}">
            <span class="input-group-addon">cm</span>
        </div>
    </div>
</div>