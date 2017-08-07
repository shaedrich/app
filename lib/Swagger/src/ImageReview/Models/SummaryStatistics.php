<?php
/**
 * SummaryStatistics
 *
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   http://github.com/swagger-api/swagger-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * image-review
 *
 * No descripton provided (generated by Swagger Codegen https://github.com/swagger-api/swagger-codegen)
 *
 * OpenAPI spec version: 0.1.24
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Swagger\Client\ImageReview\Models;

use \ArrayAccess;

/**
 * SummaryStatistics Class Doc Comment
 *
 * @category    Class */
/** 
 * @package     Swagger\Client
 * @author      http://github.com/swagger-api/swagger-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class SummaryStatistics implements ArrayAccess
{
    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'SummaryStatistics';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = array(
        'total_reviewed' => 'int',
        'avg_per_user' => 'double',
        'reviews_count_per_status' => '\Swagger\Client\ImageReview\Models\ReviewsCountByStatus[]',
        'user_statistics' => '\Swagger\Client\ImageReview\Models\UserStatistics[]'
    );

    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     * @var string[]
     */
    protected static $attributeMap = array(
        'total_reviewed' => 'totalReviewed',
        'avg_per_user' => 'avgPerUser',
        'reviews_count_per_status' => 'reviewsCountPerStatus',
        'user_statistics' => 'userStatistics'
    );

    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = array(
        'total_reviewed' => 'setTotalReviewed',
        'avg_per_user' => 'setAvgPerUser',
        'reviews_count_per_status' => 'setReviewsCountPerStatus',
        'user_statistics' => 'setUserStatistics'
    );

    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = array(
        'total_reviewed' => 'getTotalReviewed',
        'avg_per_user' => 'getAvgPerUser',
        'reviews_count_per_status' => 'getReviewsCountPerStatus',
        'user_statistics' => 'getUserStatistics'
    );

    public static function getters()
    {
        return self::$getters;
    }

    

    

    /**
     * Associative array for storing property values
     * @var mixed[]
     */
    protected $container = array();

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['total_reviewed'] = isset($data['total_reviewed']) ? $data['total_reviewed'] : null;
        $this->container['avg_per_user'] = isset($data['avg_per_user']) ? $data['avg_per_user'] : null;
        $this->container['reviews_count_per_status'] = isset($data['reviews_count_per_status']) ? $data['reviews_count_per_status'] : null;
        $this->container['user_statistics'] = isset($data['user_statistics']) ? $data['user_statistics'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = array();
        return $invalid_properties;
    }

    /**
     * validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properteis are valid
     */
    public function valid()
    {
        return true;
    }


    /**
     * Gets total_reviewed
     * @return int
     */
    public function getTotalReviewed()
    {
        return $this->container['total_reviewed'];
    }

    /**
     * Sets total_reviewed
     * @param int $total_reviewed
     * @return $this
     */
    public function setTotalReviewed($total_reviewed)
    {
        $this->container['total_reviewed'] = $total_reviewed;

        return $this;
    }

    /**
     * Gets avg_per_user
     * @return double
     */
    public function getAvgPerUser()
    {
        return $this->container['avg_per_user'];
    }

    /**
     * Sets avg_per_user
     * @param double $avg_per_user
     * @return $this
     */
    public function setAvgPerUser($avg_per_user)
    {
        $this->container['avg_per_user'] = $avg_per_user;

        return $this;
    }

    /**
     * Gets reviews_count_per_status
     * @return \Swagger\Client\ImageReview\Models\ReviewsCountByStatus[]
     */
    public function getReviewsCountPerStatus()
    {
        return $this->container['reviews_count_per_status'];
    }

    /**
     * Sets reviews_count_per_status
     * @param \Swagger\Client\ImageReview\Models\ReviewsCountByStatus[] $reviews_count_per_status
     * @return $this
     */
    public function setReviewsCountPerStatus($reviews_count_per_status)
    {
        $this->container['reviews_count_per_status'] = $reviews_count_per_status;

        return $this;
    }

    /**
     * Gets user_statistics
     * @return \Swagger\Client\ImageReview\Models\UserStatistics[]
     */
    public function getUserStatistics()
    {
        return $this->container['user_statistics'];
    }

    /**
     * Sets user_statistics
     * @param \Swagger\Client\ImageReview\Models\UserStatistics[] $user_statistics
     * @return $this
     */
    public function setUserStatistics($user_statistics)
    {
        $this->container['user_statistics'] = $user_statistics;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     * @param  integer $offset Offset
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     * @param  integer $offset Offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     * @param  integer $offset Offset
     * @param  mixed   $value  Value to be set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     * @param  integer $offset Offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(\Swagger\Client\ObjectSerializer::sanitizeForSerialization($this), JSON_PRETTY_PRINT);
        }

        return json_encode(\Swagger\Client\ObjectSerializer::sanitizeForSerialization($this));
    }
}


