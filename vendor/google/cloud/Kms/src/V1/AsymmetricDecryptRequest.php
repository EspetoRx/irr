<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/kms/v1/service.proto

namespace Google\Cloud\Kms\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Request message for [KeyManagementService.AsymmetricDecrypt][google.cloud.kms.v1.KeyManagementService.AsymmetricDecrypt].
 *
 * Generated from protobuf message <code>google.cloud.kms.v1.AsymmetricDecryptRequest</code>
 */
class AsymmetricDecryptRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The resource name of the [CryptoKeyVersion][google.cloud.kms.v1.CryptoKeyVersion] to use for
     * decryption.
     *
     * Generated from protobuf field <code>string name = 1;</code>
     */
    private $name = '';
    /**
     * Required. The data encrypted with the named [CryptoKeyVersion][google.cloud.kms.v1.CryptoKeyVersion]'s public
     * key using OAEP.
     *
     * Generated from protobuf field <code>bytes ciphertext = 3;</code>
     */
    private $ciphertext = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *           Required. The resource name of the [CryptoKeyVersion][google.cloud.kms.v1.CryptoKeyVersion] to use for
     *           decryption.
     *     @type string $ciphertext
     *           Required. The data encrypted with the named [CryptoKeyVersion][google.cloud.kms.v1.CryptoKeyVersion]'s public
     *           key using OAEP.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Kms\V1\Service::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The resource name of the [CryptoKeyVersion][google.cloud.kms.v1.CryptoKeyVersion] to use for
     * decryption.
     *
     * Generated from protobuf field <code>string name = 1;</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Required. The resource name of the [CryptoKeyVersion][google.cloud.kms.v1.CryptoKeyVersion] to use for
     * decryption.
     *
     * Generated from protobuf field <code>string name = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;

        return $this;
    }

    /**
     * Required. The data encrypted with the named [CryptoKeyVersion][google.cloud.kms.v1.CryptoKeyVersion]'s public
     * key using OAEP.
     *
     * Generated from protobuf field <code>bytes ciphertext = 3;</code>
     * @return string
     */
    public function getCiphertext()
    {
        return $this->ciphertext;
    }

    /**
     * Required. The data encrypted with the named [CryptoKeyVersion][google.cloud.kms.v1.CryptoKeyVersion]'s public
     * key using OAEP.
     *
     * Generated from protobuf field <code>bytes ciphertext = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setCiphertext($var)
    {
        GPBUtil::checkString($var, False);
        $this->ciphertext = $var;

        return $this;
    }

}

