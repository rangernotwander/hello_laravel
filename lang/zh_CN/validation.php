<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'        => ':attribute 必须接受。',
    'accepted_if'     => ':attribute 在 :other 为 :value 时必须接受。',
    'active_url'      => ':attribute 不是一个有效的 URL。',
    'after'           => ':attribute 必须是一个在 :date 之后的日期。',
    'after_or_equal'  => ':attribute 必须是一个在 :date 或之后的日期。',
    'alpha'           => ':attribute 只能包含字母。',
    'alpha_dash'      => ':attribute 只能包含字母、数字、连字符和下划线。',
    'alpha_num'       => ':attribute 只能包含字母和数字。',
    'array'           => ':attribute 必须是一个数组。',
    'before'          => ':attribute 必须是一个在 :date 之前的日期。',
    'before_or_equal' => ':attribute 必须是一个在 :date 或之前的日期。',
    'between'         => [
        'array'   => ':attribute 项目数必须介于 :min 和 :max 之间。',
        'file'    => ':attribute 大小必须介于 :min 和 :max KB 之间。',
        'numeric' => ':attribute 值必须介于 :min 和 :max 之间。',
        'string'  => ':attribute 长度必须介于 :min 和 :max 个字符之间。',
    ],
    'boolean'        => ':attribute 字段必须为 true 或 false。',
    'confirmed'      => '两次输入的 :attribute 不一致。',
    'current_password' => '当前密码不正确。',
    'date'           => ':attribute 不是一个有效的日期。',
    'date_equals'    => ':attribute 必须等于 :date。',
    'date_format'    => ':attribute 格式与 :format 不匹配。',
    'different'      => ':attribute 与 :other 必须不同。',
    'digits'         => ':attribute 必须是 :digits 位数字。',
    'digits_between' => ':attribute 位数必须介于 :min 和 :max 之间。',
    'dimensions'     => ':attribute 图片尺寸无效。',
    'distinct'       => ':attribute 字段值重复。',
    'email'          => ':attribute 格式不正确。',
    'ends_with'      => ':attribute 必须以 :values 结尾。',
    'exists'         => '所选的 :attribute 无效。',
    'file'           => ':attribute 必须是一个文件。',
    'filled'         => ':attribute 字段不能为空。',
    'gt'             => [
        'array'   => ':attribute 项目数必须多于 :value 项。',
        'file'    => ':attribute 大小必须大于 :value KB。',
        'numeric' => ':attribute 值必须大于 :value。',
        'string'  => ':attribute 长度必须大于 :value 个字符。',
    ],
    'gte'            => [
        'array'   => ':attribute 项目数必须大于或等于 :value 项。',
        'file'    => ':attribute 大小必须大于或等于 :value KB。',
        'numeric' => ':attribute 值必须大于或等于 :value。',
        'string'  => ':attribute 长度必须大于或等于 :value 个字符。',
    ],
    'image'          => ':attribute 必须是一张图片。',
    'in'             => '所选的 :attribute 无效。',
    'in_array'       => ':attribute 字段不存在于 :other 中。',
    'integer'        => ':attribute 必须是一个整数。',
    'ip'             => ':attribute 必须是一个有效的 IP 地址。',
    'ipv4'           => ':attribute 必须是一个有效的 IPv4 地址。',
    'ipv6'           => ':attribute 必须是一个有效的 IPv6 地址。',
    'json'           => ':attribute 必须是一个有效的 JSON 字符串。',
    'lt'             => [
        'array'   => ':attribute 项目数必须少于 :value 项。',
        'file'    => ':attribute 大小必须小于 :value KB。',
        'numeric' => ':attribute 值必须小于 :value。',
        'string'  => ':attribute 长度必须小于 :value 个字符。',
    ],
    'lte'            => [
        'array'   => ':attribute 项目数必须小于或等于 :value 项。',
        'file'    => ':attribute 大小必须小于或等于 :value KB。',
        'numeric' => ':attribute 值必须小于或等于 :value。',
        'string'  => ':attribute 长度必须小于或等于 :value 个字符。',
    ],
    'max'            => [
        'array'   => ':attribute 项目数不能超过 :max 项。',
        'file'    => ':attribute 大小不能超过 :max KB。',
        'numeric' => ':attribute 值不能超过 :max。',
        'string'  => ':attribute 长度不能超过 :max 个字符。',
    ],
    'mimes'          => ':attribute 文件类型必须是 :values。',
    'mimetypes'      => ':attribute 文件类型必须是 :values。',
    'min'            => [
        'array'   => ':attribute 项目数至少为 :min 项。',
        'file'    => ':attribute 大小至少为 :min KB。',
        'numeric' => ':attribute 值至少为 :min。',
        'string'  => ':attribute 长度至少为 :min 个字符。',
    ],
    'multiple_of'    => ':attribute 必须是 :value 的倍数。',
    'not_in'         => '所选的 :attribute 无效。',
    'not_regex'      => ':attribute 格式无效。',
    'numeric'        => ':attribute 必须是一个数字。',
    'password'       => '密码不正确。',
    'present'        => ':attribute 字段必须存在。',
    'regex'          => ':attribute 格式无效。',
    'required'       => ':attribute 不能为空。',
    'required_if'    => '当 :other 为 :value 时，:attribute 不能为空。',
    'required_unless' => '除非 :other 为 :values，否则 :attribute 不能为空。',
    'required_with'  => '当 :values 存在时，:attribute 不能为空。',
    'required_with_all' => '当 :values 都存在时，:attribute 不能为空。',
    'required_without' => '当 :values 不存在时，:attribute 不能为空。',
    'required_without_all' => '当所有 :values 都不存在时，:attribute 不能为空。',
    'prohibited'     => ':attribute 字段被禁止。',
    'prohibited_if'  => '当 :other 为 :value 时，:attribute 字段被禁止。',
    'prohibited_unless' => '除非 :other 在 :values 中，否则 :attribute 字段被禁止。',
    'prohibits'      => ':attribute 字段禁止包含 :other。',
    'same'           => ':attribute 与 :other 必须相同。',
    'size'           => [
        'array'   => ':attribute 必须包含 :size 项。',
        'file'    => ':attribute 大小必须为 :size KB。',
        'numeric' => ':attribute 值必须为 :size。',
        'string'  => ':attribute 长度必须为 :size 个字符。',
    ],
    'starts_with'    => ':attribute 必须以 :values 开头。',
    'string'         => ':attribute 必须是一个字符串。',
    'timezone'       => ':attribute 必须是一个有效的时区。',
    'unique'         => ':attribute 已被占用。',
    'uploaded'       => ':attribute 上传失败。',
    'url'            => ':attribute 格式无效。',
    'uuid'           => ':attribute 必须是一个有效的 UUID。',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    */

    'custom' => [
        // 'attribute-name' => [
        //     'rule-name' => 'custom-message',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    */

    'attributes' => [
        'name'                  => '名称',
        'email'                 => '邮箱',
        'password'              => '密码',
        'password_confirmation' => '确认密码',
        'avatar'                => '头像',
        'bio'                   => '个人简介',
    ],

];
