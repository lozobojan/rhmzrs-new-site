<?php

return [
    'accepted'         => ':attribute мора се прихватити.',
    'active_url'       => ':attribute није важећа УРЛ адреса.',
    'after'            => ':attribute мора бити датум после :date.',
    'after_or_equal'   => ':attribute мора бити датум после или једнак :date.',
    'alpha'            => ':attribute може да садржи само слова.',
    'alpha_dash'       => ':attribute може да садржи само слова, бројеве и цртице.',
    'alpha_num'        => ':attribute може да садржи само слова и бројеве.',
    'latin'            => ':attribute може да садржи само ИСО основна латинична слова.',
    'latin_dash_space' => ':attribute може да садржи само слова ИСО основне латиничне абецеде, бројеве, цртице, цртице и размаке.',
    'array'            => ':attribute мора бити низ.',
    'before'           => ':attribute мора бити датум пре :date.',
    'before_or_equal'  => ':attribute мора бити датум пре или једнак :date.',
    'between'          => [
        'numeric' => ':attribute мора бити између :min и :max.',
        'file'    => ':attribute мора бити између :min и :max килобајта.',
        'string'  => ':attribute мора бити између :min и :max знакова.',
        'array'   => ':attribute мора имати између :min и :max ставки.',
    ],
    'boolean'          => ':attribute поље мора бити тачно или нетачно.',
    'confirmed'        => ':attribute потврда се не поклапа.',
    'current_password' => 'password is incorrect.',
    'date'             => ':attribute није важећи датум.',
    'date_equals'      => ':attribute мора бити датум једнак :date.',
    'date_format'      => ':attribute не одговара формату :формат.',
    'different'        => ':attribute и :other мора бити другачије.',
    'digits'           => ':attribute мора бити :цифре цифре.',
    'digits_between'   => ':attribute мора бити између :min и :max цифара.',
    'dimensions'       => ':attribute има неважеће димензије слике.',
    'distinct'         => ':attribute поље има дупликат :value.',
    'email'            => ':attribute Мора бити важећа е-маил адреса.',
    'ends_with'        => ':attribute мора да се завршава са једним од следећих: :values.',
    'exists'           => 'selected :attribute is invalid.',
    'file'             => ':attribute мора бити фајл.',
    'filled'           => ':attribute поље мора имати вредност.',
    'gt'               => [
        'numeric' => ':attribute мора бити већи од :value.',
        'file'    => ':attribute мора бити већи од :value килобајта.',
        'string'  => ':attribute мора бити већи од :value знакова.',
        'array'   => ':attribute мора имати више од :value ставки.',
    ],
    'gte' => [
        'numeric' => ':attribute мора бити већи или једнак :value.',
        'file'    => ':attribute мора бити већи или једнак :value килобајта.',
        'string'  => ':attribute мора бити већи или једнак :value знакова.',
        'array'   => ':attribute мора имати :value ставке или више.',
    ],
    'image'    => ':attribute мора бити слика.',
    'in'       => 'selected :attribute is invalid.',
    'in_array' => ':attribute поље не постоји у :other.',
    'integer'  => ':attribute мора бити цео број.',
    'ip'       => ':attribute мора бити важећа ИП адреса.',
    'ipv4'     => ':attribute мора бити важећа ИПв4 адреса.',
    'ipv6'     => ':attribute мора бити важећа ИПв6 адреса.',
    'json'     => ':attribute мора бити важећи ЈСОН стринг.',
    'lt'       => [
        'numeric' => ':attribute мора бити мањи од :value.',
        'file'    => ':attribute мора бити мањи од :value килобајта.',
        'string'  => ':attribute мора бити мање од :value знакова.',
        'array'   => ':attribute мора имати мање од :value ставки.',
    ],
    'lte' => [
        'numeric' => ':attribute мора бити мањи или једнак :value.',
        'file'    => ':attribute мора бити мањи од или једнак :value килобајта.',
        'string'  => ':attribute мора бити мање или једнако знакова :value.',
        'array'   => ':attribute не сме имати више од :value ставки.',
    ],
    'max' => [
        'numeric' => ':attribute не може бити веће од :max.',
        'file'    => ':attribute не може бити већи од :max килобајта.',
        'string'  => ':attribute не може бити већи од :max знакова.',
        'array'   => ':attribute не може имати више од :max ставки.',
    ],
    'mimes'     => ':attribute мора бити датотека типа: :values.',
    'mimetypes' => ':attribute мора бити датотека типа: :values.',
    'min'       => [
        'numeric' => ':attribute мора бити најмање :min.',
        'file'    => ':attribute мора бити најмање :min килобајта.',
        'string'  => ':attribute мора имати најмање :min знакова.',
        'array'   => ':attribute мора имати најмање :min ставки.',
    ],
    'not_in'               => 'selected :attribute is invalid.',
    'not_regex'            => ':attribute формат је неважећи.',
    'numeric'              => ':attribute мора бити број.',
    'password'             => 'password is incorrect.',
    'present'              => ':attribute поље мора бити присутно.',
    'regex'                => ':attribute формат је неважећи.',
    'required'             => ':attribute поље је обавезно.',
    'required_if'          => ':attribute поље је обавезно када је :other :value.',
    'required_unless'      => ':attribute поље је обавезно осим ако :other није у :value.',
    'required_with'        => ':attribute поље је обавезно када је :value присутно.',
    'required_with_all'    => ':attribute поље је обавезно када је :value присутно.',
    'required_without'     => ':attribute поље је обавезно када :values није присутно.',
    'required_without_all' => ':attribute поље је обавезно када није присутна ниједна од :value.',
    'same'                 => ':attribute и :други морају одговарати.',
    'size'                 => [
        'numeric' => ':attribute мора бити :величина.',
        'file'    => ':attribute мора бити :величина килобајта.',
        'string'  => ':attribute мора бити :величина знакова.',
        'array'   => ':attribute мора да садржи ставке :сизе.',
    ],
    'starts_with' => ':attribute мора почети са једним од следећих: :values.',
    'string'      => ':attribute мора бити низ.',
    'timezone'    => ':attribute мора бити важећа зона.',
    'unique'      => ':attribute је већ заузето.',
    'uploaded'    => ':attribute отпремање није успело.',
    'url'         => ':attribute формат је неважећи.',
    'uuid'        => ':attribute мора бити важећи УУИД.',
    'custom'      => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
    'reserved_word'                  => ':attribute садржи резервисану реч',
    'dont_allow_first_letter_number' => '\":input\" field can\'t have first letter as a number',
    'exceeds_maximum_number'         => ':attribute премашује максималну дужину модела',
    'db_column'                      => ':attribute може да садржи само ИСО основна слова латинице, бројеве, цртицу и не може да почиње бројем.',
    'attributes'                     => [],
];
























































































