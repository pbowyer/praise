<?php
declare(strict_types=1);

namespace bowyer\Praise;


class Praise
{
    private $data = [];
    private $dataPath = __DIR__.'/../data';

    public static function praise($template = "You are {{adjective}}!")
    {
        $self = new self();
        return $self->say($template);
    }

    public function say($template = "You are {{adjective}}!")
    {
        return preg_replace_callback('!{{([a-zA-Z]+)}}!', [$this, 'fillTemplate'], $template);
    }

    private function fillTemplate($matches)
    {
        $data = $this->getData($matches[1]);
        return $data ? $this->matchCase($data[array_rand($data)], $matches[1]) : $matches[0];
    }

    private function matchCase($value, $placeholder): string
    {
        if (strtoupper($placeholder) === $placeholder) {
            return strtoupper($value);
        }
        if (ucfirst($placeholder) === $placeholder) {
            return ucfirst($value);
        }
        return $value;
    }

    private function getData($key): ?array
    {
        $key = strtolower($key);
        if (isset($this->data[$key])) return $this->data[$key];

        $file = $this->dataPath . DIRECTORY_SEPARATOR . $key .'.json';
        if (file_exists($file)) {
            $this->data[$key] = \json_decode(file_get_contents($file), true);
            return $this->data[$key];
        }
        return null;
    }
}