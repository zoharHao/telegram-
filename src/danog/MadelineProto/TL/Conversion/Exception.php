<?php

/*
Copyright 2016-2018 Daniil Gentili
(https://daniil.it)
This file is part of MadelineProto.
MadelineProto is free software: you can redistribute it and/or modify it under the terms of the GNU Affero General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
MadelineProto is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
See the GNU Affero General Public License for more details.
You should have received a copy of the GNU General Public License along with MadelineProto.
If not, see <http://www.gnu.org/licenses/>.
*/

namespace danog\MadelineProto\TL\Conversion;

class Exception extends \Exception
{
    use \danog\MadelineProto\TL\PrettyException;

    public function __toString()
    {
        return get_class($this).($this->message !== '' ? ': ' : '').$this->message.PHP_EOL.@file_get_contents(__DIR__.'/../../../.git/refs/heads/master').PHP_EOL.'TL Trace (YOU ABSOLUTELY MUST READ THE TEXT BELOW):'.PHP_EOL.PHP_EOL.$this->getTLTrace().PHP_EOL;
    }

    public function __construct($message, $file = '')
    {
        parent::__construct($message);
        $this->prettify_tl($file);
    }
}
