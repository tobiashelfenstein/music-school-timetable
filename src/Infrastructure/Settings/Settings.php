<?php

namespace App\Infrastructure\Settings;

class Settings {
    private array $settings;

    public function __construct(array $settings) {
        $this->settings = $settings;
    }

    public function get(string $key): mixed {
        return $this->settings[$key] ?? null;
    }
}