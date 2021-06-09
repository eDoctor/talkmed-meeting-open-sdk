### TalkMed Meeting Open Api Sdk 

  ####  Wiki 地址

```
https://wiki.meeting.talkmed.com
```


#### 安装

```
composer require edoctor/talkmed-meeting-open-sdk
```

#### 使用

##### 示例

```
use eDoctor\Meeting\MeetingClient;
use eDoctor\Meeting\Models\Live\LiveRecordRequest;
use PHPUnit\Framework\TestCase;
/**
 * Class LiveTest
 * @package Meeting\Test
 */
class LiveTest extends TestCase
{

    public function testLiveRecordRequest() {
    
        $client  = (new MeetingClient(self::APP_ID, self::APP_SECRET))->setApiBaseUri('https://devapimeeting.talkmed.com');
        $live = new LiveRecordRequest(1631372727);
        $res = $client->setApiVersion('v1')->request($live);
        $this->assertEquals($res['code'],0);
    }
}    
```


#####  客户端

```
$client  = new MeetingClient('app_id', 'app_secret')->setApiBaseUri('https://devapimeeting.talkmed.com');		

```

说明

```
setApiBaseUri()  设置环境域名 
setApiVersion()  设置请求接口的版本 可不设置  默认v1接口
```

#### 入参请求

##### 第一种（推荐）

```
     $live = new LiveJoinRequest(2089596951);
     $live->setUserId(457);
     $live->setRoomRole(2);
     $live->setRoomPassword('023457');
  
     //发起请求
     $res = $client->request($live);
```


##### 第二种
```
     $options =  array(
       'user_id'       =>  457,
       'room_role'     =>  2,
       'room_password' => '023457'
     );
     $live = new LiveJoinRequest(2089596951);
     $live->setOptions(options);	
 
	 //发起请求	
     $res = $client->request($live);
```

说明:

```
 new LiveJoinRequest(2089596951);  //请求参数对象构造函数会初始化请求uri
 具体请求方法参照 wiki/Ide 提示
```
