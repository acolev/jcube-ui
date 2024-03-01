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
    <style>
        :root {
            --hue: 223;
            --bg: hsl(var(--hue), 10%, 90%);
            --fg: hsl(var(--hue), 10%, 10%);
            --transDur: 0.15s;
        }

        .notification {
            padding-bottom: 0.75em;
            position: fixed;
            top: 1.5em;
            right: 1.5em;
            width: 18.75em;
            max-width: calc(100% - 3em);
            transition: transform 0.15s ease-out;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
            z-index: 9999;
            font-size: 20px;
        }

        .notification__box,
        .notification__content,
        .notification__btns {
            display: flex;
        }

        .notification__box,
        .notification__content {
            align-items: center;
        }

        .notification__box {
            animation: flyIn 0.3s ease-out;
            background-color: hsl(0, 0%, 100%);
            border-radius: 0.75em;
            box-shadow: 0 0.5em 1em hsla(var(--hue), 10%, 10%, 0.1);
            height: 4em;
            transition: background-color var(--transDur),
            color var(--transDur);
        }

        .notification--out .notification__box {
            animation: flyOut 0.3s ease-out forwards;
        }

        .notification__content {
            padding: 0.375em 1em;
            width: 100%;
            height: 100%;
        }

        .notification__icon {
            flex-shrink: 0;
            margin-right: 0.75em;
            width: 2em;
            height: 2em;
        }

        .notification__icon-svg {
            width: 100%;
            height: auto;
        }

        .notification__text {
            line-height: 1.333;
        }

        .notification__text-title {
            font-size: 0.75em;
            font-weight: bold;
        }

        .notification__text-subtitle {
            font-size: 0.6em;
            opacity: 0.75;
        }

        .notification__btns {
            box-shadow: -1px 0 0 hsla(var(--hue), 10%, 10%, 0.15);
            flex-direction: column;
            flex-shrink: 0;
            min-width: 4em;
            height: 100%;
            transition: box-shadow var(--transDur);
        }

        .notification__btn {
            background-color: transparent;
            box-shadow: 0 0 0 hsla(var(--hue), 10%, 10%, 0.5) inset;
            font-size: 0.6em;
            line-height: 1;
            font-weight: 500;
            height: 100%;
            padding: 0 0.5rem;
            transition: background-color var(--transDur),
            color var(--transDur);
            -webkit-appearance: none;
            appearance: none;
            -webkit-tap-highlight-color: transparent;
            border: 0;
        }

        .notification__btn-text {
            display: inline-block;
            pointer-events: none;
        }

        .notification__btn:first-of-type {
            border-radius: 0 0.75rem 0 0;
        }

        .notification__btn:last-of-type {
            border-radius: 0 0 0.75rem 0;
        }

        .notification__btn:only-child {
            border-radius: 0 0.75rem 0.75rem 0;
        }

        .notification__btn + .notification__btn {
            box-shadow: 0 -1px 0 hsla(var(--hue), 10%, 10%, 0.15);
            font-weight: 400;
        }

        .notification__btn:active,
        .notification__btn:focus {
            background-color: hsl(var(--hue), 10%, 95%);
        }

        .notification__btn:focus {
            outline: transparent;
        }

        @supports selector(:focus-visible) {
            .notification__btn:focus {
                background-color: transparent;
            }

            .notification__btn:focus-visible,
            .notification__btn:active {
                background-color: hsl(var(--hue), 10%, 95%);
            }
        }

        /* Dark theme */
        @media (prefers-color-scheme: dark) {
            :root {
                --bg: hsl(var(--hue), 10%, 10%);
                --fg: hsl(var(--hue), 10%, 90%);
            }

            .notification__box {
                background-color: hsl(var(--hue), 10%, 30%);
            }

            .notification__btns {
                box-shadow: -1px 0 0 hsla(var(--hue), 10%, 90%, 0.15);
            }

            .notification__btn + .notification__btn {
                box-shadow: 0 -1px 0 hsla(var(--hue), 10%, 90%, 0.15);
            }

            .notification__btn:active,
            .notification__btn:focus {
                background-color: hsl(var(--hue), 10%, 35%);
            }

            @supports selector(:focus-visible) {
                .notification__btn:focus {
                    background-color: transparent;
                }

                .notification__btn:focus-visible,
                .notification__btn:active {
                    background-color: hsl(var(--hue), 10%, 35%);
                }
            }
        }

        /* Animations */
        @keyframes flyIn {
            from {
                transform: translateX(calc(100% + 1.5em));
            }
            to {
                transform: translateX(0);
            }
        }

        @keyframes flyOut {
            from {
                transform: translateX(0);
            }
            to {
                transform: translateX(calc(100% + 1.5em));
            }
        }
    </style>
@endpushonce

@pushonce('script-lib')
    @vite('vendor/jcube/ui/src/Resources/js/notify.js')
@endpushonce

@pushonce('script')
    @if(session()->has('notify'))
    <script>
        window.addEventListener("DOMContentLoaded", () => {
            @foreach(@session('notify') as $msg)
            notify.set({
                icon: "{{ $msg[0] }}",
                title: "{{ __($msg[1]) }}",
                actions: ["Close"],
                time: 5000
            })
            @endforeach
        });
    </script>
    @endif
@endpushonce
