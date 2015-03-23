<?php

class API{
	public static $API = array(
		"listBuckets"=> array(
			"method"=>"GET",
			"needBucket"=>FALSE,
			"needObject"=>FALSE,
			"signer"=>"DefaultContentTypeSigner->HeaderAuthSigner",
			"handler"=>"ErrorResponseHandler->ListBucketsHandler"
		),
		"deleteBucket"=>array(
			"method"=>"DELETE",
			"needBucket"=>TRUE,
			"needObject"=>FALSE,
			"signer"=>"DefaultContentTypeSigner->HeaderAuthSigner",
			"handler"=>"ErrorResponseHandler->BooleanHandler"
		),
		"deleteBucketCORS"=>array(
			"method"=>"DELETE",
			"needBucket"=>TRUE,
			"needObject"=>FALSE,
			"subResource"=>"cors",
			"signer"=>"DefaultContentTypeSigner->HeaderAuthSigner",
			"handler"=>"ErrorResponseHandler->BooleanHandler"
		),
		"createBucket"=>array(
			"method"=>"PUT",
			"needBucket"=>TRUE,
			"needObject"=>FALSE,
			"signer"=>"ACLSigner->DefaultContentTypeSigner->HeaderAuthSigner",
			"body"=>Array("builder"=>"LocationBuilder"),
			"handler"=>"ErrorResponseHandler->BooleanHandler"
		),
		"setBucketAcl"=>array(
			"method"=>"PUT",
			"needBucket"=>TRUE,
			"needObject"=>FALSE,
			"signer"=>"ACLSigner->DefaultContentTypeSigner->HeaderAuthSigner",
			"subResource"=>"acl",
			"handler"=>"ErrorResponseHandler->BooleanHandler"
		),
		"setBucketCORS"=>array(
			"method"=>"PUT",
			"needBucket"=>TRUE,
			"needObject"=>FALSE,
			"signer"=>"DefaultContentTypeSigner->ContentMD5Signer->HeaderAuthSigner",
			"subResource"=>"cors",
			"body"=>Array("builder"=>"CORSBuilder"),
			"handler"=>"ErrorResponseHandler->BooleanHandler"
		),
		"setBucketLogging"=>array(
			"method"=>"PUT",
			"needBucket"=>TRUE,
			"needObject"=>FALSE,
			"signer"=>"DefaultContentTypeSigner->HeaderAuthSigner",
			"subResource"=>"logging",
			"body"=>Array("builder"=>"BucketLoggingBuilder"),
			"handler"=>"ErrorResponseHandler->BooleanHandler"
		),
		"listObjects" => array(
			"method"=>"GET",
			"needBucket"=>TRUE,
			"needObject"=>FALSE,
			"signer"=>"DefaultContentTypeSigner->HeaderAuthSigner",
			"queryParams"=>array("Options->prefix","Options->delimiter","Options->marker","Options->max-keys"),
			"handler"=>"ErrorResponseHandler->ListObjectsHandler"
		),
		"getBucketAcl" => array(
			"method"=>"GET",
			"needBucket"=>TRUE,
			"needObject"=>FALSE,
			"subResource"=>"acl",
			"signer"=>"DefaultContentTypeSigner->HeaderAuthSigner",
			"handler"=>"ErrorResponseHandler->GetAclHandler"
		),
		"getBucketCORS"=>array(
			"method"=>"GET",
			"needBucket"=>TRUE,
			"needObject"=>FALSE,
			"subResource"=>"cors",
			"signer"=>"DefaultContentTypeSigner->HeaderAuthSigner",
			"handler"=>"ErrorResponseHandler->GetBucketCORSHandler"
		),
		"getBucketLocation"=>array(
			"method"=>"GET",
			"needBucket"=>TRUE,
			"needObject"=>FALSE,
			"subResource"=>"location",
			"signer"=>"DefaultContentTypeSigner->HeaderAuthSigner",
			"handler"=>"ErrorResponseHandler->GetBucketLocationHandler"
		),
		"getBucketLogging"=>array(
			"method"=>"GET",
			"needBucket"=>TRUE,
			"needObject"=>FALSE,
			"subResource"=>"logging",
			"signer"=>"DefaultContentTypeSigner->HeaderAuthSigner",
			"handler"=>"ErrorResponseHandler->GetBucketLoggingHandler"
		),
		"bucketExists"=>array(
			"method"=>"HEAD",
			"needBucket"=>TRUE,
			"needObject"=>FALSE,
			"signer"=>"DefaultContentTypeSigner->HeaderAuthSigner",
			"handler"=>"ExistsHandler"
		),
		"putObjectByContent"=>array(
			"method"=>"PUT",
			"needBucket"=>TRUE,
			"needObject"=>TRUE,
			"signer"=>"ACLSigner->SuffixContentTypeSigner->ContentMD5Signer->ContentLengthSigner->ObjectMetaSigner->UserMetaSigner->HeaderAuthSigner",
			"handler"=>"ErrorResponseHandler->UploadHandler",
			"body"=>array("position"=>"Content")
		),
		"putObjectByFile"=>array(
			"method"=>"PUT",
			"needBucket"=>TRUE,
			"needObject"=>TRUE,
			"signer"=>"ACLSigner->SuffixContentTypeSigner->ObjectMetaSigner->UserMetaSigner->StreamUploadSigner->HeaderAuthSigner",
			"handler"=>"ErrorResponseHandler->UploadHandler"
		),
		"setObjectAcl"=>array(
			"method"=>"PUT",
			"needBucket"=>TRUE,
			"needObject"=>TRUE,
			"signer"=>"ACLSigner->DefaultContentTypeSigner->HeaderAuthSigner",
			"subResource"=>"acl",
			"handler"=>"ErrorResponseHandler->BooleanHandler"
		),
		"copyObject"=>array(
			"method"=>"PUT",
			"needBucket"=>TRUE,
			"needObject"=>TRUE,
			"signer"=>"CopySourceSigner->DefaultContentTypeSigner->HeaderAuthSigner",
			"handler"=>"ErrorResponseHandler->BooleanHandler"
		),
		"getObjectMeta"=>array(
			"method"=>"HEAD",
			"needBucket"=>TRUE,
			"needObject"=>TRUE,
			"signer"=>"DefaultContentTypeSigner->HeaderAuthSigner",
			"handler"=>"ErrorResponseHandler->ObjectMetaHandler"
		),
		"objectExists"=>array(
			"method"=>"HEAD",
			"needBucket"=>TRUE,
			"needObject"=>TRUE,
			"signer"=>"DefaultContentTypeSigner->HeaderAuthSigner",
			"handler"=>"ExistsHandler"
		),
		"deleteObject"=>array(
			"method"=>"DELETE",
			"needBucket"=>TRUE,
			"needObject"=>TRUE,
			"signer"=>"DefaultContentTypeSigner->HeaderAuthSigner",
			"handler"=>"ErrorResponseHandler->BooleanHandler"			
		),
		"deleteObjects"=>array(
			"method"=>"POST",
			"needBucket"=>TRUE,
			"needObject"=>FALSE,
			"subResource"=>"delete",
			"signer"=>"DefaultContentTypeSigner->ContentMD5Signer->ContentLengthSigner->HeaderAuthSigner",
			"body"=>array("builder"=>"DeleteObjectsBuilder"),
			"handler"=>"ErrorResponseHandler->BooleanHandler"
		),
		"getObject"=>array(
			"method"=>"GET",
			"needBucket"=>TRUE,
			"needObject"=>TRUE,
			"signer"=>"DefaultContentTypeSigner->RangeSigner->GetObjectSigner->HeaderAuthSigner",
			"handler"=>"ErrorResponseHandler->BooleanHandler"
		),
		"getObjectAcl" => array(
			"method"=>"GET",
			"needBucket"=>TRUE,
			"needObject"=>TRUE,
			"subResource"=>"acl",
			"signer"=>"DefaultContentTypeSigner->HeaderAuthSigner",
			"handler"=>"ErrorResponseHandler->GetAclHandler"
		),
		"initMultipartUpload"=>array(
			"method"=>"POST",
			"needBucket"=>TRUE,
			"needObject"=>TRUE,
			"subResource"=>"uploads",
			"signer"=>"ACLSigner->SuffixContentTypeSigner->MultipartObjectMetaSigner->UserMetaSigner->HeaderAuthSigner",
			"handler"=>"ErrorResponseHandler->InitMultipartUploadHandler"
		),
		"uploadPart"=>array(
			"method"=>"PUT",
			"needBucket"=>TRUE,
			"needObject"=>TRUE,
			"queryParams"=>array("!Options->uploadId","!Options->partNumber"),
			//这个请求没有body，所以使用了ContentLengthSigner->ContentMD5Signer而没用ObjectMetaSigner
			"signer"=>"ACLSigner->StreamContentTypeSigner->ContentLengthSigner->ContentMD5Signer->StreamUploadSigner->HeaderAuthSigner",
			"handler"=>"ErrorResponseHandler->UploadHandler"
		),
		"abortMultipartUpload"=>array(
			"method"=>"DELETE",
			"needBucket"=>TRUE,
			"needObject"=>TRUE,
			"queryParams"=>array("!Options->uploadId"),
			"signer"=>"DefaultContentTypeSigner->HeaderAuthSigner",
			"handler"=>"ErrorResponseHandler->BooleanHandler"
		),
		"listParts"=>array(
			"method"=>"GET",
			"needBucket"=>TRUE,
			"needObject"=>TRUE,
			"queryParams"=>array("!Options->uploadId","Options->max-parts","Options->part-number​-marker"),
			"signer"=>"DefaultContentTypeSigner->HeaderAuthSigner",
			"handler"=>"ErrorResponseHandler->ListPartsHandler"
		),
		"completeMultipartUpload"=>array(
			"method"=>"POST",
			"needBucket"=>TRUE,
			"needObject"=>TRUE,
			"queryParams"=>array("!Options->uploadId"),
			"signer"=>"DefaultContentTypeSigner->ContentLengthSigner->HeaderAuthSigner",
			"handler"=>"ErrorResponseHandler->BooleanHandler",
			"body"=>array("builder"=>"CompleteMultipartUploadBuilder")
		),
		"generatePresignedUrl"=>array(
			"method"=>"GET",
			"needBucket"=>TRUE,
			"needObject"=>TRUE,
			"queryParams"=>array("!Options->Expires","Options->response-content-type","Options->response-content-encoding","Options->response-content-disposition",
				"Options->response-content-language","Options->response-expires","Options->response-cache-control"),
			"signer"=>"QueryAuthSigner",
		)
	);
}
?>