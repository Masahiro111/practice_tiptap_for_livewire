<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GenerateImageUploadConfigController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        // Validate option
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Make image file name
        $imageName = Str::uuid()->toString() . '.' . $request->image->extension();

        // Store Image in storage folder
        // ex . storage/app/images/file.png
        $request->image->storeAs('images', $imageName);

        // return uploaded image's json data
        return response()->json([
            'uploadUrl' => 'uploaded url',
            'uploadUrlFormData' => 'upload Url Form data',
            'uploadKeyPrefix' => 'uploadKeyPrefix',
            'downloadUrlPrefix' => 'downloadUrlPrefix',
        ]);

        // $bucketName = $disk->getDriver()->getAdapter()->getBucket();
        // $bucketPrefix = $disk->getDriver()->getAdapter()->getPathPrefix();

        // /** @var \Aws\S3\S3Client */
        // $client = $disk->getDriver()->getAdapter()->getClient();

        // $keyPrefix = $bucketPrefix . $uuid;

        // $formInputs = [
        //     'acl' => 'public-read',
        //     'success_action_status' => '201',
        // ];

        // // Construct an array of conditions for policy
        // $options = [
        //     ['acl' => 'public-read'],
        //     ['bucket' => $bucketName],
        //     ['success_action_status' => '201'],
        //     ['starts-with', '$key', "{$keyPrefix}/"],
        //     ['starts-with', '$Content-Type', 'image/'],
        // ];

        // $expires = '+12 hours';

        // $postObject = new \Aws\S3\PostObjectV4(
        //     $client,
        //     $bucketName,
        //     $formInputs,
        //     $options,
        //     $expires
        // );

        // return response()->json([
        //     'uploadUrl' => $postObject->getFormAttributes()['action'],
        //     'uploadUrlFormData' => $postObject->getFormInputs(),
        //     'uploadKeyPrefix' => $keyPrefix,
        //     'downloadUrlPrefix' => $disk->url("{$uuid}/"),
        // ]);
    }
}
