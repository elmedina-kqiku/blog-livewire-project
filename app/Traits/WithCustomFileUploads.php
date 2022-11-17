<?php
namespace App\Traits;
use Livewire\FileUploadConfiguration;
use Livewire\WithFileUploads;

trait WithCustomFileUploads
{
    use WithFileUploads;
    protected function cleanupOldUploads()
    {
        if (FileUploadConfiguration::isUsingS3()) {
            return;
        }
        $storage = FileUploadConfiguration::storage();
        foreach ($storage->allFiles(FileUploadConfiguration::path()) as $filePathname) {
            // On busy websites, this cleanup code can run in multiple threads causing part of the output
            // of allFiles() to have already been deleted by another thread.
            if (!$storage->exists($filePathname)) {
                continue;
            }
            $yesterdaysStamp = now()->subMinutes(config('project.temporary_file_upload_minutes', 15))->timestamp;
            if ($yesterdaysStamp > $storage->lastModified($filePathname)) {
                $storage->delete($filePathname);
            }
        }
    }
}









