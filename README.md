# Coinbase Checkout and Webhook

A Laravel project that simulates call to Coinbase checkout and the processing of webhooks.

## How to run this project

- Start the application (`docker compose up -d`).
- Set up the env file (`cp .env.example .env`).
- Generate application key (`docker compose exec web php artisan key:generate`).
- Create the tables (`docker compose exec web php artisan migrate`).

## Supported Exchanges

Modify the env file and change the value of `EXCHANGE_DEFAULT` into `coinbase` or `binance`.

```bash
EXCHANGE_DEFAULT=coinbase # coinbase || binance are supported
```

## API enpoints

### POST /api/v1/checkout

Request:

```bash
curl -X POST http://localhost:8001/api/v1/checkout -H 'Accept: application/json' -H "Content-Type: application/json" --data '{ "amount": 1.01, "email": "test@test.com" }'
```

Response (200):

```json
{"data":{"hosted_payment_url":"https://fake.coinbase.com/pay/MLtrTHwayA"}}
```

Note: generated **ID** is included in the response (e.g. `MLtrTHwayA`), it will be used in testing `/api/v1/webhook`

### POST /api/v1/webhook

Note: Use the **ID** generated in `/api/v1/checkout`

Request:

```bash
curl -X POST http://localhost:8001/api/v1/webhook -H 'Accept: application/json' -H "Content-Type: application/json" --data '{ "id": "MLtrTHwayA", "status": 1 }'
```

Response (200):

```json
{"message":"Transaction updated successfully"}
```

Response (404):

```json
{"message":"Transaction not found"}
```

## Assumptions made

- Coinbase's API returns a transaction id that can be used as reference in saving DB records.
- Webhook data also contains the same transaction id and can be used to find and update DB records.
- Aside form Coinbase, other cryptocurrency exchanges will be supported such as Binance, Gemini, etc.
- Postgres will be used for integrity and more advance features.

## Todos

- Async handling for webhooks - We can use use Laravel's [queued jobs](https://laravel.com/docs/queues) to process webhook events asynchronously. Dispatch a job from the webhook controller to handle the event logic in the background, improving response times and reliability. I can configure the queue connection (e.g., Redis, database) and run a queue worker to process jobs.
- Retry logic or error tracking in the webhook flow - Same with above, Laravel provides built-in support for job retries and error tracking using [Laravel Queues](https://laravel.com/docs/queues) and [failed job handling](https://laravel.com/docs/queues#dealing-with-failed-jobs). I can configure jobs to automatically retry on failure and use the `failed_jobs` table to track errors for further inspection or manual retries. 
- Provide logs or metrics - I implemented Laravel's built-in [logging](https://laravel.com/docs/logging) system to record webhook events, errors, and other important actions. For metrics and monitoring, we can utilize tools like [Laravel Telescope](https://laravel.com/docs/telescope) for debugging and insight, or external solutions such as [Sentry](https://sentry.io/welcome/) for error tracking and [Prometheus](https://github.com/prometheus/prometheus) with [laravel-exporter](https://github.com/arkaitzgarro/laravel-exporter) for application metrics.
