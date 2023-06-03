<?php
class Random
{
    function generateUUID()
    {
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }

        // Generate a version 4 UUID for non-Windows environments
        $data = random_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // Set version (4)
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // Set variant
        $uuid = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));

        return $uuid;
    }
}
