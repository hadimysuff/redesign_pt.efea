<?php

namespace App\Concerns;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

/**
 * Small helper for storing uploaded images on the "public" disk. Replaces the
 * previous file on update and cleans up when a record is removed.
 */
trait HandlesImageUpload
{
    /**
     * Store a newly uploaded image, deleting the previous one if provided.
     * Returns the stored path, or the old path when no new file was uploaded.
     */
    protected function storeImage(?UploadedFile $file, string $folder, ?string $old = null): ?string
    {
        if (! $file) {
            return $old;
        }

        $this->deleteImage($old);

        return $file->store($folder, 'public');
    }

    /**
     * Delete an image from the public disk if it exists.
     */
    protected function deleteImage(?string $path): void
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
