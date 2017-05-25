<?php

namespace ApplicationBundle\Service;

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
    public function upload(UploadedFile $file, int $uniqueKey)
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
    public static function getServerName(string $name, int $uniqueKey)
    {
        return  $uniqueKey. '-' . $name;
    }
}