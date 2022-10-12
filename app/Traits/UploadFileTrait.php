<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

trait UploadFileTrait
{
    /**
     * Upload file to specific directory and store the path in the table field.
     *
     * @param  UploadedFile|null $file
     * @param  string        $field
     * @param  string        $dir
     * @return string|null
     */
    public function uploadFile(UploadedFile|null $file, string $field, string $dir): string|null
    {
        if($file instanceof UploadedFile) {
            $this->deleteFile($field);

            return $file->store($dir);
        }

        return $this->attributes[$field] ?? NULL;
    }

    /**
     * Delete file by it's table field name.
     *
     * @param  string $field
     * @return void
     */
    public function deleteFile(string $field): void
    {
        if(array_key_exists($field, $this->attributes) && !empty($this->attributes[$field])) {
            Storage::delete($this->attributes[$field]);
        }
    }

    /**
     * Get the specific file url or default file when not found.
     *
     * @param  string|null $path
     * @param  string      $field
     * @return string|null
     */
    public function getFileUrl(?string $path, string $field): ?string
    {
        return $path ? Storage::url($path) : $this->getNotfoundFile($field);
    }

    /**
     * Get file to display when main file is not found.
     *
     * @param  string      $field
     * @return string|null
     */
    protected function getNotfoundFile(string $field): ?string
    {
        if(Str::endsWith($field, '_file')) {
            return NULL;
        }

        return match(get_class($this)) {
            // \App\Models\Admin::class => '',
            default => asset('assets/images/icon.png')
        };
    }
}
