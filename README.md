### TalkMed Meeting Open Api Sdk 


### 其他版本

- [go sdk](https://github.com/eDoctor/talkmed-meeting-open-sdk-golang)


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
$client  = (new MeetingClient('app_id', 'app_secret'))->setApiBaseUri('https://devapimeeting.talkmed.com');		

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

### 请求模块说明

| 命名空间                              | 方法名前缀          | 说明             |
| ------------------------------------- | ------------------- | ---------------- |
| eDoctor\Meeting\Models\User           | User                | 用户相关接口     |
| eDoctor\Meeting\Models\Live           | Live                | 会议相关接口     |
| eDoctor\Meeting\Models\LiveFlyCheck   | LiveCheck           | 会议飞检相关接口 |
| eDoctor\Meeting\Models\LiveFile       | File                | 文件相关接口     |
| eDoctor\Meeting\Models\LiveChat       | LiveChat            | 会议讨论相关接口 |
| eDoctor\Meeting\Models\Survey         | Survey              | 调研相关         |
| eDoctor\Meeting\Models\SurveyQuestion | SurveyQuestion      | 调研问题相关     |
| eDoctor\Meeting\Models\Menu           | Menu                | 菜单相关         |
| eDoctor\Meeting\Models\Form           | Form                | 表单相关         |
| eDoctor\Meeting\Models\WhiteList      | Whitelist           | 白名单相关       |
| eDoctor\Meeting\Models\Data           | 请求uri最后一个参数    | 数据相关         |

> 说明 :
>
> eDoctor\Meeting\Models\Data 内的方法可依据该例子：Uri 为  v1/open/room/{roomId:[0-9]+}/live_base  该方法为将live_base  拿出作为请求类 ，为LiveBaseRequest
>
>  new LiveJoinRequest(2089596951);  //请求参数对象构造函数会初始化请求uri
>  具体请求方法参照 wiki/Ide 提示



#### 参会跳转地址示例

```
use PHPUnit\Framework\TestCase;
use eDoctor\Meeting\Common\Tool;

class CommonTest extends TestCase {

    function testGetAuthorizeUrl(){
       $str = Tool::getAuthorizeUri('https://devmeeting.talkmed.com',self::APP_ID,self::APP_SECRET,'e96a4dba-4eb2-dd1d-7fa3-bdfcd36d98d7','1631372727','2','web','');
  	   print_r($str);
    }
 }   
 
例子:
https://devmeeting.talkmed.com/oauth/authorize?app_id=tk60bd8aefed173&auth_token=e96a4dba-4eb2-dd1d-7fa3-bdfcd36d98d7&timestamp=1623295227&signature=60bfde6b69b7d333892bf05586598235fea6cc96a323a076ea2f8d6a934337c8&platform=web&room_id=1631372727&role=2&channel=&password=
```

- ### [版本更新记录](doc/changelog.md)



