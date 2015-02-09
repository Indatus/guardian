<?php

namespace spec\Indatus\Guardian;

use Illuminate\Config\Repository;
use Illuminate\Foundation\Application;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ConfirmationServiceSpec extends ObjectBehavior
{
    function let(Application $app, Repository $config)
    {
        $this->beConstructedWith($app, $config);
        $this->shouldHaveType('Indatus\Guardian\ConfirmationService');
    }

    function it_should_give_environment_specific_warning(Application $app)
    {
        $environment = 'demo';
        $app->environment()->willReturn($environment);

        $this->getConfirmationText()->shouldBe('Application in '.ucfirst($environment));
    }

    function it_should_confirm_when_current_environment_is_configured(Application $app, Repository $config)
    {
        $config->get('guardian::environments')->willReturn(['demo', 'production']);

        $app->environment('demo', 'production')->willReturn(true);

        $this->needsConfirmation()->shouldBe(true);
    }

    function it_should_not_confirm_when_not_in_configured_enivronment(Application $app, Repository $config)
    {
        $config->get('guardian::environments')->willReturn(['local']);

        $app->environment('local')->willReturn(false);

        $this->needsConfirmation()->shouldBe(false);
    }
}
