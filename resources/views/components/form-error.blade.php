@props([
    'field'
])

@error($field)
    <div
        {{
            $attributes->merge([
                'class' => 'text-sm text-red-600 space-y-1'
            ])
        }}
        role="alert"
    >
        {{ $message }}
    </div>
@enderror