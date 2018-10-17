<?php

namespace Soli\Tests;

use PHPUnit\Framework\TestCase;

class HelperTest extends TestCase
{
    public function testCamelize()
    {
        $this->assertEquals('CocoBongo', camelize('coco_bongo'));
        $this->assertEquals('Co_coBon_go', camelize('co_co-bon_go', '-'));
        $this->assertEquals('CoCoBonGo', camelize('co_co-bon_go', '_-'));
    }

    public function testUncamelize()
    {
        $this->assertEquals('coco_bongo', uncamelize('CocoBongo'));
        $this->assertEquals('coco-bongo', uncamelize('CocoBongo', '-'));
    }

    public function testLower()
    {
        $this->assertEquals('hello', lower('HELLO'));
    }

    public function testUpper()
    {
        $this->assertEquals('HELLO', upper('hello'));
    }

    public function testStartsWith()
    {
        $this->assertTrue(starts_with('Hello', 'He'));
        $this->assertFalse(starts_with('Hello', 'he'));
    }

    public function testEndsWith()
    {
        $this->assertTrue(ends_with('Hello', 'llo'));
        $this->assertFalse(ends_with('Hello', 'LLO'));
    }

    public function testContains()
    {
        $this->assertTrue(contains('Hello', 'ell'));
        $this->assertFalse(contains('Hello', 'hll'));
        $this->assertTrue(contains('Hello', ['hll', 'ell']));
        $this->assertFalse(contains('Hello', ['hll', '']));
    }

    public function testIsJson()
    {
        $this->assertTrue(is_json('{"data":123}'));
        $this->assertFalse(is_json('{data:123}'));
        $this->assertFalse(is_json(null));
    }

    public function testEnv()
    {
        $this->assertEquals(null, env('NOT_EXISTS_ENV_KEY'));
        $this->assertEquals('default value', env('NOT_EXISTS_ENV_KEY', 'default value'));

        putenv('ENV_HELLO_WORLD=true');
        $this->assertEquals(true, env('ENV_HELLO_WORLD'));
        putenv('ENV_HELLO_WORLD=(true)');
        $this->assertEquals(true, env('ENV_HELLO_WORLD'));

        putenv('ENV_HELLO_WORLD=false');
        $this->assertEquals(false, env('ENV_HELLO_WORLD'));
        putenv('ENV_HELLO_WORLD=(false)');
        $this->assertEquals(false, env('ENV_HELLO_WORLD'));

        putenv('ENV_HELLO_WORLD=empty');
        $this->assertEquals('', env('ENV_HELLO_WORLD'));
        putenv('ENV_HELLO_WORLD=(empty)');
        $this->assertEquals('', env('ENV_HELLO_WORLD'));

        putenv('ENV_HELLO_WORLD=null');
        $this->assertEquals(null, env('ENV_HELLO_WORLD'));
        putenv('ENV_HELLO_WORLD=(null)');
        $this->assertEquals(null, env('ENV_HELLO_WORLD'));

        putenv('ENV_HELLO_WORLD="hello"');
        $this->assertEquals('hello', env('ENV_HELLO_WORLD'));

        putenv('ENV_HELLO_WORLD=hello');
        $this->assertEquals('hello', env('ENV_HELLO_WORLD'));

        putenv('ENV_HELLO_WORLD');
        $this->assertEquals(null, env('ENV_HELLO_WORLD'));
    }

    public function testEnvFile()
    {
        $this->assertEquals('.env', env_file());

        putenv("APP_ENV=prod");
        $this->assertEquals('.env.prod', env_file());
    }
}
