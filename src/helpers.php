<?php

if (!function_exists('camelize')) { // @codeCoverageIgnore
    /**
     * Converts strings to camelize style
     *
     *<code>
     * echo camelize('coco_bongo'); // CocoBongo
     * echo camelize('co_co-bon_go', '-'); // Co_coBon_go
     * echo camelize('co_co-bon_go', '_-'); // CoCoBonGo
     *</code>
     *
     * @param string $str
     * @param string $delimiter
     * @return string
     */
    function camelize($str, $delimiter = '_')
    {
        $str = ucwords(str_replace(str_split($delimiter), ' ', $str));

        return str_replace(' ', '', $str);
    }
}

if (!function_exists('uncamelize')) { // @codeCoverageIgnore
    /**
     * Uncamelize strings which are camelized
     *
     *<code>
     * echo uncamelize('CocoBongo'); // coco_bongo
     * echo uncamelize('CocoBongo', '-'); // coco-bongo
     *</code>
     *
     * @param string $str
     * @param string $delimiter
     * @return string
     */
    function uncamelize($str, $delimiter = '_')
    {
        if (!ctype_lower($str)) {
            $str = preg_replace('/\s+/u', '', $str);
            $str = lower(preg_replace('/(.)(?=[A-Z])/u', '$1' . $delimiter, $str));
        }

        return $str;
    }
}

if (!function_exists('lower')) { // @codeCoverageIgnore
    /**
     * Convert the given string to lower-case.
     *
     *<code>
     * echo lower('HELLO'); // hello
     *</code>
     *
     * @param string $str
     * @return string
     */
    function lower($str)
    {
        return mb_strtolower($str, 'UTF-8');
    }
}

if (!function_exists('upper')) { // @codeCoverageIgnore
    /**
     * Convert the given string to upper-case.
     *
     *<code>
     * echo upper('hello'); // HELLO
     *</code>
     *
     * @param string $str
     * @return string
     */
    function upper($str)
    {
        return mb_strtoupper($str, 'UTF-8');
    }
}

if (!function_exists('starts_with')) { // @codeCoverageIgnore
    /**
     * Check if a string starts with a given string
     *
     *<code>
     * echo starts_with('Hello', 'He'); // true
     * echo starts_with('Hello', 'he'); // false
     *</code>
     *
     * @param string $haystack
     * @param string $needle
     * @return bool
     */
    function starts_with($haystack, $needle)
    {
        return (string)$needle === substr($haystack, 0, strlen($needle));
    }
}

if (!function_exists('ends_with')) { // @codeCoverageIgnore
    /**
     * Check if a string ends with a given string
     *
     *<code>
     * echo ends_with('Hello', 'llo'); // true
     * echo ends_with('Hello', 'LLO'); // false
     *</code>
     *
     * @param string $haystack
     * @param string $needle
     * @return bool
     */
    function ends_with($haystack, $needle)
    {
        return (string)$needle === substr($haystack, -strlen($needle));
    }
}

if (!function_exists('contains')) { // @codeCoverageIgnore
    /**
     * Determine if a given string contains a given substring.
     *
     *<code>
     * echo contains('Hello', 'ell'); // true
     * echo contains('Hello', 'hll'); // false
     * echo contains('Hello', ['hll', 'ell']); // true
     * echo contains('Hello', ['hll', '']); // false
     *</code>
     *
     * @param string $haystack
     * @param string|array $needles
     * @return bool
     */
    function contains($haystack, $needles)
    {
        foreach ((array) $needles as $needle) {
            if ($needle !== '' && mb_strpos($haystack, $needle) !== false) {
                return true;
            }
        }

        return false;
    }
}

if (!function_exists('is_json')) { // @codeCoverageIgnore
    /**
     * Check if a string is JSON
     *
     *<code>
     * echo is_json('{"data":123}'); // true
     * echo is_json('{data:123}'); // false
     *</code>
     *
     * @param string $str
     * @return bool
     */
    function is_json($str)
    {
        if (!is_string($str) || '' === $str) {
            return false;
        }

        json_decode($str);

        return (json_last_error() === JSON_ERROR_NONE);
    }
}

if (!function_exists('mkdir_p')) { // @codeCoverageIgnore
    /**
     * Creates a directory and all its parent directories.
     *
     *<code>
     * mkdir_p('/path/a/b/c');
     * mkdir_p('/path/a/b/c', 0777);
     *</code>
     *
     * @param string $path
     * @param int $mode
     * @return bool
     * @codeCoverageIgnore
     */
    function mkdir_p($path, $mode = 0755)
    {
        return (is_dir($path) or mkdir($path, $mode, true));
    }
}

if (!function_exists('env')) { // @codeCoverageIgnore
    /**
     * Gets the value of an environment variable.
     *
     * @see https://github.com/laravel/framework/blob/master/src/Illuminate/Support/helpers.php env function
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function env($key, $default = null)
    {
        $value = getenv($key);

        if ($value === false) {
            return $default;
        }

        switch (strtolower($value)) {
            case 'true':
            case '(true)':
                return true;
            case 'false':
            case '(false)':
                return false;
            case 'empty':
            case '(empty)':
                return '';
            case 'null':
            case '(null)':
                return;
        }

        if (($valueLength = strlen($value)) > 1 && $value[0] === '"' && $value[$valueLength - 1] === '"') {
            return substr($value, 1, -1);
        }

        return $value;
    }
}

if (!function_exists('env_file')) { // @codeCoverageIgnore
    /**
     * Get environment file.
     *
     * @param string $envFile
     * @return string
     */
    function env_file($envFile = '.env')
    {
        if (getenv('APP_ENV')) {
            return $envFile . '.' . getenv('APP_ENV');
        }
        return $envFile;
    }
}

if (!function_exists('sanitize')) { // @codeCoverageIgnore
    /**
     * 使用对应过滤标识进行过滤
     *
     *<code>
     * echo sanitize('!100a019.01a', 'int'); // 10001901
     * echo sanitize('{"data":123}', 'string'); // {&#34;data&#34;:123}
     * echo sanitize('some(one)@exa\\mple.com', 'email'); // someone@example.com
     *</code>
     *
     * @param mixed $value
     * @param string $filter
     * @return mixed
     * @throws \InvalidArgumentException
     */
    function sanitize($value, $filter)
    {
        switch ($filter) {
            case 'int':
                return intval(filter_var($value, FILTER_SANITIZE_NUMBER_INT));

            case 'absint':
                return abs(intval(filter_var($value, FILTER_SANITIZE_NUMBER_INT)));

            case 'float':
                return doubleval(
                    filter_var($value, FILTER_SANITIZE_NUMBER_FLOAT, ['flags' => FILTER_FLAG_ALLOW_FRACTION])
                );

            case 'alnum':
                return preg_replace('/[^A-Za-z0-9]/', '', $value);

            case 'alpha':
                return preg_replace('/[^A-Za-z]/', '', $value);

            case 'email':
                if (defined('FILTER_FLAG_EMAIL_UNICODE')) {
                    return filter_var($value, FILTER_SANITIZE_EMAIL, FILTER_FLAG_EMAIL_UNICODE);
                }
                return filter_var($value, FILTER_SANITIZE_EMAIL); // @codeCoverageIgnore

            case 'url':
                return filter_var($value, FILTER_SANITIZE_URL);

            case 'trim':
                return trim($value);

            case 'string':
                return filter_var($value, FILTER_SANITIZE_STRING);

            case 'strip_tags':
                return strip_tags($value);

            case 'special':
                return filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS);

            case 'special_full':
                return filter_var($value, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            case 'lower':
                return mb_strtolower($value, 'UTF-8');

            case 'upper':
                return mb_strtoupper($value, 'UTF-8');

            default:
                throw new \InvalidArgumentException("Sanitize filter $filter is not supported");
        }
    }
}
