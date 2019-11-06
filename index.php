<?php
	
	use App\Model;
	use App\Models\HasEmail;
	use App\Models\User;
	
	require __DIR__ . '/autoload.php';
	
	//$db = new \App\Db();
	//echo \App\Models\User::$table;
	//$users = \App\Models\User::findById(2);
	$users = User::findAll();
	//$users = \App\Models\User::getByCount(2);
	//$news = \App\Models\News::getByCount(3);
	//$news = \App\Models\News::findAll();
	//var_dump($users[0]->getEmail());
	function sendEmail(HasEmail $user, string $message)
	{
		echo 'Sending ' . $message . ' to ' . $user->email;
	}
	sendEmail($users[0], 'Yo, man!');
	
	//include __DIR__ . '/App/templates/news.php';
	