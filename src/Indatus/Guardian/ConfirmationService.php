<?php namespace Indatus\Guardian;

/**
 * This file is part of Guardian
 *
 * (c) Ben Kuhl <bkuhl@indatus.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Illuminate\Config\Repository;
use Illuminate\Foundation\Application;

class ConfirmationService
{
    /** @var Application */
    protected $app;

    /** @var Repository */
    protected $config;

    public function __construct(Application $app, Repository $config)
    {
        $this->app = $app;
        $this->config = $config;
    }

    /**
     * The confirmation text to show
     *
     * @return string
     */
    public function getConfirmationText()
    {
        return 'Application in '.ucfirst($this->app->environment());
    }

    /**
     * Determine if the confirmation dialog should be shown
     *
     * @return bool
     */
    public function needsConfirmation()
    {
        return call_user_func_array(
            [
                $this->app,
                'environment'
            ],
            $this->config->get('guardian::environments')
        );
    }
}
