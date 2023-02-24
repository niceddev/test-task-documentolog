<?php

final class MySingleton
{
    private static ?MySingleton $instance = null;

    private function __construct(): void
    {
        // TODO: Implement __construct() method.
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __clone(): void
    {
        // TODO: Implement __clone() method.
    }

    private function __wakeup(): void
    {
        // TODO: Implement __wakeup() method.
    }

}
