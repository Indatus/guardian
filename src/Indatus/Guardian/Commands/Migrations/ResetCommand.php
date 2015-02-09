<?php namespace Indatus\Guardian\Commands\Migrations;

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
class ResetCommand extends \Illuminate\Database\Console\Migrations\ResetCommand
{
    use ConfirmableTrait;
}
