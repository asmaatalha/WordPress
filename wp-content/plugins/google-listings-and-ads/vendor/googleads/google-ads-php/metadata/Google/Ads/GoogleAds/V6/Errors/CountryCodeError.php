<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v6/errors/country_code_error.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V6\Errors;

class CountryCodeError
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
7google/ads/googleads/v6/errors/country_code_error.protogoogle.ads.googleads.v6.errors"b
CountryCodeErrorEnum"J
CountryCodeError
UNSPECIFIED 
UNKNOWN
INVALID_COUNTRY_CODEB�
"com.google.ads.googleads.v6.errorsBCountryCodeErrorProtoPZDgoogle.golang.org/genproto/googleapis/ads/googleads/v6/errors;errors�GAA�Google.Ads.GoogleAds.V6.Errors�Google\\Ads\\GoogleAds\\V6\\Errors�"Google::Ads::GoogleAds::V6::Errorsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

