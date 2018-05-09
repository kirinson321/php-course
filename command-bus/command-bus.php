<?php

require_once __DIR__ . '/vendor/autoload.php';

use Command\PingCommand;
use Command\PongCommand;
use CommandBus\CommandBus;
use Handler\PingHandler;
use Handler\PongHandler;
use Router\DirectRouter;

//customowy router, podawany do konstruktora command busa
$custom_router = new DirectRouter([
    PingCommand::class => PingHandler::class,
    PongCommand::class => PongHandler::class,
]);

//customowy router jest opcjonalnym parametrem konstruktora command busa;
$command_bus = new CommandBus($custom_router);
$command_bus->dispatch(new PingCommand());
$command_bus->dispatch(new PongCommand());