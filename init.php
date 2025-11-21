<?php 

$conn = new PDO('sqlite:db.sqlite');
$conn->query('CREATE TABLE posts (id INTEGER PRIMARY KEY AUTOINCREMENT, content VARCHAR(1000))');
$conn->query("INSERT INTO posts (content) VALUES ('first posts'), ('second post')");

echo "table created and tow rows inserted\n";