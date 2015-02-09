<?php namespace Indatus\Guardian;

/**
 * This file is part of Guardian
 *
 * (c) Ben Kuhl <bkuhl@indatus.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Illuminate\Console\ConfirmableTrait as LaravelConfirmableTrait;
use Closure;
use App;

trait ConfirmableTrait
{
    use LaravelConfirmableTrait {
        LaravelConfirmableTrait::confirmToProceed as parentConfirmToProceed;
    }

    /**
     * @param string   $warning
     * @param callable $callback
     *
     * @return bool
     */
    public function confirmToProceed($warning = 'Application In Production!', Closure $callback = null) {
        /** @var \Indatus\Guardian\ConfirmationService $confirmationService */
        $confirmationService = App::make('Indatus\Guardian\ConfirmationService');

        // determine if the confirmation prompt should be shown
        if ($confirmationService->needsConfirmation()) {

            // show the confirmation prompt, but don't leave
            // the decision of whether to show it up to Laravel
            return $this->parentConfirmToProceed(
                $confirmationService->getConfirmationText(),
                is_null($callback) ? $this->getYesMan() : $callback
            );
        }

        return true;
    }

    /**
     * Your wish is my command
     *
     * @return Closure
     */
    private function getYesMan()
    {
        return function () {
            return true;
        };
    }
}
