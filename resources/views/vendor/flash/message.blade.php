@foreach (session('flash_notification', collect())->toArray() as $message)
    @if ($message['overlay'])
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => $message['title'],
            'body'       => $message['message']
        ])
    @else
        <div class="callout
                    callout-{{ $message['level'] }}
                    {{ $message['important'] ? 'alert-important' : '' }}"
                    role="alert"
        >
            @if ($message['important'])
                <button type="button"
                        class="close"
                        data-dismiss="alert"
                        aria-hidden="true"
                >&times;</button>
            @endif
            @if ($message['level'] == 'success')
            <h4>Berhasil !</h4>
            @elseif ($message['level'] == 'danger')
            <h4>Gagal !</h4>
            @elseif ($message['level'] == 'warning')
            <h4>Peringatan !</h4>
            @elseif ($message['level'] == 'info')
            <h4>Informasi !</h4>
            @endif
            <p>{!! $message['message'] !!}</p>
        </div>
    @endif
@endforeach

{{ session()->forget('flash_notification') }}
