<?php
error_reporting(-1);
define('BASEDIR', __DIR__); //定义当前目录
include BASEDIR. DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR.'loader' .DIRECTORY_SEPARATOR . 'Loader.php';

//注册自动加载函数
spl_autoload_register('\\Loader\\Loader::autoload');
require BASEDIR . '/vendor/autoload.php';
//加载配置
$config = new \config\Config(__DIR__. DIRECTORY_SEPARATOR .'config');

//配置注册全局树上
$database = $config['database'];
pattern\Register::set('database',$database);

//单例模式
$db = database\Database::getDbInstance();
$res = $db->query('show full fields  from users');
$res = mysqli_fetch_array($res);

//工厂模式
$db_connection = pattern\Factory::getDb();
//注册树模式
$db_connection2 = pattern\Register::get('db');

//适配器模式
$db = new database\db\PDO();
$db->connect($database['host'],$database['username'], $database['password'],$database['dbname']);
$sql = 'select * from users';
$res = $db->query($sql);
$res = $res->fetchAll();
$db->close();

//策略模式
//更新内容 修改策略即可，无需修改源代码
$obj = new \pattern\strategy\Page();
$strategy = new pattern\strategy\Female();
$obj->setStrategy($strategy) ;
$obj->show();
$strategy2 = new pattern\strategy\Male();
$obj->setStrategy($strategy2);
$obj->show();

//观察者模式
// 增加观察者
$observer1 = new \pattern\Observer\Observer1();
$observer2 = new \pattern\Observer\Observer2();
$event = new \pattern\Observer\Event();
$event->addObserver($observer1);
$event->addObserver($observer2);
$event->trigger();

//原型模式---节约资源 譬如有一个大对象new出来会消耗很多资源，如需多次new则耗大量资源 不如clone划算
$prototype = new \pattern\strategy\Page();
//进行一些列初始化
//对对象进行克隆
$clone_obj = clone $prototype;

//装饰器
$human = new \pattern\decorator\Human();
$wash_decorator = new \pattern\decorator\WashDecorator();
$sing_decorator = new \pattern\decorator\SingDecorator();
$human->addDecorator($wash_decorator);
$human->addDecorator($sing_decorator);
$human->eat();

//迭代器模式
$users = new \pattern\Iterator();
foreach ($users as $user) {
    var_dump($user);
}

// 代理模式
// 实现读写分离的思路
$id =1;
$name = '我';
$proxy = new \pattern\proxy\Proxy();
$proxy->get($id);
$proxy->set($id,$name);

//ORM
$index = new app\model\User();
$obj = $index->findById(1);
$obj->name = 'jw';
$index->save();
