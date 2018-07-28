<?php

namespace App\Console\Commands\Builders\Config;


class AppendConfigBuilder
{

    public $initialValues = [];

    public $syllables = [];

    public $fileAppendPaths = [];




    public function appendConfigFiles($input)
    {
        $this->setConfig($input);

        // dd($this->initialValues['groupTitle']);

        $this->writeFiles();

        return true;


    }



    private function setConfig($input)
    {

        $this->setInput($input);


        $this->setFilePaths();

        $this->mergeInput();



    }

    private function mergeInput()
    {

        $baseVowels     = array('a','e','i','o','u');
        $baseConsonants = array(
            'b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm',
            'n', 'p', 'r', 's', 't', 'v', 'w', 'x', 'y', 'z',
            'dr', 'tr', 'br', 'st', 'k', 'cr', 'kl', 'pr', 'th'
        );



       switch($this->initialValues['configName']){

           case 'consonants' :

             $this->syllables =  array_merge($baseConsonants, $this->syllables);

               break;

           case 'vowels' :

               $this->syllables =  array_merge($baseVowels, $this->syllables);
               break;

           default :

               return;




       }


    }

    private function setFilePaths()
    {

            $this->fileAppendPaths['configFile'] = base_path() . '/config/'
                   . $this->initialValues['configName'] . '.php';



            $this->fileAppendPaths['form'] = base_path() .
                    '/resources/views/seeder/create-form.blade.php';



    }


    /**
     * @param $input
     */

    private function setInput($input)
    {
        $this->initialValues['configName'] = $input['ConfigName'];
        $this->initialValues['groupTitle'] = $input['GroupTitle'];
        $this->syllables = $input['syllables'];



    }

    private function writeFiles()
    {

        $this->writeConfig();


        $this->writeForm();



    }


    private function writeConfig()
    {

            $filename = $this->fileAppendPaths['configFile'];

            $closing = count($this->syllables) + 18;

            $groupTitle =$this->initialValues['groupTitle'];









            //$openString = "'" . $groupTitle . "' => "   .  "\n\[";

//            $contents = file($filename);
//            $contents[12] = $contents[12] . "\n\n\n\n"; // Gives a new line
//            $contents[14] = $openString;
//            file_put_contents($filename, implode('',$contents));
//
//
//            foreach($this->syllables as $value){
//
//            $contents = file($filename);
//            $contents[16] = "'" . $value . "',";
//            file_put_contents($filename, implode('',$contents));
//
//
//            }
//
//            $contents = file($filename);
//            $contents[$closing] = "\n\n\\]";
//            file_put_contents($filename, implode('',$contents));








    }


    private function writeForm()
    {



    }


}