#!/bin/bash

# Script to create storage link by copying files (for shared hosting)
# Run this script on your server when symlink() function is disabled

echo "Creating storage link by copying files..."

# Create public/storage directory if it doesn't exist
mkdir -p public/storage

# Remove existing storage directory if it exists
if [ -d "public/storage" ]; then
    echo "Removing existing public/storage directory..."
    rm -rf public/storage/*
fi

# Copy all files from storage/app/public to public/storage
echo "Copying files from storage/app/public to public/storage..."
cp -r storage/app/public/* public/storage/ 2>/dev/null || echo "No files to copy or directory doesn't exist"

# Set proper permissions
chmod -R 755 public/storage

echo "Storage link created successfully!"
echo "Note: You may need to run this script again after uploading new files to storage/app/public"
