<?php
namespace App\Traits;
use Char0n\FFMpegPHP\Movie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Livewire\TemporaryUploadedFile;
use Symfony\Component\HttpFoundation\File\UploadedFile;
trait FileManager
{
    public function putUploadedFile(UploadedFile $file, array $data = [])
    {
        $filename = $file->getClientOriginalName();
        $data['original_name'] = $filename;
        $path = $this->generateFilePath($this->clean($filename));
        if (! $this->isImage($file)) {
            return $this->putFile($file, $path);
        }
        $image = Image::make($file);
        return $this->putInterventionImage($image, $path, $data);
    }
    public function putInterventionImage(\Intervention\Image\Image $image, string $path, array $data = [])
    {
        if (($data['resize'] ?? true)) {
            $image = $this->resizeImage($image);
        }
        $pixelAte = (int) ($data['pixelate'] ?? 0);
        if ($pixelAte > 0) {
            $image = $image->pixelate($pixelAte);
        }
        $options = [
            'visibility' => 'public',
        ];
        if ($originalName = $data['original_name'] ?? null) {
            $options['ContentDisposition'] = "attachment;filename=\"${originalName}\"";
        }
        Storage::put($path, $image->stream()->__toString(), $options);

        return $path;
    }
    public function putFile(UploadedFile $file, $path)
    {
        $title = $file->getClientOriginalName();
        Storage::putFileAs(null, $file, $path, [
            'visibility' => 'public',
            'ContentDisposition' => "attachment;filename=\"$title\"",
        ]);
        return $path;
    }
    public function putLivewireImage(TemporaryUploadedFile $image)
    {
        $filename = $this->generateFilePath($image->getClientOriginalName());
        $image = Image::make($image);
        return $this->putInterventionImage($image, $filename);
    }
    protected function isImage(UploadedFile $file)
    {
        $mimeType = $file->getMimeType() ?? $file->getClientMimeType();
        if (Str::contains($mimeType, 'image') && ! Str::contains($mimeType, 'svg')) {
            return true;
        }
        return false;
    }
    protected function isVideo(UploadedFile $file)
    {
        $mimeType = $file->getMimeType() ?? $file->getClientMimeType();
        return Str::contains($mimeType, 'video') ? true : false;
    }
    protected function isAudio(UploadedFile $file)
    {
        $mimeType = $file->getMimeType() ?? $file->getClientMimeType();
        return Str::contains($mimeType, 'audio') ? true : false;
    }
    protected function getFileType(UploadedFile $file)
    {
        $mimeType = $file->getMimeType() ?? $file->getClientMimeType();
        return explode('/', $mimeType)[0] ?? null;
    }
    protected function resizeImage(\Intervention\Image\Image $image, $size = null)
    {
        $height = $image->height();
        $width = $image->width();
        $resize = $size ?? config('blink.max_image_size', 1024);
        if ($height >= $width) {
            if ($height > $resize) {
                $image = $image->resize($resize, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }
        } else {
            if ($width > $resize) {
                $image = $image->resize($resize, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }
        }
        return $image;
    }
    protected function clean($string)
    {
        return preg_replace('/[^A-Za-z0-9_\s\-.]/', '', $string);
    }
    public function generateFilePath($filename)
    {
        return Str::random(32).'/'.$filename;
    }
    public function getDetailsFromVideo(UploadedFile $file, $shouldUploadThumbnail = true)
    {
        try {
            $ffmpgFilePath = config('project.ffmpeg');
            $movie = new Movie($file->getRealPath(), null, $ffmpgFilePath);
            $duration = $movie->getDuration();
            $frame = $movie->getFrameAtTime(1);
            $image = $frame->toGDImage();
            $thumbnail = $shouldUploadThumbnail
                ? $this->putInterventionImage(Image::make($image), $this->generateFilePath('image.jpg'))
                : $image;
        } catch (\Exception $exception) {
            throw $exception;
        }
        return [
            'duration' => $duration,
            'thumbnail' => $thumbnail,
        ];
    }
    public function getDetailsFromAudio(UploadedFile $file)
    {
        try {
            $ffmpgFilePath = config('project.ffmpeg');
            $movie = new Movie($file->getRealPath(), null, $ffmpgFilePath);
            $duration = $movie->getDuration();
        } catch (\Exception $exception) {
            throw $exception;
        }
        return [
            'duration' => $duration,
        ];
    }
}
