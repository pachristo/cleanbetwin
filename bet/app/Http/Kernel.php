<?php

namespace App\Http;

use App\Http\Middleware\InvestmentMiddleware;
use App\Http\Middleware\MegaMiddleware;
use App\Http\Middleware\SentinelMiddleware;
use App\Http\Middleware\SuperMiddleware;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use App\Http\Middleware\Sure3Middlewarec;
use App\Http\Middleware\Sure2Middlewarec;
use App\Http\Middleware\Sure5Middlewarec;
use App\Http\Middleware\weekendWare;
use App\Http\Middleware\TodayvipWare;
use App\Http\Middleware\TodayovipWare;
use App\Http\Middleware\TodayvvipWare;
use App\Http\Middleware\FridayvipWare;
use App\Http\Middleware\SaturdayvipWare;
use App\Http\Middleware\SundayvipWare;
class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var arraynnm
     */

    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
        \Fruitcake\Cors\HandleCors::class,
        \App\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        'sentinelAuth' => SentinelMiddleware::class,
        'superGuard' => SuperMiddleware::class,
        'megaGuard' => MegaMiddleware::class,
        'investmentGuard' => InvestmentMiddleware::class,
        'sure2'=>Sure2Middlewarec::class,
        'sure3'=>Sure3Middlewarec::class,
        'sure5'=>Sure5Middlewarec::class,
        'weekend'=>weekendWare::class,
        'tvtWare'=>TodayvipWare::class,
        'tvvtWare'=>TodayvvipWare::class,
        'totWare'=>TodayovipWare::class,
        'frivtWare'=>FridayvipWare::class,
        'satvtWare'=>SaturdayvipWare::class,
        'sunvtWare'=>SundayvipWare::class,
    ];
}
