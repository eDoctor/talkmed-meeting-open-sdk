<?php
/**
 * 兼容性自检：不发起任何网络请求、不依赖 APP_ID。
 * 覆盖 PHP 8.2 动态属性弃用、8.5 setAccessible 弃用、PSR-4 可加载性。
 */

namespace eDoctor\Tests\Unit;

use eDoctor\Meeting\Common\Tool;
use eDoctor\Meeting\MeetingClient;
use eDoctor\Meeting\Models\Live\LiveListRequest;
use eDoctor\Meeting\Models\User\UserLoginRequest;
use eDoctor\Meeting\TlkRequest;
use PHPUnit\Framework\TestCase;

class CompatibilityTest extends TestCase
{
    /**
     * src 下每个类都必须能被 PSR-4 正确加载（历史上有 8 个文件 namespace 写错，永远加载不到）
     */
    public function testEveryClassIsAutoloadable()
    {
        $expected = [];
        $root = dirname(__DIR__, 2) . '/src/';
        $it = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($root, \FilesystemIterator::SKIP_DOTS));
        foreach ($it as $file) {
            if ($file->getExtension() !== 'php') {
                continue;
            }
            $expected[] = 'eDoctor\\Meeting\\' . str_replace(['/', '.php'], ['\\', ''], substr($file->getPathname(), strlen($root)));
        }

        $this->assertGreaterThan(50, count($expected), 'src 下类数量异常');
        foreach ($expected as $class) {
            $this->assertTrue(
                class_exists($class) || interface_exists($class) || trait_exists($class),
                "类无法通过 PSR-4 加载: {$class}"
            );
        }
    }

    /**
     * 全部静态分析层面无弃用：setOptions 传入未声明字段不得产生 deprecation
     */
    public function testSetOptionsWithUnknownFieldEmitsNoDeprecation()
    {
        $deprecations = [];
        set_error_handler(function ($errno, $errstr) use (&$deprecations) {
            $deprecations[] = $errstr;
            return true;
        }, E_DEPRECATED | E_USER_DEPRECATED | E_WARNING);

        try {
            $request = new LiveListRequest();
            $request->setOptions([
                'page' => 1,
                'page_size' => 20,
                'not_declared_field' => 'x',
            ]);
            $this->assertSame(1, $this->readProperty($request, 'page'));
        } finally {
            restore_error_handler();
        }

        $this->assertSame([], $deprecations, "产生弃用告警: " . implode(' | ', $deprecations));
    }

    /**
     * getVars() 依赖反射读取私有属性，PHP 8.1+ 不应再调用 setAccessible
     */
    public function testPrivatePropertiesAreReadableWithoutSetAccessible()
    {
        $client = new MeetingClient('test_app_id', 'test_app_secret');
        // PHP 8.1+ 私有方法可直接 invoke，无需 setAccessible（该方法 8.5 起已弃用）
        $method = new \ReflectionMethod(MeetingClient::class, 'getVars');

        $request = new UserLoginRequest();
        $request->setType('unionid');
        $params = $method->invoke($client, $request);

        $this->assertArrayHasKey('type', $params);
        $this->assertSame('unionid', $params['type']);
        $this->assertArrayNotHasKey('request_uri', $params, 'request_uri 应被 FILTER_VARS 过滤');
    }

    public function testSignature()
    {
        $this->assertSame(
            hash('sha256', 'appid-secret-1000'),
            Tool::getOpenApiSignature('appid', 'secret', 1000)
        );
    }

    /**
     * TlkRequest 必须允许动态属性，否则所有子类 setOptions 都会弃用
     */
    public function testRequestBaseAllowsDynamicProperties()
    {
        $ref = new \ReflectionClass(TlkRequest::class);
        $attrs = $ref->getAttributes();
        $names = array_map(function ($a) {
            return $a->getName();
        }, $attrs);

        $this->assertContains('AllowDynamicProperties', $names);
    }

    private function readProperty($object, $name)
    {
        $ref = new \ReflectionClass($object);
        $prop = $ref->getProperty($name);
        return $prop->getValue($object);
    }
}