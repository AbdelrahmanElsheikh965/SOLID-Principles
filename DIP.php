<?php
# Dependancy Inversion Principle

/*
    High-level modules should not depend upon anything from low-level modules.
    Both should depend on abstractions (e.g., interfaces).
    Abstractions should not depend on details. Details (concrete implementations) should depend on abstractions.

*/
use Exception;

class DatabaseLogger
{
    public function logError(string $message)
    {
        // ..
    }
}

class MailerService
{
    private DatabaseLogger $logger;

    public function __construct(DatabaseLogger $logger)
    {
        $this->logger = $logger;
    }

    public function sendEmail(): void
    {
        try {
            // ..
        } catch (Exception $exception) {
            $this->logger->logError($exception->getMessage());
        }
    }
}
// What if we want to log information about errors to a file or to Sentry? 
// We will have to change MailerService. This is not a flexible solution, such a replacement becomes problematic.

// Now solution is 
interface new_LoggerInterface
{
    public function logError(string $message): void;
}

// We should reduce dependencies(inheriting) to specific implementations, but rely on interfaces.
// If we make any change to the interface (it violates the open/close principle),
// this change necessitates changes in the implementations of this interface (classes).
// But if we need to change a specific implementation, we probably don't need to change our interface.

class new_DatabaseLogger implements new_LoggerInterface
{
    public function logError(string $message): void
    {
        // ..
    }
}

class new_MailerService
{
    // object from any class implementing this interface (which makes it dynamic)
    private new_LoggerInterface $logger;  

    public function __construct(new_LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function sendEmail(): void
    {
        try {
            // ..
        } catch (Exception $exception) {
            $this->logger->logError($exception->getMessage());
        }
    }
}

/**
 * Key Takeaways
    * The Dependency Inversion Principle aims to remedy bad design resulting from rigidity, fragility and immobility.
    * Classes that use other classes should both depend on abstractions and not directly on each other.
    * The Dependency Inversion Principle in PHP can be implemented using interfaces.
 */