<?php
// error_reporting(0);
define('BASEDIR', __DIR__);
include BASEDIR.'/Loader.php';
spl_autoload_register('\\Loader\\Loader::autoload'); //自动加载
//配置文件
$config = new \config\Config(__DIR__.'/config');
pattern\Register::set('config',$config['database']);
// $req = require './config/database.php';



//单例模式
$obj = database\Database::getInstance();
$res = $obj->query('show full fields  from users');
$res = mysqli_fetch_array($res);

//工厂后
$obj2 = pattern\Factory::createDb(); //这样修改代码则不用修改多处的麻烦

//注册树模式
$obj3 = pattern\Register::get('db');


//适配器模式
$db = new database\db\PDO();
$res1 = $db->connect('127.0.0.1','root','root','test');
$sql = 'select * from objects';
$res = $db->query($sql);
$db->close();



//策略模式
class Page{
	protected $strategy;
	function show()
	{
		$this->strategy->showAd();
		$this->strategy->showCategory();
	}

	function setStrategy(\pattern\strategy\Strategy $strategy)
	{
		$this->strategy = $strategy;
	}
}

$obj = new Page();
$strategy = new pattern\strategy\Female(); //如有修改我只需再修改策略即可，不必修改程序源码
$obj->setStrategy($strategy);
$obj->show();

$strategy2 = new pattern\strategy\Male();
$obj->setStrategy($strategy2);
$obj->show();



// ORM+工厂+注册树
Class ORMUser
{
	public function index()
	{
		$user = \pattern\Factory::createORMUser(1);
		var_dump($user);
		$user->created_at = date('Y-m-d H:i:s',time());
		$this->show();
	}

	public function show()
	{
		$user = \pattern\Factory::createORMUser(1);
		var_dump($user);
		$user->rname = 'whh';
	}
}

$orm = new ORMUser();
$orm->index();



//观察者模式
Class Event extends pattern\Observer\EventGenerator
{
	function trigger()
	{
		echo "<br>Event<br>";
		$this->notify();
	}
}



// 增加观察者
Class Observer1 implements pattern\Observer\Observer
{
	function update()
	{
		echo '逻辑1<br>';
	}
}
Class Observer2 implements pattern\Observer\Observer
{
	function update()
	{
		echo '逻辑2<br>';
	}
}

$observer1 = new Observer1();
$observer2 = new Observer2();
$event = new Event();
$event->addObserver($observer1);
$event->addObserver($observer2);

$event->trigger();



//原型模式---节约资源 譬如有一个大对象new出来会消耗很多资源，如需多次new则耗大量资源 不如clone划算
$prototype = new Page(); //随便一个类都可以
// 进行一些列初始化
//对对象进行克隆
$clone_obj = clone $prototype;



//装饰器模式
Class Human
{
	protected $decorators = [];
	public function eat()
	{
		$this->beforeat();
		echo "吃饭<br>";
		$this->aftereat();
	}

	public function beforeat()
	{
		foreach ($this->decorators as $decorator) {
			$decorator->beforeDo();
		}
	}

	public function aftereat()
	{
		krsort($this->decorators);
		foreach ($this->decorators as $decorator) {
			$decorator->afterDo();
		}
	}

	public function addDecorator(pattern\Decorator $decorator)
	{
		$this->decorators[] = $decorator;
	}
}

Class WashDecorator implements pattern\Decorator
{
	function beforeDo()
	{
		echo '洗手<br>';
	}

	function afterDo()
	{
		echo "再次洗手<br>";
	}
}
Class SingDecorator implements pattern\Decorator
{
	function beforeDo()
	{
		echo '唱歌<br>';
	}

	function afterDo()
	{
		echo "再次唱歌<br>";
	}
}

$human = new Human();
$wash_decorator = new WashDecorator();
$sing_decorator = new SingDecorator();
$human->addDecorator($wash_decorator);
$human->addDecorator($sing_decorator);
$human->eat();



//迭代器模式
$users = new \pattern\Iterator();
foreach ($users as $user) {
	var_dump($user);
}



// 代理模式 实现读写分离的思路
$id =1;
$name = '我';
$proxy = new \pattern\proxy\Proxy();
$proxy->getUserName($id);
$proxy->setUserName($id,$name);

$index = new model\Index();
$obj = $index->findById(3);
$obj->rname = 'jw';
var_dump($index->rname);
$index->save();
