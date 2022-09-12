<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Verify\V2\Service\Entity;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Stream;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class ChallengeList extends ListResource {
    /**
     * Construct the ChallengeList
     *
     * @param Version $version Version that contains the resource
     * @param string $serviceSid Service Sid.
     * @param string $identity Unique external identifier of the Entity
     */
    public function __construct(Version $version, string $serviceSid, string $identity) {
        parent::__construct($version);

        // Path Solution
        $this->solution = ['serviceSid' => $serviceSid, 'identity' => $identity, ];

        $this->uri = '/Services/' . \rawurlencode($serviceSid) . '/Entities/' . \rawurlencode($identity) . '/Challenges';
    }

    /**
     * Create the ChallengeInstance
     *
     * @param string $factorSid Factor Sid.
     * @param array|Options $options Optional Arguments
     * @return ChallengeInstance Created ChallengeInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create(string $factorSid, array $options = []): ChallengeInstance {
        $options = new Values($options);

        $data = Values::of([
            'FactorSid' => $factorSid,
            'ExpirationDate' => Serialize::iso8601DateTime($options['expirationDate']),
            'Details' => $options['details'],
            'HiddenDetails' => $options['hiddenDetails'],
        ]);
        $headers = Values::of(['Twilio-Sandbox-Mode' => $options['twilioSandboxMode'], ]);

        $payload = $this->version->create('POST', $this->uri, [], $data, $headers);

        return new ChallengeInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['identity']
        );
    }

    /**
     * Streams ChallengeInstance records from the API as a generator stream.
     * This operation lazily loads records as efficiently as possible until the
     * limit
     * is reached.
     * The results are returned as a generator, so this operation is memory
     * efficient.
     *
     * @param array|Options $options Optional Arguments
     * @param int $limit Upper limit for the number of records to return. stream()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request, when not set
     *                        will use the default value of 50 records.  If no
     *                        page_size is defined but a limit is defined, stream()
     *                        will attempt to read the limit with the most
     *                        efficient page size, i.e. min(limit, 1000)
     * @return Stream stream of results
     */
    public function stream(array $options = [], int $limit = null, $pageSize = null): Stream {
        $limits = $this->version->readLimits($limit, $pageSize);

        $page = $this->page($options, $limits['pageSize']);

        return $this->version->stream($page, $limits['limit'], $limits['pageLimit']);
    }

    /**
     * Reads ChallengeInstance records from the API as a list.
     * Unlike stream(), this operation is eager and will load `limit` records into
     * memory before returning.
     *
     * @param array|Options $options Optional Arguments
     * @param int $limit Upper limit for the number of records to return. read()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request, when not set
     *                        will use the default value of 50 records.  If no
     *                        page_size is defined but a limit is defined, read()
     *                        will attempt to read the limit with the most
     *                        efficient page size, i.e. min(limit, 1000)
     * @return ChallengeInstance[] Array of results
     */
    public function read(array $options = [], int $limit = null, $pageSize = null): array {
        return \iterator_to_array($this->stream($options, $limit, $pageSize), false);
    }

    /**
     * Retrieve a single page of ChallengeInstance records from the API.
     * Request is executed immediately
     *
     * @param array|Options $options Optional Arguments
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return ChallengePage Page of ChallengeInstance
     */
    public function page(array $options = [], $pageSize = Values::NONE, string $pageToken = Values::NONE, $pageNumber = Values::NONE): ChallengePage {
        $options = new Values($options);

        $params = Values::of([
            'FactorSid' => $options['factorSid'],
            'Status' => $options['status'],
            'PageToken' => $pageToken,
            'Page' => $pageNumber,
            'PageSize' => $pageSize,
        ]);
        $headers = Values::of(['Twilio-Sandbox-Mode' => $options['twilioSandboxMode'], ]);

        $response = $this->version->page('GET', $this->uri, $params, [], $headers);

        return new ChallengePage($this->version, $response, $this->solution);
    }

    /**
     * Retrieve a specific page of ChallengeInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return ChallengePage Page of ChallengeInstance
     */
    public function getPage(string $targetUrl): ChallengePage {
        $response = $this->version->getDomain()->getClient()->request(
            'GET',
            $targetUrl
        );

        return new ChallengePage($this->version, $response, $this->solution);
    }

    /**
     * Constructs a ChallengeContext
     *
     * @param string $sid A string that uniquely identifies this Challenge.
     */
    public function getContext(string $sid): ChallengeContext {
        return new ChallengeContext(
            $this->version,
            $this->solution['serviceSid'],
            $this->solution['identity'],
            $sid
        );
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        return '[Twilio.Verify.V2.ChallengeList]';
    }
}