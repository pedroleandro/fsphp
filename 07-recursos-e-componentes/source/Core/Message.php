<?php

namespace Source\Core;

class Message
{
    private string $message;
    private string $type;

    public function __toString(): string
    {
        return $this->render();
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function info(string $message): Message
    {
        $this->message = $this->filter($message);
        $this->type = CONFIG_MESSAGE_INFO;
        return $this;
    }

    public function success(string $message): Message
    {
        $this->message = $this->filter($message);
        $this->type = CONFIG_MESSAGE_SUCESS;
        return $this;
    }

    public function warning(string $message): Message
    {
        $this->message = $this->filter($message);
        $this->type = CONFIG_MESSAGE_WARNING;
        return $this;
    }

    public function error(string $message): Message
    {
        $this->message = $this->filter($message);
        $this->type = CONFIG_MESSAGE_ERROR;
        return $this;
    }

    public function render(): string
    {
        return "<div class='". CONFIG_MESSAGE_CLASS ." {$this->getType()}'>{$this->getMessage()}</div>";
    }

    public function json(): string
    {
        return json_encode(
            [
                "status" => $this->getType(),
                "message" => $this->getMessage(),
                "data" => []
            ],
            JSON_UNESCAPED_UNICODE
        );
    }

    public function flash(): void
    {
        (new Session())->set("flash", $this);
    }

    private function filter(string $message)
    {
        return filter_var($message, FILTER_UNSAFE_RAW);
    }


}