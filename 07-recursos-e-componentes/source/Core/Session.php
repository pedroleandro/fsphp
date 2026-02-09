<?php

namespace Source\Core;

class Session
{
    public function __construct()
    {
        if (!session_id()) {
            session_save_path(CONFIG_SESSION_PATH);
            session_start();
        }
    }

    public function __get(string $name)
    {
        if (empty($_SESSION[$name])) {
            return null;
        }
        return $_SESSION[$name];
    }

    public function __isset(string $name): bool
    {
        return $this->has($name);
    }

    public function all(): ?object
    {
        return (object)$_SESSION;
    }

    public function set(string $key, mixed $value): Session
    {
        $_SESSION[$key] = (is_array($value) ? (object)$value : $value);
        return $this;
    }

    public function unset(string $key): Session
    {
        unset($_SESSION[$key]);
        return $this;
    }

    public function has(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    public function regenerate(): Session
    {
        session_regenerate_id(true);
        return $this;
    }

    public function destroy()
    {
        session_destroy();
        return $this;
    }

    public function flash(): ?Message
    {
        if($this->has("flash")){
            $flash = $this->flash;
            $this->unset("flash");
            return $flash;
        }
        return null;
    }

    public function csrf()
    {
        $_SESSION['csrf_token'] = base64_encode(random_bytes(32));
    }
}