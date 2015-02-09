<?php namespace Indatus\Guardian\Commands;

/**
 * This file is part of Guardian
 *
 * (c) Ben Kuhl <bkuhl@indatus.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Indatus\Guardian\ConfirmableTrait;

/**
 * @inheritDoc
 */
class DatabaseSeedCommand extends \Illuminate\Database\Console\SeedCommand
{
    use ConfirmableTrait;
}
