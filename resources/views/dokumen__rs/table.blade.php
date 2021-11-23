<div class="table-responsive">
    <table class="table" id="dokumenRs-table">
        <thead>
            <tr>
                <th>Nomor</th>
        <th>Nama</th>
        <th>Deskripsi</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($dokumenRs as $dokumenRS)
            <tr>
                <td>{{ $dokumenRS->nomor }}</td>
            <td>{{ $dokumenRS->nama }}</td>
            <td>{{ $dokumenRS->deskripsi }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['dokumenRs.destroy', $dokumenRS->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ url($dokumenRS->file) }}" class='btn btn-default btn-xs' download>
                            <i class="fas fa-download"></i>
                        </a>
                        <a href="{{ route('dokumenRs.show', [$dokumenRS->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('dokumenRs.edit', [$dokumenRS->id]) }}" class='btn btn-default btn-xs'>
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
