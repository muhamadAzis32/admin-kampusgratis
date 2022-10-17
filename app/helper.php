<?php
use Illuminate\Support\Facades\DB;

function getDocTaken($data){
    $documents = $data->map->only(['document_id']);
    $docLength = Str::length($documents[0]['document_id']);
    $numberOfDocs = 0;
    $docTaken = [];
    if($docLength==0){
        $numberOfDocs = 0;
    }
    else{
        $numberOfDocs = 1;
        for($i=0;$i<$docLength;$i++){
            if($documents[0]['document_id'][$i]==','){
                $numberOfDocs++;
            }
        }
    }

    for($i=0;$i<$numberOfDocs;$i++){
        $currentQuery = DB::select('select file from documents inner join modules on documents.id = modules.document_id[ ? ]',[$i+1]);
        $docTaken[$i] = $currentQuery[0];
    }

    return $docTaken;
}

function getVideoTaken($data){
    $videos = $data->map->only(['video_id']);
    $videoLength = Str::length($videos[0]['video_id']);
    $numberOfVideo = 0;
    $videoTaken = [];
    if($videoLength==0){
        $numberOfVideo = 0;
    }
    else{
        $numberOfVideo = 1;
        for($i=0;$i<$videoLength;$i++){
            if($videos[0]['video_id'][$i]==','){
                $numberOfVideo++;
            }
        }
    }
    for($i=0;$i<$numberOfVideo;$i++){
        $currentQuery = DB::select('select description from videos inner join modules on videos.id = modules.video_id[ ? ]',[$i+1]);
        $videoTaken[$i] = $currentQuery[0];
    }
    return $videoTaken;
}

function getDocTakenEdit($data){
    $documentTaken = [];
    $numberOfDocs = 0;

    if(strlen($data->document_id)>0){
        $numberOfDocs = 1;
    }
    for($i=0;$i<strlen($data->document_id);$i++){
        if($data->document_id[$i]==','){
            $numberOfDocs++;
        }
    }
    for($i=0;$i<$numberOfDocs;$i++){
        $currentQuery = DB::select('select file,documents.id from documents inner join modules on documents.id = modules.document_id[ ? ]',[$i+1]);
        $documentTaken[$i] = $currentQuery[0];
    }
    return $documentTaken;
}

function getVideoTakenEdit($data){
    $videoTaken = [];
    $numberOfVideo = 0;

    if(strlen($data->video_id)>0){
        $numberOfVideo = 1;
    }
    for($i=0;$i<strlen($data->video_id);$i++){
        if($data->video_id[$i]==','){
            $numberOfVideo++;
        }
    }
    for($i=0;$i<$numberOfVideo;$i++){
        $currentQuery = DB::select('select description,videos.id from videos inner join modules on videos.id = modules.video_id[ ? ]',[$i+1]);
        $videoTaken[$i] = $currentQuery[0];
    }
    return $videoTaken;
}

function getRequestedVideo($data){
    $videoToBeInserted = "{";
    if(!empty($data->video_id)){
        for($i=0;$i<count($data->video_id);$i++){
            $videoToBeInserted.=$data->video_id[$i];
            if($i!=count($data->video_id)-1){
                $videoToBeInserted.=",";
            }
        }
    }
    $videoToBeInserted.="}";
    return $videoToBeInserted;
}

function getRequestedDocument($data){
    $documentToBeInserted = "{";
    if(!empty($data->document_id)){
        for($i=0;$i<count($data->document_id);$i++){
            $documentToBeInserted.=$data->document_id[$i];
            if($i!=count($data->document_id)-1){
                $documentToBeInserted.=",";
            }
        }
    }
    $documentToBeInserted.="}";
    return $documentToBeInserted;
}
function storeVideoIntoDB($data){
    $videoIntoDB = "{";
    for($i=0;$i<count($data->video_id);$i++){
        $videoIntoDB.=$data->video_id[$i];
        if($i!=count($data->video_id)-1){
            $videoIntoDB.=",";
        }
    }
    $videoIntoDB.="}";
    return $videoIntoDB;
}
function storeDocumentIntoDB($data){
    $documentIntoDB = "{";
    for($i=0;$i<count($data->document_id);$i++){
        $documentIntoDB.=$data->document_id[$i];
        if($i!=count($data->document_id)-1){
            $documentIntoDB.=",";
        }
    }
    $documentIntoDB.="}";
    return $documentIntoDB;
}
function convertPsqlArray($data,$attribute){
    for($i=0;$i<count($data);$i++){
        $arrayCount = 0;
        $emptyArray = [];
        if(strlen($data[$i]->lecturer)!=0){
            $arrayCount = 1;
            $arrayCount+=substr_count($data[$i]->lecturer, ',');
            for($j=0;$j<$arrayCount;$j++){
                $firstIndex = 1 + 36*$j + $j;
                $arrayItem = substr($data[$i]->lecturer,$firstIndex,36);
                array_push($emptyArray,$arrayItem);
            }
            $data[$i]->lecturer = $emptyArray;
        }
    }
    return $data;
}
