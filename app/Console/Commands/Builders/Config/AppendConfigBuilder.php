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

        $this->writeFiles();

        return true;


    }



    private function setConfig($input)
    {

        $this->setInput($input);


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


        $groupTitle =$this->initialValues['groupTitle'];

        $configName = $this->initialValues['configName'];

        $words = $this->syllables;

        // set filename to the temporary flat file

        $tempFile = base_path('config/array-format-values.txt');

        // select template and insert to $filename, the temporary file

        $template = base_path('app/Console/Commands/Templates/ConfigTemplates/templates/appendConfigTemplate.txt');
        $textContents = file($template);
        file_put_contents($tempFile, implode('', $textContents));

        //  iterate through each word in array and copy to tempfile

        foreach( $words as $key => $value){

            $contents = file($tempFile);
            $contents[2] = $contents[2] . "\n\n"; // Gives a new line
            file_put_contents($tempFile, implode('',$contents));

            $contents = file($tempFile);
            $contents[3] = "'" . $value . "',";
            file_put_contents($tempFile, implode('',$contents));

        }


        // get array from temp

        $txt =  file_get_contents(base_path('config/array-format-values.txt'));

        // open destination file

        $config = base_path('config/' . $configName . '.php');

        $contents = file_get_contents($config);

        // divide into parts

        $classParts = explode('[', $contents, 2);

        // inside destination file, insert array

        $txt = $classParts[0] . "[\n\n" . "'" . $groupTitle . "'" .  $txt . "\n\n" . $classParts[1];

        // write file

        $handle = fopen($config, "w");

        fwrite($handle, $txt);

        fclose($handle);


        // eliminate temp file

        unlink(base_path('config/array-format-values.txt'));



    }


    private function writeForm()
    {

        // open destination file

        $form = base_path('resources/views/seeder/create-form.blade.php');


        // dtermine vowel or consonants

        switch($this->initialValues['configName']){

            case 'vowels' :

                $contents = file($form);
                $contents[150] = $contents[150] . "\n\n"; // Gives a new line
                file_put_contents($form, implode('',$contents));

                $contents = file($form);
                $contents[151] = '<option value="'.
                    $this->initialValues['groupTitle'] .'">'
                    . $this->initialValues['groupTitle'] . '</option>';
                file_put_contents($form, implode('',$contents));
                break;

            case 'consonants' :

                $contents = file($form);
                $contents[182] = $contents[182] . "\n\n"; // Gives a new line
                file_put_contents($form, implode('',$contents));

                $contents = file($form);
                $contents[183] = '<option value="'.
                    $this->initialValues['groupTitle'] .'">'
                    . $this->initialValues['groupTitle'] . '</option>';
                file_put_contents($form, implode('',$contents));
                break;

            default:

                return;


        }





    }


}