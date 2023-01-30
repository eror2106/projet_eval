<?php

$sth = $db->prepare("SELECT * FROM users ");
$sth->bindParam(':username', $_POST['username']);
$sth->execute();

$row = $sth->fetch(PDO::FETCH_ASSOC);
