<?php
$config = array(
    'digest_alg' => "sha512",
	'private_key_bits' => 512,
    'private_key_type' => OPENSSL_KEYTYPE_RSA
);

//Generating a new keypair
$resource = openssl_pkey_new($config);

//Extracting and exporting the keypair from the resource's array
openssl_pkey_export($resource, $privKey, NULL, $config);
$pubKey = openssl_pkey_get_details($resource);
$pubKey = $pubKey["key"];

//Printing keys [optional]
echo($pubKey);
echo("\n");
echo($privKey);

//Export the keypair in two separate .pem files
file_put_contents('./PublicKey.pem', $pubKey);
file_put_contents('./PrivateKey.pem', $privKey);
?>
