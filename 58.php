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

    private $filePath;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function getPath()
    {
        return $this->filePath;
    }

    /**
     * @return mixed
     */
    public function getDir()
    {
        return dirname($this->filePath);
    }



    public function getExt()
    {
        $path_parts = pathinfo($this->filePath);
        return $path_parts['extension'];
    }

    public function getSize()
    {
        echo filesize($this->filePath);
    }

    public function getText()
    {
        return file_get_contents($this->filePath);
    }

    public function setText(string $text)
    {
        return file_put_contents($this->filePath, $text);
    }

    public function appendText(string $text)
    {
        return file_put_contents($this->filePath, $text, FILE_APPEND);
    }

    public function copy($copyPath)
    {
        return copy($this->filePath, $copyPath);
    }

    public function rename($newName)
    {
        return rename('C:\OpenServer\domains\oop-practice\test1.txt', "C:\OpenServer\domains\oop-practice\\$newName.txt");
    }

    public function getName()
    {
        $path_parts = pathinfo($this->filePath);
        return $path_parts['basename'];
    }
}

$file = new File($_SERVER['DOCUMENT_ROOT'] . '\test.txt');
 echo $file->getName();
//$file->setText('fg');
//$file->copy($_SERVER['DOCUMENT_ROOT'] . '\test1.txt');
var_dump( $file->rename('dsjfndsjfndj') );