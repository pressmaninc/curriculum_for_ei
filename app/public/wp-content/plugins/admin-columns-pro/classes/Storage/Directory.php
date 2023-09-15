<?php

declare(strict_types=1);

namespace ACP\Storage;

use ACP\Exception\FailedToCreateDirectoryException;
use DirectoryIterator;
use SplFileInfo;

final class Directory
{

    private $info;

    public function __construct(string $path)
    {
        $this->info = new SplFileInfo($path);
    }

    public function exists(): bool
    {
        return $this->info->getRealPath() !== false;
    }

    public function is_readable(): bool
    {
        return $this->info->isReadable();
    }

    public function get_info(): SplFileInfo
    {
        return $this->info;
    }

    /**
     * @throws FailedToCreateDirectoryException
     */
    public function create(): void
    {
        if ($this->exists()) {
            return;
        }

        // Recursively try to set permissions to 0755 unless the system has wider permissions
        $result = @mkdir($this->info->getPathname(), (fileperms(ABSPATH) & 0777 | 0755), true);

        if ( ! $result) {
            throw new FailedToCreateDirectoryException($this->info->getPathname());
        }
    }

    public function has_path(string $path): bool
    {
        return false !== strpos($this->get_path(), $path);
    }

    /**
     * Proxy method to get the (real) path from the directory
     */
    public function get_path(): string
    {
        return $this->info->getRealPath() ?: '';
    }

    public function get_iterator(): DirectoryIterator
    {
        return new DirectoryIterator($this->get_path());
    }

}