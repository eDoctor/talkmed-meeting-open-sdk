
### Talkmed Meeting Open Api Sdk 


####安装

```
composer require edoctor/meeting
```

####使用

##### 客户端

```
$client  = new MeetingClient('app_id', 'app_secret')->setApiBaseUri('https://devapimeeting.talkmed.com');		
```

说明

```
setApiBaseUri()  设置环境域名 
setApiVersion()  设置请求接口的版本 可不设置  默认v1接口
```

#### 请求(两种请求方式)

##### 第一种

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
 $user = new UserRegisterRequest(); 初始化uri
 
 
```

