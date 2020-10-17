<?php
$sql[] = "CREATE TABLE loggers(
     id int NOT NULL AUTO_INCREMENT,
     name varchar(255) NOT NULL,
     PRIMARY KEY (id)
)";
$sql[] = "INSERT INTO loggers (`name`) VALUES ('PRESTASHOP')";
$sql[] = "INSERT INTO loggers (`name`) VALUES ('NGINX_SERVER')";
$sql[] = "CREATE TABLE logs (
    id int NOT NULL AUTO_INCREMENT,
    logger int NOT NULL,
    date datetime NOT NULL,
    importance int NOT NULL,
    message VARCHAR(255) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (logger) REFERENCES loggers(id)
);";
foreach ($sql as $value){
    $stmt = $connection->prepare($value);
    if($stmt){
        $stmt->execute();
    }
}
echo "<a href='index.php'>Tornar a carregar.</a>";