<?php
/**
 * includes/layout/header.php
 *
 * Header base del layout.
 */
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title><?= htmlspecialchars($title ?? 'App') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<header>
    <h2><?= htmlspecialchars(config('app')['name'] ?? 'App') ?></h2>
</header>
<main>
