<?php

namespace App\Domains\Auth\Models\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait HasImage
{
    /**
     * Update the user's profile photo.
     *
     * @param \Illuminate\Http\UploadedFile $photo
     * @return void
     */
    public function updateImage(UploadedFile $photo): void
    {
        tap($this->image, function ($previous) use ($photo) {
            $this->forceFill([
                'image' => $photo->storePublicly(
                    'images', ['disk' => $this->imageDisk()]
                ),
            ])->save();

            if ($previous) {
                Storage::disk($this->imageDisk())->delete($previous);
            }
        });
    }

    /**
     * Delete the user's profile photo.
     *
     * @return void
     */
    public function deleteImage(): void
    {

        if (is_null($this->image)) {
            return;
        }

        Storage::disk($this->imageDisk())->delete($this->image);

        $this->forceFill([
            'image' => null,
        ])->save();
    }

    /**
     * Get the URL to the user's profile photo.
     *
     * @return string
     */
    public function getImageUrlAttribute(): string
    {

        return $this->image
            ? Storage::disk($this->imageDisk())->url($this->image)
            : $this->defaultImageUrl();
    }

    /**
     * Get the default profile photo URL if no profile photo has been uploaded.
     *
     * @return string
     */
    protected function defaultImageUrl(): string
    {
        $name = trim(collect(explode(' ', $this->slug ?? $this->name))->map(function ($segment) {
            return mb_substr($segment, 0, 1);
        })->join(' '));
        return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&color=7F9CF5&background=EBF4FF';
    }

    /**
     * Get the disk that profile photos should be stored on.
     *
     * @return string
     */
    protected function imageDisk(): string
    {
        return isset($_ENV['VAPOR_ARTIFACT_NAME']) ? 's3' : config('attendize.profile_photo_disk', 'public');
    }
}
