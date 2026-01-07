<?php
require __DIR__ . '/../vendor/autoload.php';
use MongoDB\BSON\ObjectId;

$client = new MongoDB\Client("mongodb://localhost:27017");
$db = $client->clothes;

$footwear = $db->footwear;
// Select
$footwear->find();

// Select where
$footwear->find(['size' => 42]);

// Insert
$footwear->insertOne([
    'brand' => 'Nike',
    'size' => 42,
    'price' => 59.99
]);

// Update
$footwear->updateOne(
    ['_id' => new ObjectId($id)],
    ['$set' => ['price' => 49.99]]
);

// Delete
$footwear->deleteOne(['_id' => new ObjectId($id)]);

