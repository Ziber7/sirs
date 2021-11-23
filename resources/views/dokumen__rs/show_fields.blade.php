<!-- Nomor Field -->
<div class="col-sm-12">
    {!! Form::label('nomor', 'Nomor:') !!}
    <p>{{ $dokumenRS->nomor }}</p>
</div>

<!-- Nama Field -->
<div class="col-sm-12">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{{ $dokumenRS->nama }}</p>
</div>

<!-- Deskripsi Field -->
<div class="col-sm-12">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    <p>{{ $dokumenRS->deskripsi }}</p>
</div>

<!-- File Field -->
<div class="col-sm-12">
    {!! Form::label('file', 'File:') !!}
    <p>{{ $dokumenRS->file }}</p>
    <a href="{{ url($dokumenRS->file) }}" class="btn btn-dark" download>Download File</a>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $dokumenRS->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $dokumenRS->updated_at }}</p>
</div>

