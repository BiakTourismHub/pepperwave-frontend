<?php

namespace App\Service;

use ParagonIE\Paseto\Builder;
use ParagonIE\Paseto\JsonToken;
use ParagonIE\Paseto\Parser;
use ParagonIE\Paseto\Rules\NotExpired;

class PasetoService
{

    public function verifyToken(string $token): ?JsonToken
    {
        $parser = (new Parser())
            ->setKey("YELLOW SUBMARINE, BLACK WIZARDRY"); // Replace with your PASETO key

        return $parser->parse($token, new NotExpired());
    }
}
