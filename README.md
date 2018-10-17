Soli helpers
------------

常用的 PHP「辅助」函数。

[![Build Status](https://travis-ci.org/soliphp/helpers.svg?branch=master)](https://travis-ci.org/soliphp/helpers)
[![Coverage Status](https://coveralls.io/repos/github/soliphp/helpers/badge.svg?branch=master)](https://coveralls.io/github/soliphp/helpers?branch=master)
[![License](https://poser.pugx.org/soliphp/helpers/license)](https://packagist.org/packages/soliphp/helpers)

Table of Contents
=================

* [字符串](#字符串)
    * [camelize](#camelize)
    * [uncamelize](#uncamelize)
    * [lower](#lower)
    * [upper](#upper)
    * [starts_with](#starts_with)
    * [ends_with](#ends_with)
    * [contains](#contains)
* [JSON](#json)
    * [is_json](#is_json)
* [文件目录](#文件目录)
    * [mkdir_p](#mkdir_p)
* [环境变量](#环境变量)
    * [env](#env)
    * [env_file](#env_file)

## 字符串

### camelize

`camelize` 函数将给定字符串转换为 `驼峰格式`：

    echo camelize('coco_bongo'); // CocoBongo
    echo camelize('co_co-bon_go', '-'); // Co_coBon_go
    echo camelize('co_co-bon_go', '_-'); // CoCoBonGo

### uncamelize

`uncamelize` 函数将给定的字符串转换为 `蛇形格式`：

    echo uncamelize('CocoBongo'); // coco_bongo
    echo uncamelize('CocoBongo', '-'); // coco-bongo

### lower

`lower` 函数将给定的字符串转换为 `小写`：

    echo lower('HELLO'); // hello

### upper

`upper` 函数将给定的字符串转换为 `大写`：

    echo upper('hello'); // HELLO

### starts_with

`starts_with` 函数判断给定的字符串的`开头`是否是指定值：

    echo starts_with('Hello', 'He'); // true
    echo starts_with('Hello', 'he'); // false

### ends_with

`ends_with` 函数判断给定的字符串`结尾`是否是指定的内容：

    echo ends_with('Hello', 'llo'); // true
    echo ends_with('Hello', 'LLO'); // false

### contains

`contains` 函数判断字符串是否`包含`指定的值：

    echo contains('Hello', 'ell'); // true
    echo contains('Hello', 'hll'); // false
    echo contains('Hello', ['hll', 'ell']); // true
    echo contains('Hello', ['hll', '']); // false

## JSON

### is_json

    echo is_json('{"data":123}'); // true
    echo is_json('{data:123}'); // false

## 文件目录

### mkdir_p

`mkdir_p` 创建所有需要创建的父级目录：

    mkdir_p('/path/a/b/c');
    mkdir_p('/path/a/b/c', 0777);

## 环境变量

### env

`env` 获取环境变量，允许指定默认值：

    // 当没有 MYSQL_HOST 这个环境变量时，返回默认的 localhost
    env('MYSQL_HOST', 'localhost');

### env_file

`env_file` 获取环境配置文件名，默认为 `.env`，如果定义了 `APP_ENV`
环境变量，则返回对应的环境文件名。

如，创建 test.php，文件内容为：

    <?php
    include __DIR__ . "/src/helpers.php";
    echo env_file();

默认执行 `php test.php`，将输出 `.env`：

    php test.php
    // 输出
    .env

如果执行 `APP_ENV=prod php test.php`，从命令行指定环境变量 `APP_ENV=prod` 将输出 `.env.prod`：

    APP_ENV=prod php test.php
    // 输出
    .env.prod

可配合 [phpdotenv] 加载对应环境配置文件的内容，假如环境配置文件放在项目根目录
BASE_PATH 下：

    (new Dotenv(BASE_PATH, env_file()))->load();

加载后便可以使用 `env` 方法获取每一个环境变量的值，便于分离环境配置和项目代码。

[phpdotenv]: https://github.com/vlucas/phpdotenv
