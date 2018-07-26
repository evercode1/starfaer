<?php

namespace App\Console\Commands\Builders\Writers;

use App\Console\Commands\Builders\ContentRouters\ConfigContentRouter;

class ConfigFileWriter
{

    public $fileWritePaths;
    public $fileAppendPaths;
    public $tokens = [];
    public $content;

    public function __construct($fileWritePaths, $fileAppendPaths, Array $tokens)
    {

        $this->fileWritePaths = $fileWritePaths;
        $this->fileAppendPaths = $fileAppendPaths;
        $this->tokens = $tokens;
        $this->content = new ConfigContentRouter();


    }

    public function writeAllConfigFiles()
    {



        $this->writeEachFile($this->fileWritePaths, $this->content);




    }



    private function writeEachFile(array $fileWritePaths, ConfigContentRouter $content)
    {

                foreach ($fileWritePaths as $fileName => $filePath) {

                    $this->defaultHandler($content, $fileName, $filePath);

                }


    }



    /**
     * @param CrudContentRouter $content
     * @param $fileName
     * @param $filePath
     */
    private function defaultHandler(ConfigContentRouter $content, $fileName, $filePath)
    {


                if (!is_array($fileName)) {

                    $txt = $content->getContentFromTemplate($fileName, $this->tokens);

                    $handle = fopen($filePath, "w");

                    fwrite($handle, $txt);

                    fclose($handle);
                }


    }


}