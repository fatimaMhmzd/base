<?php

namespace App\Imports;

use Illuminate\Support\Collection;

abstract class BaseImport
{
    public array $headers = [];

    public array $result = [];

    abstract public function headers(): array;

    public function __construct()
    {
        $this->headers = $this->headers() ?? [];
    }

    public function standard_data(Collection|array $rows): array
    {
        $list_standard = [];

        if ($rows instanceof Collection) {
            $rows = $rows->toArray();
        }

        array_shift($rows);

        foreach ($rows as $row) {
            $item = [];
            foreach ($this->headers as $key => $value) {
                if (str_contains($value, "[]")) {
                    $value = rtrim($value, "[]");
                    if (!isset($item[$value])) {
                        $item[$value] = [];
                    }
                    if (isset($row[$key]) && filled($row[$key])) {
                        $item[$value][] = $row[$key];
                    }
                } else {
                    $item[$value] = $row[$key] ?? null;
                }
            }
            $list_standard[] = $item;
        }
        return $list_standard;
    }

    public function setterResult(array|Collection $result)
    {
        if (!is_array($result)) {
            $result = $result->toArray();
        }

        $this->result[] = $result;
        $this->result = call_user_func_array('array_merge', $this->result);
    }

    public function getterResult()
    {
        return $this->result ?? [];
    }

}
