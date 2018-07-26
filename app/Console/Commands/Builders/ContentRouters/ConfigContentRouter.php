<?php

namespace App\Console\Commands\Builders\ContentRouters;

use App\Console\Commands\Builders\ContentRouters\ContentTraits\HasParentAndChildAndSlug;
use App\Console\Commands\Templates\CrudTemplates\ConfigTemplateAssembler;

class ConfigContentRouter
{

    use HasParentAndChildAndSlug;


    public function getContentFromTemplate($fileName,  array $tokens, $fileExists=false)
    {

        return $this->defaultHandler($fileName, $tokens, $fileExists);



    }

    private function routeTemplate($tokens, $templateName)
    {


        $crudTemplate = new ConfigTemplateAssembler($tokens);

        return $crudTemplate->assembleTemplate($templateName);


    }

    /**
     * @param $fileName
     * @param array $tokens
     * @param $fileExists
     * @return mixed|string
     */
    private function defaultHandler($fileName, array $tokens, $fileExists)
    {

        return $this->routeTemplate($tokens, 'configTemplate');

    }





}