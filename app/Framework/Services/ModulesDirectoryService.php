<?php

declare(strict_types=1);

namespace App\Framework\Services;

use App\Framework\Exceptions\AppModulesNotFound;
use Exception;
use InvalidArgumentException;

class ModulesDirectoryService
{
    public const string MODULES_PATH = 'app/Modules/';

    /**
     * returns an array of domain paths if the domains directory exists
     *
     * @return array|null
     * @throws AppModulesNotFound
     * @throws InvalidArgumentException
     */
    public function listDomainPaths(): ?array
    {
        $baseModulesPath = base_path(self::MODULES_PATH);

        if (!file_exists($baseModulesPath)) {
            throw new AppModulesNotFound('app/Modules directory not found. Please create it.');
        }

        $modules = $this->getFolderContents($baseModulesPath);
        /** @var string[] $modulesPaths */
        $modulesPaths = [];


        foreach ($modules as $module) {
            $modulePath = base_path(self::MODULES_PATH) . $module;

            if (!is_dir($modulePath)) {
                continue;
            }

            $modulesPaths[] = $modulePath;
        }

        return $modulesPaths;
    }

    public function getFolderContents(string $path): array
    {
        if (!is_dir($path)) {
            throw new InvalidArgumentException('Path is not a directory');
        }

        return array_diff(scandir($path), ['.', '..']);
    }
}
