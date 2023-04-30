<?php

return [
    'attributes' => [
        'username' => 'მომხმარებლის სახელის',
        'password' => 'პაროლის',
        'email' => 'იმეილის',
        'checkPassword' => 'პაროლის'
    ],
    'required' => ':attribute ველი აუცილებეილია',
    'min' => [
        'array' => 'The :attribute field must have at least :min items.',
        'file' => 'The :attribute field must be at least :min kilobytes.',
        'numeric' => 'The :attribute field must be at least :min.',
        'string' => ':attribute ველი მინიმუმ :min სიმბოლო მაინც უნდა იყოს.',
    ],
    'email' => ':attribute ველი უნდა იყოს ვალიდური იმეილის მისამართი.',
    'same' => ':attribute ველი უნდა ემთხვეოდეს :other ზედა ველს.',
    'confirmed' => ':attribute ველი არ ემთხვევა ველს.',
    'unique' => ':attribute ეს ველი უკვე გამოყენებულია.',

    'custom' => [
        'invalid_username' => ':attribute ველი არასწორია.',
        'invalid_email' => ':attribute ველი არასწორია.'
    ],
];
