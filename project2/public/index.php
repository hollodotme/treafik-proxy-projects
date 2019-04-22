<?php declare(strict_types=1);

ini_set( 'session.name', 'SIDP2' );
ini_set( 'session.save_handler', 'redis' );
ini_set( 'session.save_path', 'tcp://redis:6379?weight=1&database=0' );
ini_set( 'session.gc_maxlifetime', '84400' );

session_set_cookie_params( 84400, '/', 'dev.project2.com', true, true );

session_start();

$pdo = new PDO('mysql:host=db;port=3306', 'root', 'root');
$statement = $pdo->query("SELECT 'This is the DB of project 2'");

header('Content-Type: text/html; charset=utf-8', true, 200);
printf('<h1>%s</h1>', $statement->fetchColumn() );
printf('<p>Your session ID is: %s=%s</p>', session_name(), session_id());
