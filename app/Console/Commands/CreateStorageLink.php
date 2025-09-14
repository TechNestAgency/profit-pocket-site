<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CreateStorageLink extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'storage:link-copy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a storage link by copying files instead of symlink (for shared hosting)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $target = storage_path('app/public');
        $link = public_path('storage');

        // Check if target directory exists
        if (!File::exists($target)) {
            $this->error('The target directory does not exist: ' . $target);
            return 1;
        }

        // Remove existing link if it exists
        if (File::exists($link)) {
            if (File::isDirectory($link)) {
                File::deleteDirectory($link);
            } else {
                File::delete($link);
            }
        }

        // Create the directory
        File::makeDirectory($link, 0755, true);

        // Copy all files and directories
        $this->copyDirectory($target, $link);

        $this->info('Storage link created successfully by copying files.');
        $this->info('Note: You may need to run this command again after uploading new files to storage/app/public');

        return 0;
    }

    /**
     * Copy directory recursively
     */
    private function copyDirectory($source, $destination)
    {
        if (!File::isDirectory($source)) {
            return false;
        }

        if (!File::isDirectory($destination)) {
            File::makeDirectory($destination, 0755, true);
        }

        $items = File::allFiles($source);
        $directories = File::directories($source);

        // Copy files
        foreach ($items as $item) {
            $relativePath = str_replace($source . DIRECTORY_SEPARATOR, '', $item->getPathname());
            $destPath = $destination . DIRECTORY_SEPARATOR . $relativePath;
            $destDir = dirname($destPath);
            
            if (!File::isDirectory($destDir)) {
                File::makeDirectory($destDir, 0755, true);
            }
            
            File::copy($item->getPathname(), $destPath);
        }

        // Copy subdirectories
        foreach ($directories as $directory) {
            $relativePath = str_replace($source . DIRECTORY_SEPARATOR, '', $directory);
            $destPath = $destination . DIRECTORY_SEPARATOR . $relativePath;
            $this->copyDirectory($directory, $destPath);
        }

        return true;
    }
}
