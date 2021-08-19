<?php

interface iFile
{
    public function __construct($filePath);

    public function getPath(); // путь к файлу

    public function getDir();  // папка файла

    public function getName(); // имя файла

    public function getExt();  // расширение файла

    public function getSize(); // размер файла

    public function getText();          // получает текст файла

    public function setText($text);     // устанавливает текст файла

    public function appendText($text);  // добавляет текст в конец файла

    public function copy($copyPath);    // копирует файл

    public function delete();           // удаляет файл

    public function rename($newName);   // переименовывает файл

    public function replace($newPath);  // перемещает файл
}

class File
{

    /**
     * @var
     */
    private $filePath;
    /**
     * @var array {
     * @see pathinfo()
     *
     * @type string[] {
     * @type string $dirname
     * @type string $basename
     * @type string $extension
     * @type string $filename
     *     }
     *     }
     */
    private array $pathParts;

    public function __construct($filePath)
    {
        $this->setFilePath($filePath);
        $this->resolvePathParts();

    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->filePath;
    }

    /**
     * @return mixed
     */
    public function getDir(): string
    {
        return $this->getPath();
    }

    /**
     * @return string
     */
    public function getName(): string
    {

        return $this->pathParts['basename'];
    }

    /**
     * @return string
     */
    public function getExt(): string
    {

        return $this->pathParts['extension'];
    }

    /**
     * @return int|float
     */
    public function getSize(): int|float
    {
        echo filesize($this->filePath);
    }

    /**
     * @return bool|string
     */
    public function getText(): bool|string
    {
        return file_get_contents($this->filePath);
    }

    /**
     * @param string $text
     * @return bool|int
     */
    public function setText(string $text): bool|int
    {
        return file_put_contents($this->filePath, $text);
    }

    /**
     * @param string $text
     * @return bool|int
     */
    public function appendText(string $text): bool|int
    {
        return file_put_contents($this->filePath, $text, FILE_APPEND);
    }

    /**
     * @param $copyPath
     * @return bool
     */
    public function copy($copyPath): bool
    {
        return copy($this->filePath, $copyPath);
    }

    /**
     * @param $newName
     * @return bool
     */
    public function rename($newName): bool
    {
        return rename($this->filePath, $this->getDir() . DIRECTORY_SEPARATOR . $newName);
    }

    /**
     * @param string $filePath
     * @return bool
     */
    private function isFilePathValid(string $filePath): bool
    {
        return file_exists($filePath);
    }

    /**
     * @param $filePath
     */
    public function setFilePath($filePath)
    {
        if (!$this->isFilePathValid($filePath)) {
            die('Invalid file path');
        }
        $this->filePath = realpath($filePath);
    }

    private function resolvePathParts()
    {
        $this->pathParts = pathinfo($this->filePath);

        if (!isset($this->pathParts['extension'])) {
            $this->pathParts['extension'] = '';
        }
    }

}

$file = new File('test.txt');

//echo $file->getName();
//$file->setText('fg');
//$file->copy($_SERVER['DOCUMENT_ROOT'] . '\test1.txt');