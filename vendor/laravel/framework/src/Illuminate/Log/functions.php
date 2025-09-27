<?php

namespace Illuminate\Log;

<<<<<<< HEAD
use Psr\Log\LoggerInterface;

=======
>>>>>>> dev
if (! function_exists('Illuminate\Log\log')) {
    /**
     * Log a debug message to the logs.
     *
     * @param  string|null  $message
     * @param  array  $context
<<<<<<< HEAD
     * @return ($message is null ? \Psr\Log\LoggerInterface: null)
     */
    function log($message = null, array $context = []): ?LoggerInterface
=======
     * @return ($message is null ? \Illuminate\Log\LogManager : null)
     */
    function log($message = null, array $context = []): ?LogManager
>>>>>>> dev
    {
        return logger($message, $context);
    }
}
