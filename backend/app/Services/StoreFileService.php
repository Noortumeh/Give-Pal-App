<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class StoreFileService
{
    public function storeFile($file, $folderName)
    {
        $path = $file->store($folderName, 'public');
        return $path;
    }

    public function updateStoredFile($prevFile, $newFile, $folderName)
    {
        if ($prevFile && Storage::disk('public')->exists($prevFile)) {
            Storage::disk('public')->delete($prevFile);
        }
        $path = $this->storeFile($newFile, $folderName);

        return $path;
    }

    public function deleteStoredFile($file)
    {
        if ($file && Storage::disk('public')->exists($file)) {
            Storage::disk('public')->delete($file);
        }
    }
}
