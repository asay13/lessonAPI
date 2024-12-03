<?php

namespace DTO;

readonly class CreateRequestProductDTO
{
    public function __construct(
        public string $name,
        public string $code,
        public int $price,
        public string|null $colour
    )
    {
    }
}