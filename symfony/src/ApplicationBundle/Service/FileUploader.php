<?php

namespace ApplicationBundle\Service;

use Symfony\Component\Asset\Packages;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class FileUploader
 * @package ApplicationBundle\Service
 */
class FileUploader
{
    /**
     * @var
     */
    private $targetDir;

    /**
     * FileUploader constructor.
     * @param $targetDir
     */
    public function __construct($targetDir)
    {
        $this->targetDir = $targetDir;
    }

    /**
     * @param UploadedFile $file
     * @param int $uniqueKey
     * @return string
     */
    public function upload(UploadedFile $file, int $uniqueKey) : string
    {
        $fileName = self::getServerName($file->getClientOriginalName(), $uniqueKey);
        $file->move($this->targetDir, $fileName);
        return $fileName;
    }

    /**
     * @param string $name
     * @param int $uniqueKey
     * @return string
     */
    public static function getServerName(string $name, int $uniqueKey) : string
    {
        return $uniqueKey. '-' . $name;
    }

    /**
     * @param string $name
     * @param int $uniqueKey
     * @return string
     */
    public function getPath(string $name, int $uniqueKey) : string
    {
        return $this->targetDir . '/' . self::getServerName($name, $uniqueKey);
    }
}