<?php

namespace autoxloo\yii2\sentry;

use yii\base\Component;
use yii\base\InvalidConfigException;

/**
 * Class SentryComponent
 */
class SentryComponent extends Component
{
    /**
     * @var string
     */
    public $ravenDsn;
    /**
     * @var bool Whether to send logs to sentry via [[SentryComponent::captureMessage()]]. By default `true` means allow sending.
     */
    public $allowCaptureMessage = true;

    /**
     * @var \Raven_Client
     */
    protected $ravenClient;


    /**
     * @inheritdoc
     * @throws InvalidConfigException
     */
    public function init()
    {
        parent::init();

        if (empty($this->ravenDsn) || !is_string($this->ravenDsn)) {
            throw new InvalidConfigException('Param "ravenDsn" must be not empty string');
        }

        $this->ravenClient = new \Raven_Client($this->ravenDsn);
    }

    /**
     * Gets initialized instance of \Raven_Client.
     *
     * @return \Raven_Client
     */
    public function getRavenClient()
    {
        return $this->ravenClient;
    }

    /**
     * Log a message to sentry
     *
     * > Note: it's wrapper for \Raven_Client::captureMessage()
     * @see \Raven_Client::captureMessage()
     *
     * @param string $message The message (primary description) for the event.
     * @param array $params params to use when formatting the message.
     * @param array $data Additional attributes to pass with this event (see Sentry docs).
     * @param bool|array $stack
     * @param mixed $vars
     *
     * @return string|null
     */
    public function captureMessage($message, $params = array(), $data = array(), $stack = false, $vars = null)
    {
        $captureResult = null;

        if ($this->allowCaptureMessage) {
            $captureResult = $this->ravenClient->captureMessage($message, $params, $data, $stack, $vars);
        }

        return $captureResult;
    }
}
