<?php require_once __DIR__ . '/../header.php';
/* @var \App\Entity\Book $book */
?>

<h1><?= $book->getTitle(); ?></h1>
<p><?= $book->getDescription(); ?></p>



<?php require_once __DIR__ . '/../footer.php'; ?>