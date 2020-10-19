<div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right">{{ $title }}</label>

    <div class="col-md-6">
        <input type="text" class="form-control @error({{ $name }}) is-invalid @enderror" name="{{ $name }}" required>

        @error($name)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>