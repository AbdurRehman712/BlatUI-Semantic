@props([
    'days' => 0,
    'hours' => 0,
    'minutes' => 0,
    'seconds' => 0,
    'running' => false,
])

<div
    x-data="{
        days: @js($days),
        hours: @js($hours),
        minutes: @js($minutes),
        seconds: @js($seconds),
        running: @js($running),
        timer: null,
        start() {
            this.running = true;
            this.timer = setInterval(() => {
                if (this.seconds > 0) { this.seconds--; return; }
                if (this.minutes > 0) { this.minutes--; this.seconds = 59; return; }
                if (this.hours > 0) { this.hours--; this.minutes = 59; this.seconds = 59; return; }
                if (this.days > 0) { this.days--; this.hours = 23; this.minutes = 59; this.seconds = 59; return; }
                clearInterval(this.timer);
                this.running = false;
            }, 1000);
        },
        stop() {
            this.running = false;
            if (this.timer) clearInterval(this.timer);
        },
        reset(d, h, m, s) {
            this.days = d ?? 0;
            this.hours = h ?? 0;
            this.minutes = m ?? 0;
            this.seconds = s ?? 0;
        }
    }"
    x-init="if (running) start()"
    {{ $attributes->merge(['class' => 'countdown font-mono text-2xl tabular-nums gap-1']) }}
>
    <span x-show="days > 0" class="flex items-center gap-0.5">
        <span x-text="String(days).padStart(2, '0')"></span><span class="text-sm text-muted-foreground">d</span>
    </span>
    <span class="flex items-center gap-0.5">
        <span x-text="String(hours).padStart(2, '0')"></span><span class="text-sm text-muted-foreground">h</span>
    </span>
    <span class="flex items-center gap-0.5">
        <span x-text="String(minutes).padStart(2, '0')"></span><span class="text-sm text-muted-foreground">m</span>
    </span>
    <span class="flex items-center gap-0.5">
        <span x-text="String(seconds).padStart(2, '0')"></span><span class="text-sm text-muted-foreground">s</span>
    </span>

    {{ $slot }}
</div>
