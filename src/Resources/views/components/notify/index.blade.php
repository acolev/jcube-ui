<svg display="none">
    <symbol id="clock" viewBox="0 0 32 32">
        <circle r="15" cx="16" cy="16" fill="none" stroke="currentColor" stroke-width="2"/>
        <polyline points="16,7 16,16 23,16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round"/>
    </symbol>
    <symbol id="error" viewBox="0 0 32 32">
        <circle r="15" cx="16" cy="16" fill="none" stroke="hsl(13,90%,55%)" stroke-width="2"/>
        <line x1="10" y1="10" x2="22" y2="22" stroke="hsl(13,90%,55%)" stroke-width="2" stroke-linecap="round"/>
        <line x1="22" y1="10" x2="10" y2="22" stroke="hsl(13,90%,55%)" stroke-width="2" stroke-linecap="round"/>
    </symbol>
    <symbol id="message" viewBox="0 0 32 32">
        <polygon points="1,6 31,6 31,26 1,26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                 stroke-linejoin="round"/>
        <polyline points="1,6 16,18 31,6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round"/>
    </symbol>
    <symbol id="success" viewBox="0 0 32 32">
        <circle r="15" cx="16" cy="16" fill="none" stroke="hsl(93,90%,40%)" stroke-width="2"/>
        <polyline points="9,18 13,22 23,12" fill="none" stroke="hsl(93,90%,40%)" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round"/>
    </symbol>
    <symbol id="up" viewBox="0 0 32 32">
        <circle r="15" cx="16" cy="16" fill="none" stroke="currentColor" stroke-width="2"/>
        <polyline points="11,15 16,10 21,15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round"/>
        <line x1="16" y1="10" x2="16" y2="22" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
    </symbol>
    <symbol id="warning" viewBox="0 0 32 32">
        <polygon points="16,1 31,31 1,31" fill="none" stroke="hsl(33,90%,55%)" stroke-width="2" stroke-linecap="round"
                 stroke-linejoin="round"/>
        <line x1="16" y1="12" x2="16" y2="20" stroke="hsl(33,90%,55%)" stroke-width="2" stroke-linecap="round"/>
        <line x1="16" y1="25" x2="16" y2="25" stroke="hsl(33,90%,55%)" stroke-width="3" stroke-linecap="round"/>
    </symbol>
</svg>

@pushonce('style-lib')
    @vite('vendor/jcube/ui/src/Resources/scss/notify.scss')
@endpushonce

@pushonce('script-lib')
    @vite('vendor/jcube/ui/src/Resources/js/notify.js')
@endpushonce



@pushonce('script')
    @if(session()->has('notify'))
        <script>
            window.addEventListener("DOMContentLoaded", () => {
                @foreach(@session('notify') as $msg)
                @if(gettype($msg) === 'object')
                notify.push({
                    icon: "{{ $msg->icon }}",
                    @isset($msg->title) title: "{{ __($msg->title) }}", @endisset
                        @isset($msg->message) message: "{{ __($msg->message) }}", @endisset
                        @isset($msg->time) time: "{{ __($msg->time) }}", @endisset
                        @isset($msg->actions)
                    actions: {!! notifyActions($msg->actions) !!}
                        @endisset
                });
                @else
                notify.push({
                    icon: "{{ $msg[0] }}",
                    title: "{{ __($msg[1]) }}",
                    @isset($msg[2]) message: "{{ __($msg[2]) }}", @endisset
                    @isset($msg[3]) actions: {!! notifyActions($msg[3]) !!}, @endisset
                    time: 5000,
                });
                @endif
                @endforeach
            });
        </script>
    @endif

    @if ($errors->any())
        @php
            $collection = collect($errors->all());
            $errors = $collection->unique();
        @endphp
        <script>
            window.addEventListener("DOMContentLoaded", () => {
                @foreach ($errors as $error)
                notify.push({
                    icon: "error",
                    title: '{{ __("Oops!") }}',
                    message: '{{ __($error) }}',
                    time: 10000
                });
                @endforeach
            });
        </script>
    @endif
@endpushonce
