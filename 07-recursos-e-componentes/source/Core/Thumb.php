<?php

namespace Source\Core;

use CoffeeCode\Cropper\Cropper;

class Thumb
{
    private Cropper $cropper;

    private string $upload;

    /**
     * @throws \Exception
     */
    public function __construct()
    {
        $this->cropper = new \CoffeeCode\Cropper\Cropper(CONFIG_IMAGE_CACHE, CONFIG_IMAGE_QUALITY['jpg'], CONFIG_IMAGE_QUALITY['png']);
        $this->upload = CONFIG_UPLOAD_DIR;
    }

    public function make(string $image, int $width, ?int $height = null): string
    {
        return $this->cropper->make("{$this->upload}/{$image}", $width, $height);
    }

    public function flush(?string $image = null): void
    {
        if($image){
            $this->cropper->flush("{$this->upload}/{$image}");
            return;
        }

        $this->cropper->flush();
        return;
    }

    public function cropper(): Cropper
    {
        return $this->cropper;
    }
}