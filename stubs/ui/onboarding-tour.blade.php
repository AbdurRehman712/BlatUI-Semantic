@props(['steps' => []])

<div
    data-slot="onboarding-tour"
    x-data="{ step: 0, show: true }"
    x-show="show"
    {{ $attributes->merge(['class' => 'onboarding-tour fixed bottom-8 right-8 z-50 w-80']) }}
>
    <div class="card card-bordered bg-base-100 shadow-2xl">
        <div class="card-body">
            <h3 class="card-title text-sm" x-text="'Step ' + (step + 1) + ' of {{ count($steps) }}'"></h3>
            <p class="text-sm" x-text="steps[step]"></p>
            <div class="card-actions justify-end mt-3">
                <button @click="show = false" class="btn btn-ghost btn-xs">Skip</button>
                <button @click="step = Math.min(step + 1, {{ count($steps) }} - 1)" class="btn btn-primary btn-xs" x-text="step === {{ count($steps) }} - 1 ? 'Done' : 'Next'"></button>
            </div>
        </div>
    </div>
    {{ $slot }}
</div>
