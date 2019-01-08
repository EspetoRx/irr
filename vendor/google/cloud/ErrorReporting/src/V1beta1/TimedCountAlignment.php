<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/devtools/clouderrorreporting/v1beta1/error_stats_service.proto

namespace Google\Cloud\ErrorReporting\V1beta1;

/**
 * Specifies how the time periods of error group counts are aligned.
 *
 * Protobuf type <code>google.devtools.clouderrorreporting.v1beta1.TimedCountAlignment</code>
 */
class TimedCountAlignment
{
    /**
     * No alignment specified.
     *
     * Generated from protobuf enum <code>ERROR_COUNT_ALIGNMENT_UNSPECIFIED = 0;</code>
     */
    const ERROR_COUNT_ALIGNMENT_UNSPECIFIED = 0;
    /**
     * The time periods shall be consecutive, have width equal to the
     * requested duration, and be aligned at the `alignment_time` provided in
     * the request.
     * The `alignment_time` does not have to be inside the query period but
     * even if it is outside, only time periods are returned which overlap
     * with the query period.
     * A rounded alignment will typically result in a
     * different size of the first or the last time period.
     *
     * Generated from protobuf enum <code>ALIGNMENT_EQUAL_ROUNDED = 1;</code>
     */
    const ALIGNMENT_EQUAL_ROUNDED = 1;
    /**
     * The time periods shall be consecutive, have width equal to the
     * requested duration, and be aligned at the end of the requested time
     * period. This can result in a different size of the
     * first time period.
     *
     * Generated from protobuf enum <code>ALIGNMENT_EQUAL_AT_END = 2;</code>
     */
    const ALIGNMENT_EQUAL_AT_END = 2;
}

