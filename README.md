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
