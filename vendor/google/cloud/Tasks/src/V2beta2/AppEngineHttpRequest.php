<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/tasks/v2beta2/target.proto

namespace Google\Cloud\Tasks\V2beta2;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * App Engine HTTP request.
 * The message defines the HTTP request that is sent to an App Engine app when
 * the task is dispatched.
 * This proto can only be used for tasks in a queue which has
 * [app_engine_http_target][google.cloud.tasks.v2beta2.Queue.app_engine_http_target] set.
 * Using [AppEngineHttpRequest][google.cloud.tasks.v2beta2.AppEngineHttpRequest] requires
 * [`appengine.applications.get`](https://cloud.google.com/appengine/docs/admin-api/access-control)
 * Google IAM permission for the project
 * and the following scope:
 * `https://www.googleapis.com/auth/cloud-platform`
 * The task will be delivered to the App Engine app which belongs to the same
 * project as the queue. For more information, see
 * [How Requests are Routed](https://cloud.google.com/appengine/docs/standard/python/how-requests-are-routed)
 * and how routing is affected by
 * [dispatch files](https://cloud.google.com/appengine/docs/python/config/dispatchref).
 * The [AppEngineRouting][google.cloud.tasks.v2beta2.AppEngineRouting] used to construct the URL that the task is
 * delivered to can be set at the queue-level or task-level:
 * * If set,
 *    [app_engine_routing_override][google.cloud.tasks.v2beta2.AppEngineHttpTarget.app_engine_routing_override]
 *    is used for all tasks in the queue, no matter what the setting
 *    is for the
 *    [task-level app_engine_routing][google.cloud.tasks.v2beta2.AppEngineHttpRequest.app_engine_routing].
 * The `url` that the task will be sent to is:
 * * `url =` [host][google.cloud.tasks.v2beta2.AppEngineRouting.host] `+`
 *   [relative_url][google.cloud.tasks.v2beta2.AppEngineHttpRequest.relative_url]
 * The task attempt has succeeded if the app's request handler returns
 * an HTTP response code in the range [`200` - `299`]. `503` is
 * considered an App Engine system error instead of an application
 * error. Requests returning error `503` will be retried regardless of
 * retry configuration and not counted against retry counts.
 * Any other response code or a failure to receive a response before the
 * deadline is a failed attempt.
 *
 * Generated from protobuf message <code>google.cloud.tasks.v2beta2.AppEngineHttpRequest</code>
 */
class AppEngineHttpRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * The HTTP method to use for the request. The default is POST.
     * The app's request handler for the task's target URL must be able to handle
     * HTTP requests with this http_method, otherwise the task attempt will fail
     * with error code 405 (Method Not Allowed). See
     * [Writing a push task request handler](https://cloud.google.com/appengine/docs/java/taskqueue/push/creating-handlers#writing_a_push_task_request_handler)
     * and the documentation for the request handlers in the language your app is
     * written in e.g.
     * [Python Request Handler](https://cloud.google.com/appengine/docs/python/tools/webapp/requesthandlerclass).
     *
     * Generated from protobuf field <code>.google.cloud.tasks.v2beta2.HttpMethod http_method = 1;</code>
     */
    private $http_method = 0;
    /**
     * Task-level setting for App Engine routing.
     * If set,
     * [app_engine_routing_override][google.cloud.tasks.v2beta2.AppEngineHttpTarget.app_engine_routing_override]
     * is used for all tasks in the queue, no matter what the setting is for the
     * [task-level app_engine_routing][google.cloud.tasks.v2beta2.AppEngineHttpRequest.app_engine_routing].
     *
     * Generated from protobuf field <code>.google.cloud.tasks.v2beta2.AppEngineRouting app_engine_routing = 2;</code>
     */
    private $app_engine_routing = null;
    /**
     * The relative URL.
     * The relative URL must begin with "/" and must be a valid HTTP relative URL.
     * It can contain a path and query string arguments.
     * If the relative URL is empty, then the root path "/" will be used.
     * No spaces are allowed, and the maximum length allowed is 2083 characters.
     *
     * Generated from protobuf field <code>string relative_url = 3;</code>
     */
    private $relative_url = '';
    /**
     * HTTP request headers.
     * This map contains the header field names and values.
     * Headers can be set when the
     * [task is created][google.cloud.tasks.v2beta2.CloudTasks.CreateTask].
     * Repeated headers are not supported but a header value can contain commas.
     * Cloud Tasks sets some headers to default values:
     * * `User-Agent`: By default, this header is
     *   `"AppEngine-Google; (+http://code.google.com/appengine)"`.
     *   This header can be modified, but Cloud Tasks will append
     *   `"AppEngine-Google; (+http://code.google.com/appengine)"` to the
     *   modified `User-Agent`.
     * If the task has a [payload][google.cloud.tasks.v2beta2.AppEngineHttpRequest.payload], Cloud
     * Tasks sets the following headers:
     * * `Content-Type`: By default, the `Content-Type` header is set to
     *   `"application/octet-stream"`. The default can be overridden by explicitly
     *   setting `Content-Type` to a particular media type when the
     *   [task is created][google.cloud.tasks.v2beta2.CloudTasks.CreateTask].
     *   For example, `Content-Type` can be set to `"application/json"`.
     * * `Content-Length`: This is computed by Cloud Tasks. This value is
     *   output only.   It cannot be changed.
     * The headers below cannot be set or overridden:
     * * `Host`
     * * `X-Google-*`
     * * `X-AppEngine-*`
     * In addition, Cloud Tasks sets some headers when the task is dispatched,
     * such as headers containing information about the task; see
     * [request headers](https://cloud.google.com/appengine/docs/python/taskqueue/push/creating-handlers#reading_request_headers).
     * These headers are set only when the task is dispatched, so they are not
     * visible when the task is returned in a Cloud Tasks response.
     * Although there is no specific limit for the maximum number of headers or
     * the size, there is a limit on the maximum size of the [Task][google.cloud.tasks.v2beta2.Task]. For more
     * information, see the [CreateTask][google.cloud.tasks.v2beta2.CloudTasks.CreateTask] documentation.
     *
     * Generated from protobuf field <code>map<string, string> headers = 4;</code>
     */
    private $headers;
    /**
     * Payload.
     * The payload will be sent as the HTTP message body. A message
     * body, and thus a payload, is allowed only if the HTTP method is
     * POST or PUT. It is an error to set a data payload on a task with
     * an incompatible [HttpMethod][google.cloud.tasks.v2beta2.HttpMethod].
     *
     * Generated from protobuf field <code>bytes payload = 5;</code>
     */
    private $payload = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $http_method
     *           The HTTP method to use for the request. The default is POST.
     *           The app's request handler for the task's target URL must be able to handle
     *           HTTP requests with this http_method, otherwise the task attempt will fail
     *           with error code 405 (Method Not Allowed). See
     *           [Writing a push task request handler](https://cloud.google.com/appengine/docs/java/taskqueue/push/creating-handlers#writing_a_push_task_request_handler)
     *           and the documentation for the request handlers in the language your app is
     *           written in e.g.
     *           [Python Request Handler](https://cloud.google.com/appengine/docs/python/tools/webapp/requesthandlerclass).
     *     @type \Google\Cloud\Tasks\V2beta2\AppEngineRouting $app_engine_routing
     *           Task-level setting for App Engine routing.
     *           If set,
     *           [app_engine_routing_override][google.cloud.tasks.v2beta2.AppEngineHttpTarget.app_engine_routing_override]
     *           is used for all tasks in the queue, no matter what the setting is for the
     *           [task-level app_engine_routing][google.cloud.tasks.v2beta2.AppEngineHttpRequest.app_engine_routing].
     *     @type string $relative_url
     *           The relative URL.
     *           The relative URL must begin with "/" and must be a valid HTTP relative URL.
     *           It can contain a path and query string arguments.
     *           If the relative URL is empty, then the root path "/" will be used.
     *           No spaces are allowed, and the maximum length allowed is 2083 characters.
     *     @type array|\Google\Protobuf\Internal\MapField $headers
     *           HTTP request headers.
     *           This map contains the header field names and values.
     *           Headers can be set when the
     *           [task is created][google.cloud.tasks.v2beta2.CloudTasks.CreateTask].
     *           Repeated headers are not supported but a header value can contain commas.
     *           Cloud Tasks sets some headers to default values:
     *           * `User-Agent`: By default, this header is
     *             `"AppEngine-Google; (+http://code.google.com/appengine)"`.
     *             This header can be modified, but Cloud Tasks will append
     *             `"AppEngine-Google; (+http://code.google.com/appengine)"` to the
     *             modified `User-Agent`.
     *           If the task has a [payload][google.cloud.tasks.v2beta2.AppEngineHttpRequest.payload], Cloud
     *           Tasks sets the following headers:
     *           * `Content-Type`: By default, the `Content-Type` header is set to
     *             `"application/octet-stream"`. The default can be overridden by explicitly
     *             setting `Content-Type` to a particular media type when the
     *             [task is created][google.cloud.tasks.v2beta2.CloudTasks.CreateTask].
     *             For example, `Content-Type` can be set to `"application/json"`.
     *           * `Content-Length`: This is computed by Cloud Tasks. This value is
     *             output only.   It cannot be changed.
     *           The headers below cannot be set or overridden:
     *           * `Host`
     *           * `X-Google-*`
     *           * `X-AppEngine-*`
     *           In addition, Cloud Tasks sets some headers when the task is dispatched,
     *           such as headers containing information about the task; see
     *           [request headers](https://cloud.google.com/appengine/docs/python/taskqueue/push/creating-handlers#reading_request_headers).
     *           These headers are set only when the task is dispatched, so they are not
     *           visible when the task is returned in a Cloud Tasks response.
     *           Although there is no specific limit for the maximum number of headers or
     *           the size, there is a limit on the maximum size of the [Task][google.cloud.tasks.v2beta2.Task]. For more
     *           information, see the [CreateTask][google.cloud.tasks.v2beta2.CloudTasks.CreateTask] documentation.
     *     @type string $payload
     *           Payload.
     *           The payload will be sent as the HTTP message body. A message
     *           body, and thus a payload, is allowed only if the HTTP method is
     *           POST or PUT. It is an error to set a data payload on a task with
     *           an incompatible [HttpMethod][google.cloud.tasks.v2beta2.HttpMethod].
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Tasks\V2Beta2\Target::initOnce();
        parent::__construct($data);
    }

    /**
     * The HTTP method to use for the request. The default is POST.
     * The app's request handler for the task's target URL must be able to handle
     * HTTP requests with this http_method, otherwise the task attempt will fail
     * with error code 405 (Method Not Allowed). See
     * [Writing a push task request handler](https://cloud.google.com/appengine/docs/java/taskqueue/push/creating-handlers#writing_a_push_task_request_handler)
     * and the documentation for the request handlers in the language your app is
     * written in e.g.
     * [Python Request Handler](https://cloud.google.com/appengine/docs/python/tools/webapp/requesthandlerclass).
     *
     * Generated from protobuf field <code>.google.cloud.tasks.v2beta2.HttpMethod http_method = 1;</code>
     * @return int
     */
    public function getHttpMethod()
    {
        return $this->http_method;
    }

    /**
     * The HTTP method to use for the request. The default is POST.
     * The app's request handler for the task's target URL must be able to handle
     * HTTP requests with this http_method, otherwise the task attempt will fail
     * with error code 405 (Method Not Allowed). See
     * [Writing a push task request handler](https://cloud.google.com/appengine/docs/java/taskqueue/push/creating-handlers#writing_a_push_task_request_handler)
     * and the documentation for the request handlers in the language your app is
     * written in e.g.
     * [Python Request Handler](https://cloud.google.com/appengine/docs/python/tools/webapp/requesthandlerclass).
     *
     * Generated from protobuf field <code>.google.cloud.tasks.v2beta2.HttpMethod http_method = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setHttpMethod($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\Tasks\V2beta2\HttpMethod::class);
        $this->http_method = $var;

        return $this;
    }

    /**
     * Task-level setting for App Engine routing.
     * If set,
     * [app_engine_routing_override][google.cloud.tasks.v2beta2.AppEngineHttpTarget.app_engine_routing_override]
     * is used for all tasks in the queue, no matter what the setting is for the
     * [task-level app_engine_routing][google.cloud.tasks.v2beta2.AppEngineHttpRequest.app_engine_routing].
     *
     * Generated from protobuf field <code>.google.cloud.tasks.v2beta2.AppEngineRouting app_engine_routing = 2;</code>
     * @return \Google\Cloud\Tasks\V2beta2\AppEngineRouting
     */
    public function getAppEngineRouting()
    {
        return $this->app_engine_routing;
    }

    /**
     * Task-level setting for App Engine routing.
     * If set,
     * [app_engine_routing_override][google.cloud.tasks.v2beta2.AppEngineHttpTarget.app_engine_routing_override]
     * is used for all tasks in the queue, no matter what the setting is for the
     * [task-level app_engine_routing][google.cloud.tasks.v2beta2.AppEngineHttpRequest.app_engine_routing].
     *
     * Generated from protobuf field <code>.google.cloud.tasks.v2beta2.AppEngineRouting app_engine_routing = 2;</code>
     * @param \Google\Cloud\Tasks\V2beta2\AppEngineRouting $var
     * @return $this
     */
    public function setAppEngineRouting($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Tasks\V2beta2\AppEngineRouting::class);
        $this->app_engine_routing = $var;

        return $this;
    }

    /**
     * The relative URL.
     * The relative URL must begin with "/" and must be a valid HTTP relative URL.
     * It can contain a path and query string arguments.
     * If the relative URL is empty, then the root path "/" will be used.
     * No spaces are allowed, and the maximum length allowed is 2083 characters.
     *
     * Generated from protobuf field <code>string relative_url = 3;</code>
     * @return string
     */
    public function getRelativeUrl()
    {
        return $this->relative_url;
    }

    /**
     * The relative URL.
     * The relative URL must begin with "/" and must be a valid HTTP relative URL.
     * It can contain a path and query string arguments.
     * If the relative URL is empty, then the root path "/" will be used.
     * No spaces are allowed, and the maximum length allowed is 2083 characters.
     *
     * Generated from protobuf field <code>string relative_url = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setRelativeUrl($var)
    {
        GPBUtil::checkString($var, True);
        $this->relative_url = $var;

        return $this;
    }

    /**
     * HTTP request headers.
     * This map contains the header field names and values.
     * Headers can be set when the
     * [task is created][google.cloud.tasks.v2beta2.CloudTasks.CreateTask].
     * Repeated headers are not supported but a header value can contain commas.
     * Cloud Tasks sets some headers to default values:
     * * `User-Agent`: By default, this header is
     *   `"AppEngine-Google; (+http://code.google.com/appengine)"`.
     *   This header can be modified, but Cloud Tasks will append
     *   `"AppEngine-Google; (+http://code.google.com/appengine)"` to the
     *   modified `User-Agent`.
     * If the task has a [payload][google.cloud.tasks.v2beta2.AppEngineHttpRequest.payload], Cloud
     * Tasks sets the following headers:
     * * `Content-Type`: By default, the `Content-Type` header is set to
     *   `"application/octet-stream"`. The default can be overridden by explicitly
     *   setting `Content-Type` to a particular media type when the
     *   [task is created][google.cloud.tasks.v2beta2.CloudTasks.CreateTask].
     *   For example, `Content-Type` can be set to `"application/json"`.
     * * `Content-Length`: This is computed by Cloud Tasks. This value is
     *   output only.   It cannot be changed.
     * The headers below cannot be set or overridden:
     * * `Host`
     * * `X-Google-*`
     * * `X-AppEngine-*`
     * In addition, Cloud Tasks sets some headers when the task is dispatched,
     * such as headers containing information about the task; see
     * [request headers](https://cloud.google.com/appengine/docs/python/taskqueue/push/creating-handlers#reading_request_headers).
     * These headers are set only when the task is dispatched, so they are not
     * visible when the task is returned in a Cloud Tasks response.
     * Although there is no specific limit for the maximum number of headers or
     * the size, there is a limit on the maximum size of the [Task][google.cloud.tasks.v2beta2.Task]. For more
     * information, see the [CreateTask][google.cloud.tasks.v2beta2.CloudTasks.CreateTask] documentation.
     *
     * Generated from protobuf field <code>map<string, string> headers = 4;</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * HTTP request headers.
     * This map contains the header field names and values.
     * Headers can be set when the
     * [task is created][google.cloud.tasks.v2beta2.CloudTasks.CreateTask].
     * Repeated headers are not supported but a header value can contain commas.
     * Cloud Tasks sets some headers to default values:
     * * `User-Agent`: By default, this header is
     *   `"AppEngine-Google; (+http://code.google.com/appengine)"`.
     *   This header can be modified, but Cloud Tasks will append
     *   `"AppEngine-Google; (+http://code.google.com/appengine)"` to the
     *   modified `User-Agent`.
     * If the task has a [payload][google.cloud.tasks.v2beta2.AppEngineHttpRequest.payload], Cloud
     * Tasks sets the following headers:
     * * `Content-Type`: By default, the `Content-Type` header is set to
     *   `"application/octet-stream"`. The default can be overridden by explicitly
     *   setting `Content-Type` to a particular media type when the
     *   [task is created][google.cloud.tasks.v2beta2.CloudTasks.CreateTask].
     *   For example, `Content-Type` can be set to `"application/json"`.
     * * `Content-Length`: This is computed by Cloud Tasks. This value is
     *   output only.   It cannot be changed.
     * The headers below cannot be set or overridden:
     * * `Host`
     * * `X-Google-*`
     * * `X-AppEngine-*`
     * In addition, Cloud Tasks sets some headers when the task is dispatched,
     * such as headers containing information about the task; see
     * [request headers](https://cloud.google.com/appengine/docs/python/taskqueue/push/creating-handlers#reading_request_headers).
     * These headers are set only when the task is dispatched, so they are not
     * visible when the task is returned in a Cloud Tasks response.
     * Although there is no specific limit for the maximum number of headers or
     * the size, there is a limit on the maximum size of the [Task][google.cloud.tasks.v2beta2.Task]. For more
     * information, see the [CreateTask][google.cloud.tasks.v2beta2.CloudTasks.CreateTask] documentation.
     *
     * Generated from protobuf field <code>map<string, string> headers = 4;</code>
     * @param array|\Google\Protobuf\Internal\MapField $var
     * @return $this
     */
    public function setHeaders($var)
    {
        $arr = GPBUtil::checkMapField($var, \Google\Protobuf\Internal\GPBType::STRING, \Google\Protobuf\Internal\GPBType::STRING);
        $this->headers = $arr;

        return $this;
    }

    /**
     * Payload.
     * The payload will be sent as the HTTP message body. A message
     * body, and thus a payload, is allowed only if the HTTP method is
     * POST or PUT. It is an error to set a data payload on a task with
     * an incompatible [HttpMethod][google.cloud.tasks.v2beta2.HttpMethod].
     *
     * Generated from protobuf field <code>bytes payload = 5;</code>
     * @return string
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * Payload.
     * The payload will be sent as the HTTP message body. A message
     * body, and thus a payload, is allowed only if the HTTP method is
     * POST or PUT. It is an error to set a data payload on a task with
     * an incompatible [HttpMethod][google.cloud.tasks.v2beta2.HttpMethod].
     *
     * Generated from protobuf field <code>bytes payload = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setPayload($var)
    {
        GPBUtil::checkString($var, False);
        $this->payload = $var;

        return $this;
    }

}

