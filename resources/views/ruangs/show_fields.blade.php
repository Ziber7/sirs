<!-- Kode Ruang Field -->
<div class="col-sm-12">
    {!! Form::label('kode_ruang', 'Kode Ruang:') !!}
    <p>{{ $ruang->kode_ruang }}</p>
</div>

<!-- Nama Ruang Field -->
<div class="col-sm-12">
    {!! Form::label('nama_ruang', 'Nama Ruang:') !!}
    <p>{{ $ruang->nama_ruang }}</p>
</div>

<!-- Jenis Ruang Field -->
<div class="col-sm-12">
    {!! Form::label('jenis_ruang', 'Jenis Ruang:') !!}
    <p>{{ $ruang->jenis_ruang }}</p>
</div>

<!-- Keterangan Field -->
<div class="col-sm-12">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    <p>{{ $ruang->keterangan }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $ruang->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $ruang->updated_at }}</p>
</div>

