@if ($status === 'WAITING')
    <a href="{{ Request::url() }}/{{ $id }}?status=QUEUE" class="btn btn-dark btn-sm btn-order">
        Barang Di Terima
    </a>
@elseif($status === 'QUEUE')
    <a href="{{ Request::url() }}/{{ $id }}?status=IN_WASHING" class="btn btn-secondary btn-sm btn-order">
        Barang Di Cuci
    </a>
@elseif($status === 'IN_WASHING')
    <a href="{{ Request::url() }}/{{ $id }}?status=IN_DRYING" class="btn btn-info btn-sm btn-order">
        Barang Di Keringkan
    </a>
@elseif($status === 'IN_DRYING')
    @if (isset($iron))
        <a href="{{ Request::url() }}/{{ $id }}?status=IN_IRONING" class="btn btn-warning btn-sm btn-order">
            Barang Di Setrika
        </a>
    @else
        <a href="{{ Request::url() }}/{{ $id }}?status=IN_PACKED" class="btn btn-warning btn-sm btn-order">
            Barang Di Kemas
        </a>
    @endif
@elseif($status === 'IN_IRONING')
    <a href="{{ Request::url() }}/{{ $id }}?status=IN_PACKED" class="btn btn-info btn-sm btn-order">
        Barang Di Kemas
    </a>
@elseif($status === 'IN_PACKED')
    <a href="{{ Request::url() }}/{{ $id }}?status=READY" class="btn btn-primary btn-sm btn-order">
        Barang Bisa Di Ambil
    </a>
@elseif($status === 'READY')
    <a href="{{ Request::url() }}/{{ $id }}?status=DONE" class="btn btn-success btn-sm btn-order">
        Barang Sudah Di Ambil
    </a>
@else
    <button class="btn btn-success btn-sm" disabled>
        Selesai
    </button>
@endif
