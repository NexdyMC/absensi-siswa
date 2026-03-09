<?php
$date = new DateTime();

$formatter = new IntlDateFormatter(
    'id_ID',
    IntlDateFormatter::FULL,
    IntlDateFormatter::FULL,
    'Asia/Jakarta',
    IntlDateFormatter::GREGORIAN,
    'EEEE, dd MMMM yyyy - HH:mm:ss'
);

echo $formatter->format($date);

// Selasa, 10 Februari 2026 - 20:29:11