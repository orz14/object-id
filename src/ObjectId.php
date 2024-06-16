<?php

namespace ObjectId;

class ObjectId {
    public static function generate()
    {
        $timestamp = pack('N', time());

        $hostname = gethostname();
        $machineHash = substr(md5($hostname), 0, 6);
        $machineIdentifier = pack('H*', $machineHash);

        $processId = getmypid();
        $processIdentifier = pack('n', $processId);

        static $counter = null;
        if ($counter === null) {
            $counter = random_int(0, 0xFFFFFF);
        }
        $counter = ($counter + 1) & 0xFFFFFF;
        $counterBytes = pack('N', $counter);
        $counterBytes = substr($counterBytes, 1, 3);

        $binary = $timestamp . $machineIdentifier . $processIdentifier . $counterBytes;

        $objectId = bin2hex($binary);

        return (string) $objectId;
    }
}