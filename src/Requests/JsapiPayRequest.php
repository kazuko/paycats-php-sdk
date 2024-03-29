<?php

declare(strict_types=1);

namespace Paycats\Sdk\Requests;

use Paycats\Sdk\Api;
use Paycats\Sdk\Exceptions\InvalidArgumentException;

class JsapiPayRequest extends Request
{
    protected $path = Api::JSAPI_PAY;

    function getData(): array
    {
        if (
            !(isset($this->data['total_fee']) && $this->data['total_fee'] > 1) ||
            !(isset($this->data['out_trade_no']) && $this->data['out_trade_no']) ||
            !(isset($this->data['openid']) && $this->data['openid']) ||
            !(isset($this->data['body']) && $this->data['body'])
        ) {
            throw new InvalidArgumentException();
        }

        return parent::getData();
    }
}