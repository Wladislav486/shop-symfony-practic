<?php

namespace App\Utils\File;

use App\Utils\FileSystem\FileSystemWorker;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;

class FileSaver
{
    /**
     * @var SluggerInterface
     */
    protected SluggerInterface $slugger;
    /**
     * @var string
     */
    protected string $uploadsTempDir;
    /**
     * @var FileSystemWorker
     */
    protected FileSystemWorker $fileSystemWorker;

    public function __construct(SluggerInterface $slugger, FileSystemWorker $fileSystemWorker, string $uploadsTempDir)
    {

        $this->slugger = $slugger;
        $this->uploadsTempDir = $uploadsTempDir;
        $this->fileSystemWorker = $fileSystemWorker;
    }

    /**
     * @param UploadedFile $uploadedFile
     * @return string|null
     */
    public function saveUploadedFileIntoTemp(UploadedFile $uploadedFile): ?string
    {
        $originalFileName = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
        $saveFileName = $this->slugger->slug($originalFileName);
        $fileName = sprintf('%s-%s.%s', $saveFileName, uniqid(), $uploadedFile->guessExtension());

        $this->fileSystemWorker->createFolderIfItNotExists($this->uploadsTempDir);

        try {
            $uploadedFile->move($this->uploadsTempDir, $fileName);
        } catch (\Exception $exception) {
            return null;
        }

        return $fileName;
    }
}