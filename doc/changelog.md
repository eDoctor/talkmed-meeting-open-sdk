## 版本更新记录

### v2.1 20261029

#### 更新
- 完整支持 PHP 8.4 / 8.5，兼容范围 `^7.2.5 || ^8.0`
- `guzzlehttp/guzzle` 约束由 `~7.4.5` 放宽为 `^7.0`（原约束会把 guzzle 锁死 7.4.5，
  其依赖 guzzlehttp/promises 1.x 在 PHP 8.5 下每次加载都会输出弃用告警）
- `TlkRequest` 增加 `#[\AllowDynamicProperties]`，消除 PHP 8.2+ 动态属性弃用告警
  （各模型 `setOptions()` 允许写入任意字段）
- `MeetingClient::getVars()` 移除 `ReflectionProperty::setAccessible()`，该方法
  自 PHP 8.1 起无效、8.5 起弃用
- 请求头 `timestamp` 改为字符串，消除 guzzle 7.11+ 的 "Passing int to request
  option headers" 弃用告警（guzzle 8.0 起只接受 string）
- `require-dev` 升级：phpunit `^9.6 || ^10.5 || ^11.5`、mockery `^1.3`
- 新增 phpunit.xml.dist、无网络单元测试、GitHub Actions 多版本 CI

#### 修复
- `RequestException` 构造函数原为直接 `throw new \Exception()`，导致该异常永远无法被
  catch，且第二个参数传非 int 时触发 TypeError；现改为正常调用 `parent::__construct()`
- 修复 8 个文件的命名空间笔误（写成 `App\Helper` / `App\Helpers`），
  这些类此前无法通过 PSR-4 加载：
  `Models/LiveAd/*`(3)、`Models/LivePopup/*`(3)、`Models/Menu/MenuShowRequest`、
  `Models/Live/LiveOnlineRealtimeRequest`
- 测试文件中的相对 `require` 改用 `__DIR__` 定位

### v2.0 20220303

#### 更新
- php版本最低为7.4

### v1.07 20220303
#### 新增

- 解绑当前公司用户 
- 增加用户更新请求

### v1.0.6  20211229

#### 新增

- 表单绑定接口
- 用户表单数据填写接口  
- 表单数据导出接口
- 检验token是否在meeting登录接口
- 会议白名单新增接口
- 会议白名单删除接口


### v1.0.5

#### 更新

- 增加相关注解便于日常项目开发

### v1.0.1

#### 更新

- 更新优化相关接口逻辑


### v1.0.0  

#### 新增

- 初始化Meeting Wiki 相关接口

