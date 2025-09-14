<?php

/**
 * Script to create storage link by copying files (for shared hosting)
 * Run this script directly on your server when symlink() function is disabled
 * 
 * Usage: php create_storage_link.php
 */

function copyDirectory($source, $destination) {
    if (!is_dir($source)) {
        return false;
    }

    if (!is_dir($destination)) {
        mkdir($destination, 0755, true);
    }

    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($source, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );

    foreach ($iterator as $item) {
        $destPath = $destination . DIRECTORY_SEPARATOR . $iterator->getSubPathName();
        
        if ($item->isDir()) {
            if (!is_dir($destPath)) {
                mkdir($destPath, 0755, true);
            }
        } else {
            copy($item, $destPath);
        }
    }

    return true;
}

echo "Creating storage link by copying files...\n";

$target = __DIR__ . '/storage/app/public';
$link = __DIR__ . '/public/storage';

// Check if target directory exists
if (!is_dir($target)) {
    echo "Error: The target directory does not exist: $target\n";
    echo "Creating the directory...\n";
    mkdir($target, 0755, true);
}

// Remove existing link if it exists
if (is_dir($link)) {
    echo "Removing existing public/storage directory...\n";
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($link, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::CHILD_FIRST
    );

    foreach ($iterator as $item) {
        if ($item->isDir()) {
            rmdir($item->getRealPath());
        } else {
            unlink($item->getRealPath());
        }
    }
    rmdir($link);
}

// Create the directory
mkdir($link, 0755, true);

// Copy all files and directories
if (copyDirectory($target, $link)) {
    echo "Storage link created successfully!\n";
    echo "Note: You may need to run this script again after uploading new files to storage/app/public\n";
} else {
    echo "Error: Failed to copy files\n";
}
