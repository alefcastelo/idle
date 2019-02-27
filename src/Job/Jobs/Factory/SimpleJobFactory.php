<?php

declare(strict_types=1);

namespace LinioPay\Idle\Job\Jobs\Factory;

use LinioPay\Idle\Job\Jobs\SimpleJob;
use LinioPay\Idle\Job\Workers\Factory\Worker as WorkerFactoryInterface;
use Psr\Container\ContainerInterface;

class SimpleJobFactory
{
    public function __invoke(ContainerInterface $container) : SimpleJob
    {
        $jobConfig = $container->get('config')['job'] ?? [];

        $workerFactory = $container->get(WorkerFactoryInterface::class);

        return new SimpleJob($jobConfig, $workerFactory);
    }
}
