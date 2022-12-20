<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

class ValidatorController extends Controller
{
    /**
     * @var pattern
     */
    private static $searchField = '/^[A-Za-z0-9 \._@\+\,\(\-]+$/u';

    /**
     * Check the data from a search field
     *
     * @param string $data
     * @return int 1 - if OK, otherwise - 0 (bad characters found)
     */
    public static function checkSearchField(string $data): int
    {
        return preg_match(self::$searchField, trim($data));
    }
}
