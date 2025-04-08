<?php

use Dibi\DateTime;
use LeanMapper\Entity;

require_once __DIR__ . '/../bootstrap.php';

//////////

/**
 * @property int           $id
 * @property int           $status
 * @property DateTime|null $published
 */
class Book extends Entity
{
}

$dibiRow = new \Dibi\Row(
	[
		'published' => new \Dibi\DateTime,
	]
);

$book = new Book(LeanMapper\Result::createInstance($dibiRow, 'book', $connection, $mapper)->getRow(LeanMapper\Result::DETACHED_ROW_ID));

Tester\Assert::type(\Dibi\DateTime::class, $book->published);
Tester\Assert::type(DateTimeImmutable::class, $book->published);
