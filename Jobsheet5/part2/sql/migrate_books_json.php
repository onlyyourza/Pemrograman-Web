<?php
// Jobsheet 8 exercise 7.4 no. 4: migrate data/books.json (from Jobsheet 6) into the books table.
// Run from the project folder (the folder that contains index.php):
//   php sql/migrate_books_json.php
// Safe to run more than once: a book whose title + author already exist is skipped.

require __DIR__ . '/../includes/connection.php';

$jsonFile = __DIR__ . '/../data/books.json';
$books = json_decode(file_get_contents($jsonFile), true);
if (!is_array($books)) {
    die("Could not read " . $jsonFile . "\n");
}

$check = $pdo->prepare("SELECT COUNT(*) FROM books WHERE title = :title AND author = :author");
$insert = $pdo->prepare(
    "INSERT INTO books (title, author, year, isbn, stock, category)
     VALUES (:title, :author, :year, :isbn, :stock, :category)"
);

$inserted = 0;
$skipped = 0;
foreach ($books as $book) {
    $check->execute(['title' => $book['title'], 'author' => $book['author']]);
    if ($check->fetchColumn() > 0) {
        echo "SKIP   " . $book['title'] . " (already in the table)\n";
        $skipped++;
        continue;
    }

    // books.json has no isbn/category keys, so ?? null stores NULL for them.
    $insert->execute([
        'title' => $book['title'],
        'author' => $book['author'],
        'year' => (int) $book['year'],
        'isbn' => $book['isbn'] ?? null,
        'stock' => (int) $book['stock'],
        'category' => $book['category'] ?? null,
    ]);
    echo "INSERT " . $book['title'] . "\n";
    $inserted++;
}

echo "\nDone: " . $inserted . " inserted, " . $skipped . " skipped.\n";
