<li class="nav-item">
    <a href="{{ route('ruangs.index') }}"
       class="nav-link {{ Request::is('ruangs*') ? 'active' : '' }}">
        <p>Ruang</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('dokumenRs.index') }}"
       class="nav-link {{ Request::is('dokumenRs*') ? 'active' : '' }}">
        <p>Dokumen  RS</p>
    </a>
</li>


