@foreach (get_defined_vars()['__data'] as $key => $value)
    <li><strong>{{ $key }}:</strong> {{ is_array($value) || is_object($value) ? json_encode($value) : $value }}
    </li>
@endforeach
