<div class="table-responsive">
    <table class="table" id="ruangs-table">
        <thead>
            <tr>
                <th>Kode Ruang</th>
        <th>Nama Ruang</th>
        <th>Jenis Ruang</th>
        <th>Keterangan</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($ruangs as $ruang)
            <tr>
                <td>{{ $ruang->kode_ruang }}</td>
            <td>{{ $ruang->nama_ruang }}</td>
            <td>{{ $ruang->jenis_ruang }}</td>
            <td>{{ $ruang->keterangan }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['ruangs.destroy', $ruang->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('ruangs.show', [$ruang->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('ruangs.edit', [$ruang->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
