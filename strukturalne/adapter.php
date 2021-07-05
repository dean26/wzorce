<?php 

/**
 * Adapter/Wrapper -> wzorzec zapewnie współpracę między obiektami o niezgodnych interfejsach.
 */


interface File
{
    public function loadXmlFile();
}

class XML implements File
{
    public function loadXmlFile()
    {
    
        //old version
        //echo 'Loading xml from file...';

        //add new implementation
        $json = new JSON();
        $json->loadJsonFromFile();
    }
}

class JSON
{
    public function loadJsonFromFile(){
        echo 'Loading json data from file...';
    }
}

$new_xml_obj = new XML();
$new_xml_obj->loadXmlFile();