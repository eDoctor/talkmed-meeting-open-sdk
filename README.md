
### Talkmed Meeting Open Api Sdk 


#### 安装

```
composer require talkmed/meeting
```

#### 使用

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
     $res = $client->request($user);
```


##### 第二种
```
     $options =  array(
       'user_id'       => 457,
       'room_role'     => 2,
       'room_password' => '023457'
     );
     $live = new LiveJoinRequest(2089596951);
     $live->setOptions(options);	
		 //发起请求	
     $res = $client->request($user);
```

说明:

```
 new LiveJoinRequest(2089596951);  // 2089596951 请求对象构造函数会初始化请求uri
```



