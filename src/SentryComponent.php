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
}
