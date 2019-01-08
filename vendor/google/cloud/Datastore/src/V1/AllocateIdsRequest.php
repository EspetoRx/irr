<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/datastore/v1/datastore.proto

namespace Google\Cloud\Datastore\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The request for [Datastore.AllocateIds][google.datastore.v1.Datastore.AllocateIds].
 *
 * Generated from protobuf message <code>google.datastore.v1.AllocateIdsRequest</code>
 */
class AllocateIdsRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * The ID of the project against which to make the request.
     *
     * Generated from protobuf field <code>string project_id = 8;</code>
     */
    private $project_id = '';
    /**
     * A list of keys with incomplete key paths for which to allocate IDs.
     * No key may be reserved/read-only.
     *
     * Generated from protobuf field <code>repeated .google.datastore.v1.Key keys = 1;</code>
     */
    private $keys;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $project_id
     *           The ID of the project against which to make the request.
     *     @type \Google\Cloud\Datastore\V1\Key[]|\Google\Protobuf\Internal\RepeatedField $keys
     *           A list of keys with incomplete key paths for which to allocate IDs.
     *           No key may be reserved/read-only.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Datastore\V1\Datastore::initOnce();
        parent::__construct($data);
    }

    /**
     * The ID of the project against which to make the request.
     *
     * Generated from protobuf field <code>string project_id = 8;</code>
     * @return string
     */
    public function getProjectId()
    {
        return $this->project_id;
    }

    /**
     * The ID of the project against which to make the request.
     *
     * Generated from protobuf field <code>string project_id = 8;</code>
     * @param string $var
     * @return $this
     */
    public function setProjectId($var)
    {
        GPBUtil::checkString($var, True);
        $this->project_id = $var;

        return $this;
    }

    /**
     * A list of keys with incomplete key paths for which to allocate IDs.
     * No key may be reserved/read-only.
     *
     * Generated from protobuf field <code>repeated .google.datastore.v1.Key keys = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getKeys()
    {
        return $this->keys;
    }

    /**
     * A list of keys with incomplete key paths for which to allocate IDs.
     * No key may be reserved/read-only.
     *
     * Generated from protobuf field <code>repeated .google.datastore.v1.Key keys = 1;</code>
     * @param \Google\Cloud\Datastore\V1\Key[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setKeys($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\Datastore\V1\Key::class);
        $this->keys = $arr;

        return $this;
    }

}

