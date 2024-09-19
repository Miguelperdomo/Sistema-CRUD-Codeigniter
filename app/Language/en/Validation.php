<?php

// Archivo: app/Language/es/Validation.php

return [
    // Custom Validation Language Rules
    'required'        => 'El campo {field} es obligatorio.',
    'is_unique'       => 'El campo {field} debe contener un valor único.',
    'min_length'      => 'El campo {field} debe tener al menos {param} caracteres.',
    'max_length'      => 'El campo {field} no puede exceder {param} caracteres.',
    'valid_email'     => 'El campo {field} debe contener una dirección de correo electrónico válida.',
    'numeric'         => 'El campo {field} debe contener solo números.',
    'exact_length'    => 'El campo {field} debe tener exactamente {param} caracteres.',
    'matches'         => 'El campo {field} no coincide con el campo {param}.',
    'is_not_unique'   => 'El campo {field} debe existir en la base de datos.',
    // Otros mensajes de validación
    'greater_than'    => 'El campo {field} debe contener un número mayor que {param}.',
    'less_than'       => 'El campo {field} debe contener un número menor que {param}.',
    'alpha'           => 'El campo {field} solo puede contener letras.',
    'alpha_numeric'   => 'El campo {field} solo puede contener letras y números.',
    'valid_date'      => 'El campo {field} debe contener una fecha válida.',
    'regex_match'     => 'El campo {field} no tiene el formato correcto.',
];
