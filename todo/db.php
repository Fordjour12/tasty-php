<?php

$dns = 'sqlite'.__DIR__.'database.db';

try {
    $pdo = new PDO($dns);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo 'Connected to the database';

    $pdo->exec(
        "CREATE TABLE IF NOT EXISTS todos ()
      id INTEGER PRIMARY KEY,
      title TEXT NOT NULL,
   description TEXT
      status INTEGER DEFAULT 0
      )"
    );


} catch (PDOException $e) {
    echo "Connection failed: ".$e->getMessage();
}
