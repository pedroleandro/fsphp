<?php

namespace Source\Core;

use CoffeeCode\Uploader\File;
use CoffeeCode\Uploader\Image;
use CoffeeCode\Uploader\Media;

class Upload
{
    private Message $message;

    public function __construct()
    {
        $this->message = new Message();
    }

    public function message(): Message
    {
        return $this->message;
    }

    public function image(array $image, string $name, int $width = CONFIG_IMAGE_SIZE): ?string
    {
        $upload = new Image(CONFIG_UPLOAD_DIR, CONFIG_UPLOAD_IMAGE_DIR);

        if(empty($image['type']) || !in_array($image['type'], $upload::isAllowed())){
            $this->message()->error("Você não selecionou uma imagem válida!");
            return null;
        }

        return $upload->upload($image, $name, $width, CONFIG_IMAGE_QUALITY);
    }

    public function file(array $file, string $name): ?string
    {
        $upload = new File(CONFIG_UPLOAD_DIR, CONFIG_UPLOAD_FILE_DIR);

        if(empty($file['type']) || !in_array($file['type'], $upload::isAllowed())){
            $this->message()->error("Você não selecionou um arquivo válido!");
            return null;
        }

        return $upload->upload($file, $name);
    }

    public function media(array $media, string $name): ?string
    {
        $upload = new Media(CONFIG_UPLOAD_DIR, CONFIG_UPLOAD_MEDIA_DIR);

        if(empty($media['type']) || !in_array($media['type'], $upload::isAllowed())){
            $this->message()->error("Você não selecionou uma mídia válida!");
            return null;
        }

        return $upload->upload($media, $name);
    }

    public function remove(string $filePath): void
    {
        if(file_exists($filePath) && is_file($filePath)){
            unlink($filePath);
        }
    }
}