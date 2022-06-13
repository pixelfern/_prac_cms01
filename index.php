<?php 
    declare(strict_types=1);
    require 'includes/database-connection.php';
    require 'includes/functions.php';

    sql="SELECT a.id, a.title, a.summary, a.category_id, a.member_id,
    c.name AS category,
    CONCAT (m.forename, '', m.surname) AS author,
    i.file AS image_file,
    i.alt  AS image_alt
    FROM article AS a
    JOIN category AS c ON a.category_id= c.id
    JOIN member AS m ON a.member_id=m.id
    LEFT JOIN image AS i ON a.image = i.id
    WHERE a.published =1
    ORDER BY a.id DESC
    LIMIT 6;";

    $articles=pdo($pdo, $sql)->fetchAll(); //get article summaries

    $sql="SELECT id, name FROM category WHERE navigation=1;";
    $navigation = pdo($pdo, $sql)->fetchAll();

    $section='';
    $title='Creative Folk';
    $description='A Collective of Creatives for Hire';
?>