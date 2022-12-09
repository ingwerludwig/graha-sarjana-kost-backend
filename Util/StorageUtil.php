<?php

namespace App\Util;

use Aws\S3\Exception\S3Exception;
use Aws\S3\ObjectUploader;
use Aws\S3\S3Client;
use GuzzleHttp\Client;
use Illuminate\Http\Response;

class StorageUtil
{
    private $s3ClientUpload;
    private $s3ClientDownload;

    public function __construct()
    {
        $this->s3ClientUpload = new S3Client([
            'endpoint' => 'https://s3.filebase.com',
            'region' => 'us-east-1',
            'version' => 'latest',
            'use_path_style_endpoint' => false,
            'credentials' => [
                'secret' => "1FKUoMFzMGaqlTGbqG68ZkNKSpRyNQdndgIwUdv2",
                'key'    => "AFC7A481C17E890B90A6",
            ],
        ]);
    }

    public function upload($file, $fileName = "")
    {
        $uploader = new ObjectUploader(
            $this->s3ClientUpload,
            'graha-sarjana-kost',
            $fileName,
            $file,
        );

        try {
            $res = $uploader->upload();
            return $res["@metadata"]["headers"]["x-amz-meta-cid"];
        } catch (S3Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @unused
     */
    public function download($cid): string
    {
        return "https://ipfs.filebase.io/ipfs/" . $cid;
    }
}

// GrmyMEbmNIOUjqvAdsXQ9oPiToIzciAHRt77OjsJ
